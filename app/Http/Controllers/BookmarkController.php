<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Route;
use View;
use Auth;
use App\Save_link;

class BookmarkController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($parm1)
    {
        echo $parm1;
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    public function listing($parm){

        $save_links = DB::table('save_links')        
            ->select('save_links.*')
            ->where('save_links.user_id', $parm)
            ->get();
        // $roles = Role::all();
        return view('success')->withTypes($save_links);         
    }

    public function delete($id){
        $user_id = Auth::user()->id;
        DB::table('save_links')
            ->where('id', $id)
            ->delete();   
        Session::flash('flash_message', 'Successfully deleted!');
        return redirect()->action('BookmarkController@listing', [$user_id]);               
    }

}
