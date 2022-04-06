<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //$admins contain "SCREEN_ID","SCREEN_NAME","SCREEN_DESCRIPTION","SCREEN_LINK","FLAG","UPDATED_AT","CREATED_AT
        $admins = Http::get('http://localhost/suprsales_api/Screen/create_screen/')->json();
         // It shows the announcement in the top announcement btn
         //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
        if (isset(Auth::user()->id)) {
            //it gives the emp_id with authenticated user ID
            $ids = Auth::user()->emp_id;
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
            //It shows authenticated uses references and store it in $ann
            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
      /*If $ann is not null
       then for each $ann value is set in $val
       if 'auth_reference' of $val specified id equals to 'screens'
       then take $count=1 */
            $count = 0;
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'screens') {
                        $count = 1;
                        break;
                    }
                }
            }
           //The compact() function is used to convert given variable to array in
        // which the key of the array will be the name of the variable and the value of the array will be the value of the variable.
            if ($count == 1) {
                return view('screen')->with(compact('announcement', 'admins', 'ann'));
            }
        // it will return 404 eror if the user is not authenticate
             else {
                return redirect('error');
            }
        }// otherwise it will return to the userlogin page
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
    //$screen_name collect screen_name from employees
        $screen_name = $request->get('screen_name');
    //$screen_description collect screen_description from employees
        $screen_description = $request->get('screen_description');
    //$screen_path collect screen_path from employees
        $screen_path = $request->get('screen_path');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost',
        ]);

        $response = $client->request('POST', '/suprsales_api/Screen/create_screen/api-create.php', [
            'json' => [
             //It create the api as SCREEN_NAME get from screen_name
                'SCREEN_NAME' => $screen_name,
             //It create the api as SCREEN_DESCRIPTION get from screen_description
                'SCREEN_DESCRIPTION' => $screen_description,
             //It create the api as SCREEN_LINK get from screen_path
                'SCREEN_LINK' => $screen_path
            ]
        ]);

        if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
            return redirect('/screens')->with('message', 'Screen Inserted Successfully');
        } else {
            return redirect('/screens')->with('error', 'Screen Not Addded');
        }
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
  // It Update the details after Create Screen and all the details gets from users
    public function update(Request $request, $id)
    {
    //in $screen_name put the data by get 'screen_name'
        $screen_name = $request->get('screen_name');
    //in $screen_description put the data by get 'screen_description'
        $screen_description = $request->get('screen_description');
    ////in $flag put the data by route 'flag'
        $flag = $request->get('flag');
    //in $id put the data by route 'screen'
        $id = $request->route('screen');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost',
        ]);
// /Put the requested data to the api-update.php inside create_screen inside suprsales_api in Json format
        $response = $client->request('PUT', '/suprsales_api/Screen/create_screen/api-update.php?id=' . $id, [
            'json' =>
            
            [
                'SCREEN_NAME' => $screen_name,
                'SCREEN_DESCRIPTION' => $screen_description,
                'FLAG' => $flag
            ]
        ]);

        if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
            return redirect('/screens')->with('message', 'Screen Updated Successfully');
        } else {
            return redirect('/screens')->with('error', 'Screen Not Updated');
        }
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
