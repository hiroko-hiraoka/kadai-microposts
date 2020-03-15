<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        Return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $micropossts =$user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $micropossts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    
        public function edit($id)
    {
        $user = User::find($id);
        
        if (\Auth::id() === $user->id) {
            return view('users.edit',[
                'user' => $user,
            ]);
        }
        return redirect('/');
    }
    

        public function update(Request $request, $id)    // 追加
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'password' => 'required|max:191',
            'icon' => 'max:191',
        ]);
      
        $user = User::find($id);
        
        if (\Auth::id() === $user->id) {
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->icon = $user->icon;
            $user->save();
        return redirect('/');
        }
        return redirect('/');
    }
    
    
    public function destroy($id)    // 追加
    {
        $user = \App\User::find($id);
        
        if (\Auth::id() === $user->id) {
            $user->delete();
        }
        
        return redirect('/');
    }

    
    
    public function followings($id)
    {
               $followings = $user->followings()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followings', $data);
    }
    
    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followers', $data);
    }
    
    
        public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(10);
        
        $data = [
            'user' => $user,
            'favorites' => $favorites,
        ];
        
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }
    
    
}

