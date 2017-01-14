<?php

namespace App\Http\Controllers;

use App\Benefit;
use App\Content;
use App\Job;
use App\Subscriber;
use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=> array()]);
    }
    public function feed()
    {
        $content=Content::orderBy('created_at', 'desc')->paginate(30);
        return view('feed')->withContent($content);
    }

    public function myprofile()
    {
        $user=Auth::user();
        $benefits= Benefit::where('user_id', $user->id)->first();
        $content= Content::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(30);
        $jobs=Job::all();
        $myjobs=DB::table('jobs_users')->where('user_id', Auth::id())->get();
        return view('self_profile')->withUser($user)->withBenefits($benefits)->with('image', 'uploads/'. Session::get('image'))->withContent($content)
            ->withJobs($jobs)->withMyjobs($myjobs);
    }

    public function userprofile($slug)
    {
        if($slug==Auth::user()->slug)
        {
           return redirect('profile');
        }
        $user= User::where('slug', $slug)->first();
        $benefits= Benefit::where('user_id', $user->id)->first();
        $content= Content::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(30);
        $userjobs=DB::table('jobs_users')->where('user_id', $user->id)->get();
        $subscribing=Subscriber::where('subscriber',$user->id)->get();//follow row where i'm the follower
        $subscriber =Subscriber::where('subscribee',$user->id)->get();//follow row where i'm the followee
        return view('user_profile')->withUser($user)->withBenefits($benefits)->withContent($content)
            ->withSubscribing($subscribing)->withSubscriber($subscriber)->withUserjobs($userjobs);
    }

    public function search(Request $request)
    {
        $searchquery=$request->searchquery;
        $searchresult= User::where('name','like',"%$searchquery%")->orderBy('name', 'desc')->paginate(50);
        return view('searchresult')->withSearchresult($searchresult)->withSearchquery($searchquery);

    }

    public function showComments($id)
    {
        $content_id= $id;
        $contents=Content::find($content_id);
        return view('comment')->withContent_id($content_id)->withContents($contents);

    }
}
