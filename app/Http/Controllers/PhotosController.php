<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo; // 追加
use Storage;  // 追加
use App\User;
use App\Micropost;

class PhotosController extends Controller
{
     public function add()
  {
      return view('photos.create');
  }
  
  public function create(Request $request)
  {
      $user = \Auth::user();
      
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('image');
      
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFileAs('microposts_photo', $image, \Auth::id().'.jpg','public');
      
      // アップロードした画像のフルパスを取得
      $user->icon = Storage::disk('s3')->url($path);

      $user->save();

      return back();
  }
  
  
   public function create2(Request $request, $id)
  {
        
      $user = \Auth::user();
      $micropost = Micropost::find($id);
      
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('image');
      
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFileAs('microposts_photo2', $image, \Auth::id().'.jpg','public');
      
      // アップロードした画像のフルパスを取得

      $micropost->image_path = Storage::disk('s3')->url($path);
      
      $micropost->save();

      return redirect('/');
  }
  
  

  
}
