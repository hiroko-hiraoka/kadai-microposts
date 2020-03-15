<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Micropost;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Micropost::query();
    
    //$request->input()で検索時に入力した項目を取得します。
    if(!empty($keyword))
  {
    $query->where('maker','like','%'.$keyword.'%')->orWhere('title','like','%'.$keyword.'%');
  }
 
  #ページネーション
  $data = $query->orderBy('created_at','desc')->paginate(10);
  return view('welcom')->with('data',$data)
                        ->with('keyword',$keyword)
                         ->with('maker','メーカー名');
        
    }
}    