<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Order;
use Paypal;
use Redirect;

class PayPalPaymentController extends Controller
{
     /**
     * object to authenticate the call.
     * @param object $_apiContext
     */
     private $_apiContext;

     public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));

    }

    public function getCheckout($order_id)
    {
        $order = Order::findorFail($order_id);
        $invoice = str_random(10).$order_id; 
        $price = $order->delivery_price;
        $name = 'Order Number: '.sprintf('%04d', $order->id);

        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        $item1 = PayPal::item();
        $item1->setName($name)
                ->setDescription('Courier collection')
                ->setCurrency('GBP')
                ->setQuantity(1)
                ->setPrice($price);

        $itemList = PayPal::itemList();
        $itemList->setItems(array($item1));

        //Payment Amount
        $amount = PayPal::amount();
        $amount->setCurrency("GBP")
                // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
                ->setTotal($price);     

        $transaction = PayPal::Transaction();
        $transaction->setItemList($itemList);
        $transaction->setAmount($amount);
        $transaction->setInvoiceNumber($invoice);

        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl('http://360ugly.com/payment/done');
        $redirectUrls->setCancelUrl('http://360ugly.com/user/process');

        $payment = PayPal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;
        
        return Redirect::to( $redirectUrl );
    }

    public function getCheckoutDownload($order_id)
    {

        $order = Order::findorFail($order_id);
        $invoice = str_random(10).$order_id; 
        $price = $order->total_price;

        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        $item  = array();
        $items = array();
        $count = 0;
            foreach ($order->items as $product) {
            $count++;    
                $item[$count] = PayPal::item();
                $item[$count]->setName($product->name)
                    ->setDescription('Dimensions: '.$product->length.' x '.$product->width.' x '.$product->height.' cm Weight: '.$product->weight)
                    ->setCurrency('GBP')
                    ->setQuantity(1)
                    ->setPrice($product->price);
        
            $items[] = $item[$count];
            }

        $itemList = PayPal::itemList();
        $itemList->setItems($items);  

        $amount = PayPal:: Amount();
        $amount->setCurrency('GBP');
        $amount->setTotal($price); // This is the simple way,
        // you can alternatively describe everything in the order separately;
        // Reference the PayPal PHP REST SDK for details.

        $transaction = PayPal::Transaction();
        $transaction->setAmount($amount);
        $transaction->setItemList($itemList);
        $transaction->setInvoiceNumber($invoice);

        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl('http://360ugly.com/payment/done');
        $redirectUrls->setCancelUrl('http://360ugly.com/user/process');

        $payment = PayPal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;
        
        return Redirect::to( $redirectUrl );
    }

    public function getDone(Request $request)
    {
        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');
        
        $payment = PayPal::getById($id, $this->_apiContext);

        $paymentExecution = PayPal::PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

        // Clear the shopping cart, write to database, send notifications, etc.
        $transactions = $executePayment->getTransactions();
        $transaction = $transactions[0]; 
        
        $order_id = substr($transaction->invoice_number, 10);

        $order = Order::findorFail($order_id);

        if($order->getStatus() == 'pay1'){
            $order->updateStatus('delivery');
        }elseif($order->getStatus() == 'pay2'){
            $order->updateStatus('download');
        }

        $user = $order->user;

        // Thank the user for the purchase
        return view('user/process')->with('user', $user);
    }

    public function getCancel()
    {
        // Curse and humiliate the user for cancelling this most sacred payment (yours)
        return view('checkout.cancel');
    }

       public function index()
    {
        echo "<pre>";

        $payments = PayPal::getAll(array('count' => 1, 'start_index' => 0), $this->_apiContext);

        dd($payments);
    }

    public function show($payment_id)
    {
       $payment = Paypalpayment::getById($payment_id,$this->_apiContext);

       dd($payment);
    }
}
