<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;

class Error404Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // It shows the error
    public function index()
    {
        //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
        if (isset(Auth::user()->id)) {

            $ids = Auth::user()->emp_id;
         //   It shows the updated announcements in every page top contain all the Announcement from get getAnnouncementByRegion.php
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

         // It i=compare the authenticate users get by ids
            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
          //The compact() function is used to convert given variable to array in which the key of the array
         //will be the name of the variable and the value of the array will be the value of the variable.
            return view('error404')->with(compact('announcement', 'ann'));
        }
    // It shows error after verification
        else {
            return redirect('userlogin');
        }
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
}
