<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paypalpayment;
use Session;
use App\Order;
use Redirect;
use App\PaypalIPN;

class PaypalPaymentController extends Controller
{
     /**
     * object to authenticate the call.
     * @param object $_apiContext
     */
    private $_apiContext;

    public function __construct()
    {

        $this->_apiContext = Paypalpayment::ApiContext(config('paypal_payment.Account.ClientId'), config('paypal_payment.Account.ClientSecret'));

    }

    /*
    * Display form to process payment using credit card
    */
    public function create()
    {
    	        dd('create');
        return View::make('payment.order');
    }

    /*
    * Process payment using credit card
    */
    public function store(Request $request)
    {
        $order = Order::find($request->order_id);
        // ### Address
        // Base Address object used as shipping or billing
        // address in a payment. [Optional]

        // $addr= Paypalpayment::address();
        // $addr->setLine1("3909 Witmer Road");
        // $addr->setLine2("Niagara Falls");
        // $addr->setCity("Niagara Falls");
        // $addr->setState("NY");
        // $addr->setPostalCode("14305");
        // $addr->setCountryCode("US");
        // $addr->setPhone("716-298-1822");

        // ### CreditCard
        // $card = Paypalpayment::creditCard();
        // $card->setType("visa")
        //     ->setNumber("4758411877817150")
        //     ->setExpireMonth("05")
        //     ->setExpireYear("2019")
        //     ->setCvv2("456")
        //     ->setFirstName("Joe")
        //     ->setLastName("Shopper");

        // ### FundingInstrument
        // A resource representing a Payer's funding instrument.
        // Use a Payer ID (A unique identifier of the payer generated
        // and provided by the facilitator. This is required when
        // creating or using a tokenized funding instrument)
        // and the `CreditCardDetails`
        // $fi = Paypalpayment::fundingInstrument();
        // $fi->setCreditCard($card);

        // ### Payer
        // A resource representing a Payer that funds a payment
        // Use the List of `FundingInstrument` and the Payment Method
        // as 'credit_card'
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("paypal");

        $price = $order->delivery_price;
        $name = 'Order Number: '.sprintf('%04d', $order->id);


        $item1 = Paypalpayment::item();
        $item1->setName($name)
                ->setDescription('Courier collection')
                ->setCurrency('GBP')
                ->setQuantity(1)
                ->setPrice($price);

        $itemList = Paypalpayment::itemList();
        $itemList->setItems(array($item1));

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency("GBP")
                // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
                ->setTotal($price);

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        $baseUrl = Paypalpayment::getBaseUrl();
        $redirectUrls = Paypalpayment::RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/user/process?success=true")
            ->setCancelUrl("$baseUrl/user/process?success=false");

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'

        $payment = Paypalpayment::payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
        $payment->create($this->_apiContext);
        } catch (\PPConnectionException $ex) {
            return  "Exception: " . $ex->getMessage() . PHP_EOL;
            exit(1);
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error','Unknown error occurred');
        // return Redirect::route('addmoney.paywithpaypal');

    }

    /*
        Use this call to get a list of payments. 
        url:payment/
    */
    public function index()
    {
        echo "<pre>";

        $payments = Paypalpayment::getAll(array('count' => 1, 'start_index' => 0), $this->_apiContext);
        dd('index');
        dd($payments);
    }

    /*
        Use this call to get details about payments that have not completed, 
        such as payments that are created and approved, or if a payment has failed.
        url:payment/PAY-3B7201824D767003LKHZSVOA
    */

    public function show($payment_id)
    {
       $payment = Paypalpayment::getById($payment_id,$this->_apiContext);
               dd('show');
       dd($payment);
    }

    public function check()
    {
       $ipn = new PaypalIPN();
        // Use the sandbox endpoint during testing.
        $ipn->useSandbox();
        $verified = $ipn->verifyIPN();
        if ($verified) {
            /*
             * Process IPN
             * A list of variables is available here:
             * https://developer.paypal.com/webapps/developer/docs/classic/ipn/integration-guide/IPNandPDTVariables/
             */
            DB::insert('insert into payments (id, pay1) values (?, ?)', [1, 1]);
        }

    }

    public function test()
    {
        return view('payment/test');

    }
}
