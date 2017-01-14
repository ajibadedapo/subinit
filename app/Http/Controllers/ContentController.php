<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ContentController extends Controller
{
    public function createstatus(Request $request)
    {
        $status= new Content();
        $status->status= $request->status;
        $status->user_id= Auth::user()->id;
        $status->type= 'status';
        $status->save();
    }

    public function createvideo(Request $request)
    {
        $file = $request->file('video');;
        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        if ($file->move('videocontent', $fileName))
        {

        $video= new Content();
        $video->title= $request->input('title');
        $video->description= $request->input('description');
        $video->user_id= Auth::user()->id;
        $video->video= $fileName;
        $video->type= 'video';
        $video->save();
        }
        $extension = $file->getClientOriginalExtension();
        return response()->json();
    }

    public function createphoto(Request $request)
    {
        $file = $request->file('photo');;
        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        if ($file->move('imagecontent', $fileName))
        {

            $photo= new Content();
            $photo->title= $request->input('title');
            $photo->description= $request->input('description');
            $photo->user_id= Auth::user()->id;
            $photo->image= $fileName;
            $photo->type= 'photo';
            $photo->save();
        }
        return response()->json();
    }

    public function createaudio(Request $request)
    {
        $file = $request->file('audio');
        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        if ($file->move('audiocontent', $fileName))
        {
            $audio= new Content();
            $audio->title= $request->input('title');
            $audio->description= $request->input('description');
            $audio->user_id= Auth::user()->id;
            $audio->audio= $fileName;
            $audio->type= 'audio';
            $audio->save();
        }
        return response()->json();
    }

    public function createdocument(Request $request)
    {
        $file = $request->file('document');;
        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        if ($file->move('documentcontent', $fileName))
        {
            $document= new Content();
            $document->title= $request->input('title');
            $document->description= $request->input('description');
            $document->user_id= Auth::user()->id;
            $document->document= $fileName;
            $document->type= 'document';
            $document->save();
        }
        $extension = $file->getClientOriginalExtension();
        return response()->json();
    }

    public function downloadpdf(Request $request)
    {
          return response()->download(public_path('documentcontent/'.$request->pdfname));
    }

    public function deletecontent(Request $request)
    {
          Content::find($request->contentid)->delete();
    }
}
