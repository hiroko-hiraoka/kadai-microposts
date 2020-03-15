<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Micropost; // 追加

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = Micropost::orderBy('created_at', 'desc')->paginate(5);
            
            
            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }
        
        return view('welcome', $data);
    }


    public function create()
    {
        $micropost = new Micropost;
        
        return view('microposts.create', [
            'micropost' => $micropost,
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'maker' => 'required|max:191',
            'title' => 'required|max:191',
            'content' => 'required|max:191',
            'field' => 'required|max:30',
            'class' => 'required|max:30',
            'standard_a' => 'max:30',
            'standard_b' => 'max:30',
        ]);
        
        $request->user()->microposts()->create([
            'maker' => $request->maker,
            'title' => $request->title,
            'content' => $request->content,
            'field' => $request->field,
            'class' => $request->class,
            'standard_a' => $request->standard_a,
            'standard_b' => $request->standard_b,
        ]);
        
        return redirect('/');
    }
    
     public function show($id)
    {
        $micropost = Micropost::find($id);
        
             return view('microposts.show', [
                'micropost' => $micropost,
            ]);

    }
    
    
    public function edit($id)
    {
        $micropost = Micropost::find($id);
        
        if (\Auth::id() === $micropost->user_id) {
            return view('microposts.edit',[
                'micropost' => $micropost,
            ]);
        }
        return redirect('/');
    }
    
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'maker' => 'required|max:191',
            'title' => 'required|max:191',
            'content' => 'required|max:191',
            'field' => 'required|max:30',
            'class' => 'required|max:30',
            'standard_a' => 'max:30',
            'standard_b' => 'max:30',
        ]);
      
        $micropost = Micropost::find($id);
        
        if (\Auth::id() === $micropost->user_id) {
            
            $micropost->maker = $request->maker;
            $micropost->title = $request->title;
            $micropost->content = $request->content;
            $micropost->field = $request->field;
            $micropost->class = $request->class;
            $micropost->standard_a = $request->standard_a;
            $micropost->standard_b = $request->standard_b;
            $micropost->save();
        return redirect('/');
        }
        return redirect('/');
    }
    
    
    public function destroy($id)
    {
        $micropost = \App\Micropost::find($id);
        
        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }
        
        return back();
    }
    
    public function like()
    {
        $data = [];
        if (\Auth::id() === $micropost->user_id) {
            $user = \Auth::user();
            $microposts = $user->like_microposts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'micropost' => $microposts,
             ];
         }
         return view('users.favorites', $data);
    }

}



