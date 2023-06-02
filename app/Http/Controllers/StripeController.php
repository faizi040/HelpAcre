<?php

namespace App\Http\Controllers;
use App\Models\project;
use App\Models\payment;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function makePayment($amount,$projectId){

        \Stripe\Stripe::setApiKey
        ('sk_test_51N5QndFedBnjuJXgKwMWvnyPVOWgMnV04IjxsQtAjDXLTAuqy9zGPC7dLnzKQR3buYS9HeGpTl49t3Nfwvlv21xA00gp8VU47s');
            $charge = \Stripe\Charge::create([
                'source' => $_POST['stripeToken'],
                'description' => "HelpAcre=>Donation reached Successfully",
                'amount' => $amount * 100,
                'currency' => 'pkr',
            ]);
            if($charge->status == 'succeeded'){
                $donarName = Auth()->user()->name;
                $project = Project::find($projectId);
                $payment = new payment();
                $payment->project_id = $project->id;
                $payment->project_title = $project->title;
                $payment->donor_name = $donarName;
                $payment->amount = $amount;
                $payment->save();

             return view('user.success');
            }
            else{
                echo 'fail';
            }
    }
}
