<?php

namespace App\Http\Controllers;

use App\Content;
use App\Like;
use App\Like_User;
use App\Liker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content_id = $request['contentId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $content = Content::find($content_id);
        if (!$content) {
            return null;
        }
        $user = Auth::user();
        $userid = Auth::user()->id;
        $like= Like_User::where('content_id', $content_id)->where('user_id', $userid)->get();
        $anylike = Like::where('content_id', $content_id)->get();
        $getlikes = Like::where('content_id', $content_id)->first();
        if ((count($like) > 0)) {
            $already_like = 1;
            $update = true;
            if ($already_like == $is_like) {
                $getlikes->like=$getlikes->like-1;
                $getlikes->save();
                $ans_liker =Liker::where('content_id', $content_id)->where('user_id', $userid)->get();
                if (count($ans_liker)>0)
                {
                    foreach ($ans_liker as $ans_likers)
                    {
                        $ans_likers->delete();
                    }

                }

                foreach ($like as $likes){
                    $likes->delete();
                }
                return null;
            }
        } else if (count($anylike)<1){
            $liker=new Liker();
            $liker->content_id= $content_id;
            $liker->user_id= $userid;
            $liker->save();
            $like = new Like();
            $like->like = 1;
            $like->content_id = $content_id;
            if ($update) {
                $like->update();
            } else {
                $like->save();
            }
            $userslike=new Like_User();
            $userslike->content_id=$content_id;
            $userslike->user_id=Auth::user()->id;
            $userslike->save();
            return null;
        }
        else {
            $getlikes->like=$getlikes->like+1;
            $getlikes->save();
            $userslike=new Like_User();
            $userslike->content_id=$content_id;
            $userslike->user_id=Auth::user()->id;
            $userslike->save();

            $liker=new Liker();
            $liker->content_id= $content_id;
            $liker->user_id= $userid;
            $liker->save();
            return null;
        }
    }


}
