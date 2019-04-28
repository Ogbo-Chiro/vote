<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Voted;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        //get all candidates according to position
        $chairmen = Candidate::where('position', 'Chairman')->get();
        $chairladies = Candidate::where('position', 'Chairlady')->get();
        $itreps = Candidate::where('position', 'IT Rep')->get();

        $clubreps = Candidate::where('position', 'Clubs Rep')->get();
        $acadsreps = Candidate::where('position', 'Academic Rep')->get();
        $entreps = Candidate::where('position', 'Entertainment Rep')->get();


        $secretaries = Candidate::where('position', 'Secretary')->get();
        $sportsreps = Candidate::where('position', 'Sports Rep')->get();
        $treasurers = Candidate::where('position', 'Treasurer')->get();


        $wellnessreps = Candidate::where('position', 'Wellness Rep')->get();
        $honorcouncils = Candidate::where('position', 'Honor Council')->get();

        //check  status
        $query = User::where('isAdmin', 1)->get();
        $status = $query[0]->status;

        if($status == 'closed'){   
            $available = 'closed';
        }
        elseif($status == 'open'){
            $available = 'open';
        }
        else{
            //meaning it has ended
            $available = 'ended';
        }

        return view('home', [
            'chairmen' => $chairmen,
            'chairladies' => $chairladies,
            'itreps' => $itreps,
            'clubsreps' => $clubreps,
            'acadsreps' => $acadsreps,
            'entreps' => $entreps,
            'secretaries' => $secretaries,
            'sportsreps' => $sportsreps,
            'treasurers' => $treasurers,
            'wellnessreps' => $wellnessreps,
            'honorcouncils' => $honorcouncils,     
            'status' => $available,
        ]);
    }


  

    public function vote(Request $request)
    {
        $user_id = Auth::id();
        //get all users answers and add to their votes
        $vote = new Voted;

        $chairman = $request->chairman;
        $vote->Chairman = $chairman;
        if($chairman != 'none'){
            $query = Candidate::where('id', $chairman)->increment('votes');
        }

        $chairlady = $request->chairlady;
        $vote->Chairlady = $chairlady;
        if($chairlady != 'none'){
            $query = Candidate::where('id', $chairlady)->increment('votes');
        }
        $itrep = $request->itrep;
        $vote->ITRep = $itrep;
        if($itrep != 'none'){
            $query = Candidate::where('id', $itrep)->increment('votes');
        }
        $clubsrep = $request->clubsrep;
        $vote->ClubsRep = $clubsrep;    
        if($clubsrep != 'none'){
            $query = Candidate::where('id', $clubsrep)->increment('votes');
        }
        $acadsrep = $request->acadsrep;
        $vote->AcademicRep = $acadsrep;
        if($acadsrep != 'none'){
            $query = Candidate::where('id', $acadsrep)->increment('votes');
        }
        $entrep = $request->entrep;
        $vote->EntertainmentRep = $entrep;
        if($entrep != 'none'){
            $query = Candidate::where('id', $entrep)->increment('votes');
        }
        $secretary = $request->secretary;
        $vote->Secretary = $secretary;
        if($secretary != 'none'){
            $query = Candidate::where('id', $secretary)->increment('votes');
        }
        $sportsrep = $request->sportsrep;
        $vote->SportsRep = $sportsrep;
        if($sportsrep != 'none'){
            $query = Candidate::where('id', $sportsrep)->increment('votes');
        }
        $treasurer = $request->treasurer;
        $vote->Treasurer = $treasurer;  
        if($treasurer != 'none'){
            $query = Candidate::where('id', $treasurer)->increment('votes');
        }
        $wellnessrep = $request->wellnessrep;
        $vote->WellnessRep = $wellnessrep;
        if($wellnessrep != 'none'){
            $query = Candidate::where('id', $wellnessrep)->increment('votes');
        }
        $honorcouncil = $request->honorcouncil;
        $vote->HonorCouncil = $honorcouncil;
        if($honorcouncil != 'none'){
            $query = Candidate::where('id', $honorcouncil)->increment('votes');
        }


        $email = Auth::user()->email;

        $vote->email = $email;

        $vote->save();
        $query = User::where('id', $user_id)->update(['isVoted'=> 1]);

        return back();
    }
    
    public function get_results(){
        $query = User::where('isAdmin', 1)->get();
        $available = $query[0]->status;
        $candidates  = Candidate::orderBy('position', 'DESC')->where('position', '!=' , 'Honor Council')->get();

        if($available == 'ended'){   

        return view('results.final', [
            'runners' => $candidates
        ]);    
    }

        else{

            $user_id = Auth::id();
            $query = User::where('id', $user_id)->get();
            if($query[0]->isAdmin == 1){
            return view('results.final', [
                'runners' => $candidates
            ]);                  
            }
            else{
            return back();
            }
        }
    }

        public function candidates(){
            $candidates  = Candidate::orderBy('position', 'DESC')->get();

            return view('candidates', [
            'runners' => $candidates,
        ]);    
    }
}
