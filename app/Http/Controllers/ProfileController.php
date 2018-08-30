<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Book;
use Response;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
       return view('user.profile')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $users=DB::table('users')->where('name',$name)->get();
        return view('user.profilepage')->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function change_img(Request $request,$username){
       $this->validate($request,[
           'avatar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]);
       if ($request->hasFile('avatar')){
           $imgExt = $request->file('avatar')->getClientOriginalExtension();
           $picname = time().'avatar.'.$imgExt;
           $request->file('avatar')->move(public_path("/avatars"), $picname);
       }
       $user=User::where('username',$username)->first();
       $user->avatar=$picname;
       $user->save();
       return redirect('/profile');

   }

    public function edit(Request $request,$username)
    {
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'username'=>'required|string|max:20',
            'email'=>'required|string|email|max:255',
        ]);



        $user=User::where('username',$username)->first();
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->bio=$request->input('bio');
        $user->email=$request->input('email');
        $user->save();
        return redirect('/profile');
    }
    public function editform($username)
    {
        $users=DB::table('users')->where('username',$username)->first();
        return view('user.edit')->with('users',$users);
     
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($username)
    {
        $users_info=DB::table('users')->where('username',$username)->get();
        $books_info=DB::table('books')->where('username',$username)->get();

        return view('user.info')->with(['users_info'=>$users_info,'books_info'=>$books_info]);
        

    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Book::find($id);
        $user->delete();
        return back();
    }
}
