<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Token;
use Symfony\Component\Console\Tests\Input;
use App\Subscriber;
use Session;

class SubscriptionController extends Controller
{
    public function getSubForm()
    {
       $recid=($_GET['recid']);
        $user=Auth::user();
        return view('subscription.subscription_formd')->withUser($user)->withRecid($recid);
    }

    public function join(Request $request)
    {
        //$apikey= $request->recidsk;
        $user=User::find($request->recid);
        $lsk=$user->lsk;
        Stripe::setApiKey($lsk);
        $user->newSubscription('main', 'palplan')->create($request->token, []);
        $subscribe=new Subscriber();
        $subscribe->subscriber=Auth::user()->id;
        $subscribe->subscribee=$request->recid;
        $subscribe->save();
    }

    public function registerforpayment(Request $request)
    {
        $user= Auth::user();
        $user->price= $request->price;
        $user->lsk= $request->lsk;
        $user->lpk= $request->lpk;
        $user->save();
        Session::flash('registerforpayment','');
        return redirect('/profile');
    }
}
