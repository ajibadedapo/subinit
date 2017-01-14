<?php

namespace App\Http\Controllers;

use App\Benefit;
use App\Job;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Session;

class ProfileController extends Controller
{
    public function savecover(Request $request)
    {
        $rules = array(
            'image' => 'required|mimes:jpeg,jpg|max:10000'
        );

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails())
        {
            return response()->json(['error'=> 'error', 'name'=> $request->input() ]);
        }
        else
        {
            $file = Input::file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $user=Auth::user();
            $user->cover_photo= $fileName;
            $user->update();

            if ($file->move('uploads', $fileName))
            {
                return view('coverphotopreview')->with('image', 'uploads/'.$fileName)->withUser($user);
            }
            else
            {
                return "Error uploading file";
            }
        }
    }
    public function savedp(Request $request)
    {
        $rules = array(
            'image' => 'required|mimes:jpeg,jpg|max:10000'
        );

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails())
        {
            return response()->json(['error'=> 'error', 'name'=> $request->input() ]);
        }
        else
        {
            $file = Input::file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $user=Auth::user();
            $user->profile_photo= $fileName;
            $user->update();

            if ($file->move('uploads', $fileName))
            {
                return view('profilephotopreview')->with('image', 'uploads/'.$fileName)->withUser($user);
            }
            else
            {
                return "Error uploading file";
            }
        }
    }

    public function jcrop(Request $request)
    {
        $quality = 90;

        if(!(Input::get('w')))
        {
            return redirect('profile/'.Auth::user()->slug);
        }
        $src  = $request->image;
        if ($request->image==null)
        {

        }
        $img  = imagecreatefromjpeg($src);
        $dest = ImageCreateTrueColor(Input::get('w'),
            Input::get('h'));
        imagecopyresampled($dest, $img, 0, 0, Input::get('x'),
            Input::get('y'), Input::get('w'), Input::get('h'),
            Input::get('w'), Input::get('h'));
        imagejpeg($dest, $src, $quality);
       return redirect('profile/'.Auth::user()->slug);
    }

   public function editprofilename(Request $request)
    {
        $user= Auth::user();
        $user->name =$request->name;
        $user->slug =str_replace(' ', '-', $request->name);
        $user->save();
        return response()->json(['name'=> $request->name ]);
    }

   public function price(Request $request)
    {
        $user= Auth::user();
        $user->price =$request->price;
        $user->save();
        return response()->json(['price'=> $request->price ]);
    }

    public function editbenefits(Request $request)
    {
        $existingbenefit= Benefit::where('user_id', Auth::user()->id)->first();
        if($existingbenefit)
        {
            $existingbenefit->benefit1= $request->benefitvalue1;
            $existingbenefit->benefit2= $request->benefitvalue2;
            $existingbenefit->benefit3= $request->benefitvalue3;
            $existingbenefit->benefit4= $request->benefitvalue4;
            $existingbenefit->benefit5= $request->benefitvalue5;
            $existingbenefit->user_id= Auth::user()->id;
           return  $existingbenefit->update();
        }
            $benefit= new Benefit();
            $benefit->benefit1= $request->benefitvalue1;
            $benefit->benefit2= $request->benefitvalue2;
            $benefit->benefit3= $request->benefitvalue3;
            $benefit->benefit4= $request->benefitvalue4;
            $benefit->benefit5= $request->benefitvalue5;
            $benefit->user_id= Auth::user()->id;
            $benefit->save();

    }

    public function updatejob(Request $request)
    {
         $requestjob=  $request->job;
         DB::table('jobs_users')->where('user_id', Auth::id())->delete();
        $alljobs= Job::all();
        $jobarray=array();$i=0;
        foreach ($alljobs as $alljob)
        {
            $jobarray[$i]=$alljob->job;
            $i++;
        }

         $newjobs=(array_diff($requestjob, $jobarray));
         foreach ($newjobs as $newjob)
         {
             $job= new Job();
             $job->job= $newjob;
             $job->slug= str_replace(' ', '_', $newjob);
             $job->save();
         }
        Auth::user()->jobs()->sync((str_replace(' ', '_', $requestjob)), false);
        
        return response()->json(['requestjob'=> $requestjob ]);

    }


}
