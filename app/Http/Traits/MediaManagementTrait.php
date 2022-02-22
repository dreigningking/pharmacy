<?php
namespace App\Http\Traits;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait MediaManagementTrait
{
    protected function dropzone(Request $request){
        $user = Auth::user();
        $ext = $request->file('file')->getClientOriginalExtension();
        $fileName = $user->id.rand().time().'.'.$ext;
        $format = strstr($request->file('file')->getClientMimeType(),'/',true);
        if(in_array($ext,['jpg','png','gif','jpeg']))
        $request->file('file')->storeAs('public/media/image',$fileName);
        elseif(in_array($ext,['mp3','wav']))
        $request->file('file')->storeAs('public/media/audio',$fileName);
        else
        $request->file('file')->storeAs('public/media/video',$fileName);
        $media = Media::create(['user_id'=> $user->id,'name'=> $fileName,'format'=> $format ]);
    }

    protected function summernote(Request $request){
        request()->validate([
            'file' => 'required',
        ]);
        $user = Auth::user();
        $ext = $request->file('file')->getClientOriginalExtension();
        $imageName = $user->id.rand().time().'.'.$ext;
        $media = Media::create(['name' => $imageName,'format' => 'image','user_id'=> $user->id]); //create media to database
        $request->file('file')->storeAs('public/media/image',$imageName);//save the file to public folder
        return asset('storage/media/image/'.$imageName);
    }

    protected function uploadImage(Request $request){
        
        $user = Auth::user();
        $ext = $request->file('file')->getClientOriginalExtension();
        $imageName = $user->id.rand().time().'.'.$ext;
        $media = Media::create(['name' => $imageName,'format' => 'image','user_id'=> $user->id]); //create media to database
        $request->file('file')->storeAs('public/media',$imageName);//save the file to public folder
        return $media;
    }
}

