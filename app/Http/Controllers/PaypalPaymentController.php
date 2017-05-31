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

        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        $price = $order->delivery_price;

        $name = 'Order Number: '.sprintf('%04d', $order->id);

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
        $transaction->setInvoiceNumber(uniqid());

        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl('http://360ugly.com/payment/done');
        $redirectUrls->setCancelUrl('http://360ugly.com/payment');

        $payment = PayPal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;
        
        return Redirect::to( $redirectUrl );
    }

    public function getCheckoutDownload()
    {
        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        $amount = PayPal:: Amount();
        $amount->setCurrency('EUR');
        $amount->setTotal(42); // This is the simple way,
        // you can alternatively describe everything in the order separately;
        // Reference the PayPal PHP REST SDK for details.

        $transaction = PayPal::Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('What are you selling?');




        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl('http://360ugly.com/payment/done');
        $redirectUrls->setCancelUrl('http://360ugly.com/payment');

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
        $itemlist = $transactions[0]->getItemList();
        $items = $itemlist->getItems();
        $name = $items[0]->name;

        $order_id = (int) ltrim(substr($name, 14), '0');

        $order = Order::findorFail($order_id);

        $order->updateStatus('delivery');

        // Thank the user for the purchase
        return view('user/process');
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
