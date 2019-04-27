<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Storage;

class AdminController extends Controller
{
	    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function admin()
    {

    $count = User::where('isVoted', 1)->count();

    return view('admin.admin', [
            'count' => $count
        ]);    
    }

    public function esc(){
        //get number voted
          $count = User::where('isVoted', 1)->count();

          //get candidates
          $candidates  = Candidate::get();

          //get number left
          //no. of users - admin

          //get status of elections
          $admin_id = Auth::id();
          $admin = User::where('id', $admin_id)->get();
          $status = $admin[0]->status;



          $users = User::count() - 1;
          $left = $users - $count;

        return view('admin.esc', [
            'count' => $count,
            'runners' => $candidates,
            'left' => $left,
            'status' => $status
        ]);    
    }
      public function add(Request $request)
    {
        $candidate = new Candidate;
        
        $candidate->first_name = $request->fname;
        $candidate->last_name = $request->lname;
        $candidate->position = $request->position;
        $candidate->votes = 0;
        $candidate->photo = '';

        $candidate->save();

        return back();
    }


        public function add_user(Request $request)
    {

        $user = new User;

        $user->name = 'voter';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->isVoted = 0;

        $user->save();

        return back();
    }


    public function release(Request $request){
      $command = $request->available;
      if($command == 'Release Results'){
        $admin_id = Auth::id();
        $query = User::where('id', $admin_id)->update(['status'=>'ended']);

        return back();
      }
      else{
        return back();
      }
    }

    public function change(Request $request){
      $command = $request->open;
      if($command == 'Open'){

        $query = User::where('isAdmin', 1)->update(['status'=>'open']);

        return back();
      }
      else{
        return back();
      }
    }

    public function load_users(){
        //get number voted
        $users = User::where('isAdmin', NULL)->get();

        return view('admin.users', [
            'users' => $users,
        ]);    
    }

    public function remove(Request, $request){
        //get number voted
        $user = $request->removing;
        $query = User::where('id', $user)->delete();

        return back();
    }
}
