<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Save_link;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['save'])){
            $saurl = $_GET['save'];
        }else{
            $saurl = '';
        }
        //echo $saurl;
        if($saurl == ''){
            return view('homepage');    
        }
        else{          
            if (Auth::check()) {
                $user_id = Auth::user()->id;
                
                $slink = new Save_link;
                $slink->user_id = $user_id;
                $slink->link_url = $saurl;
                $slink->save();
                //return view('success');
                Session::flash('flash_message', 'Successfully added!');
                return redirect()->action('BookmarkController@listing', [$user_id]);
                //return redirect()->route('bookmark.listing', array('user_id' => $user_id));
                //Redirect::route('bookmark.index',array('user_id' => $user_id,'msg' =>'Success'));
            }else{
                Session::flash('flash_message', 'Need to Login');
                return redirect()->action('UserLoginController@index');     
            }
        }
    }

    public function show($parm = FALSE){
        // if(isset($parm)){
        //     if($parm != ''){
        //         //$user = Auth::user();
        //         if (Auth::check()) {
        //             $user_id = Auth::user()->id;
        //             //echo $_GET['save'];
        //             echo $parm;
        //             //echo $uri = $this->request->path();

        //             exit;


        //         }else{
        //             echo 'go back';
        //         }
        //     }else{
        //         return view('homepage');    
        //     }
        // }else{
        //     echo 'here we go';
        // }
    }
}
