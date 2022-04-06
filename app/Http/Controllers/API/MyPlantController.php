<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;


class MyPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
        if (isset(Auth::user()->id)) {
        //it gives the emp_id with authenticated user ID in $emp
            $emp = Auth::user()->emp_id;
            //  $admins is a variable which contain all the plant and the regions
            $admins = Http::get('http://localhost/suprsales_api/Plant/getPlantByRegion.php?id=' . $emp)->json();

        //it gives the emp_id with authenticated user ID insie $ids
            $ids = Auth::user()->emp_id;
      // It shows the announcement in the top announcement btn
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

      //It shows authenticated uses references and store it in $ann
            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
      /*If $ann is not null
       then for each $ann value is set in $val
       if 'auth_reference' of $val specified id equals to 'myplant'
       then take $count=1 */
            $count = 0;
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'myplant') {
                        $count = 1;
                        break;
                    }
                }
            }
           //The compact() function is used to convert given variable to array in
        // which the key of the array will be the name of the variable 'announcement', 'admins', 'ann' array will be the value of the variable.

            if ($count == 1) {
                return view('myPlant')->with(compact('announcement', 'admins', 'ann'));
            }
            // it will return 404 eror if the user is not authenticate
             else {
                return redirect('error');
            }
        }
        // otherwise it will return to the userlogin page
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
