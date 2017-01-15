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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=> array()]);
    }
    public function feed(Request $request)
    {
        $subcon=array();$subconid=array();$f=0;$g=0;
        $subscribe=Subscriber::where('subscriber', Auth::id())->get();
        foreach ($subscribe as $subscribes)
        {
            $subcon[$f]= Content::where('user_id',User::find($subscribes->subscribee)->id)->orderBy('created_at', 'desc')->get();
            foreach ($subcon[$f] as $subcons)
            {
                $subconid[$g]=$subcons->id;
                $g++;
            }
            $f++;
        }
        $thecontent=array();
        $u=0;
        foreach ($subconid as $subconids)
        {
            $thecontent[$u]=Content::find($subconids);
            $u++;
        }

        $page = Input::get('page', 1); // Get the current page or default to 1, this is what you miss!
        $perPage = 30;
        $offset = ($page * $perPage) - $perPage;
        $content =  new LengthAwarePaginator(array_slice($thecontent, $offset, $perPage, true), count($thecontent), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);
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
