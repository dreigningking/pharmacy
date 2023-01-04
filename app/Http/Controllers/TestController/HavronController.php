<?php

namespace App\Http\Controllers\TestController;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Http\Controllers\Controller;

class HavronController extends Controller
{
    public function __construct()
    {
        
        
        // $this->client_id = 'ARoWugx4mm-Jow8Z2WHZQfgSL3gqEBf9wyu2JxtIQb-uh10s2qaqtvoxwNkB-MWLCBlC1k4QOieo0-rL';
        // $this->client_secret = 'EE4peiCAYM4l1CbZKH7X4tMYFQxRUIzONXCGRa5tdLAVVLNzu0ZDd4YRBzhkTJkf0TJcynhybrv3liZb';
        // $this->paypal_url = 'https://api-m.paypal.com';
        $this->client_id_test = 'AUv8rrc_P-EbP2E0mpb49BV7rFt3Usr-vdUZO8VGOnjRehGHBXkSzchr37SYF2GNdQFYSp72jh5QUhzG';
        $this->client_secret_test = 'EMnAWe06ioGtouJs7gLYT9chK9-2jJ--7MKRXpI8FesmY_2Kp-d_7aCqff7M9moEJBvuXoBO4clKtY0v';
        $this->paypal_url_test = 'https://api-m.sandbox.paypal.com';

    }

    public function index()
    {
        return view('havron.donate');
    }

    public function get_token(){
        $id = base64_encode($this->client_id_test);
        $secret = base64_encode($this->client_secret_test);
        $response = Curl::to($this->paypal_url_test.'/v1/oauth2/token')
            ->withHeader("Authorization: Basic ".$id.":".$secret)
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withData(["grant_type"=>"client_credentials"])
            ->asJsonResponse()
            ->post();
        if($response && $response->access_token)
        return $response->access_token;
        else return false;
    }

    public function storePaypal(Request $request)
    {
        
        $token = $this->get_token();
        if(!$token){
            return "Something is wrong, please contact the admin";
        }
        $response = Curl::to($this->paypal_url_test.'/v2/checkout/orders')
            ->withHeader('Authorization: Bearer '.$token)
            ->withHeader('PayPal-Request-Id: '.uniqid())
            ->withData([
                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "items" => [
                            [
                                "name" => "Havron Donation",
                                "description" => "Donation for 2023 Election",
                                "quantity" => "1",
                                "unit_amount" => [
                                    "currency_code" => "USD",
                                    "value" => $request->amount,
                                ],
                            ],
                        ],
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $request->amount,
                            "breakdown" => [
                                "item_total" => [
                                    "currency_code" => "USD",
                                    "value" => $request->amount,
                                ],
                            ],
                        ],
                    ],
                ],
                "application_context" => [
                    "return_url" => route('havron.success'),
                    "cancel_url" => route('havron.error'),
                ],
            ]
            )
            ->asJson()
            ->post();
        if($response && $response->status == 'CREATED' && $response->links[1]->href){
            return redirect()->to($response->links[1]->href);
        }
        
    }

    public function store(Request $request){
        // dd($request->all());
        $response = Curl::to('https://api.paystack.co/transaction/initialize')
        ->withHeader('Authorization: Bearer sk_live_d5e00e32507982cd85010f382d438f794ecd63f9')
        ->withData( array('email' => $request->email,'currency'=> 'USD',
        'amount'=> $request->amount *100,'callback_url'=> route('havron.verify'),'reference'=> uniqid(),'metadata' => ['product'=> 'Donation'] ) )
        ->asJson()
        ->post();
        // dd($response);
        if(!$response || !$response->status)
        return redirect()->route('havron.error');
        else return redirect()->to($response->data->authorization_url); 
    }
    
    public function verify(){
        \abort_if(!request()->query('trxref'),400);
        $transactionRef = request()->query('trxref');
        $response = Curl::to('https://api.paystack.co/transaction/verify/'.$transactionRef)
         ->withHeader('Authorization: Bearer sk_live_d5e00e32507982cd85010f382d438f794ecd63f9')
         ->get();
        $paymentDetails = json_decode($response);
        \abort_if(!$paymentDetails || !$paymentDetails->status ,400);
        $payment_status = $paymentDetails->data->status;
        if($payment_status != 'success'){
            return redirect()->route('havron.error');
        }else{
            return redirect()->route('havron.success');
        }
    }


    public function success(){
        return view('havron.success');
    }

    public function error(){
        return view('havron.error');
    }

    
}
