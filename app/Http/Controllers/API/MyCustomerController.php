<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class MyCustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

   //  Index() is use for the control the index page
  public function index()
  {
     // It shows the announcement in the top announcement btn
    //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
    if (isset(Auth::user()->id)) {
      $ids = Auth::user()->emp_id;
     //   It shows the updated announcements in every page top contain all the Announcement from get getAnnouncementByRegion.php
      $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
    // It i=compare the authenticate users get by ids
      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
    // for the customer authentication it compare tha custoer by id
      $cust = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id=' . $ids)->json();


      $count = 0;
      if (isset($ann)) {
        foreach ($ann as $val) {
          if ($val['auth_reference'] == 'mycutomer') {
            $count = 1;
            break;
          }
        }
      }
      //The compact() function is used to convert given variable to array in which the key of the array
     //will be the name of the variable and the value of the array will be the value of the variable.
      if ($count == 1) {
        return view('myCustomer')->with(compact('announcement', 'ann', 'cust'));
    }
    // It shows error after verification
       else {
        return redirect('error');
      }
    }
    // IF there is no error after verificatin then it will show the it will redirect to login page
     else {
      return redirect('userlogin');
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   **/
//  It is fof the edit option inside the MyCustomer It help to get and store the edited data from users
  public function editcust(Request $request, $id, $code)
  {
    $cust_name = $request->get('cust_name');
    $cust_mob = $request->get('cust_mob');
    $cust_bank = $request->get('cust_bank');
    $flag = $request->get('flag');
    $id = $request->route('mycutomer');
    $code = $request->route('code');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);
    //   It is for update the edited data from users and updated to api
    $response = $client->request('PUT', '/suprsales_api/Customer/api-update.php?id=' . $id . '&code=' . $code, [
      'json' => [
        'CUST_NAME' => $cust_name,
        'CUST_MOB' => $cust_mob,
        'CUST_BANK_ACCOUNT' => $cust_bank,
        'FLAG' => $flag
      ]
    ]);

    return redirect('/mycutomer')->with('message', 'Customer Updated Successfully');
  }

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

//    Get the Balance chart from api and store it to $balance and get by Id
  public function shows(Request $request, $id, $code)
  {
    //   Handeling the request
    $id = $request->route('mycutomer');
    $code = $request->route('code');

    $balance = Http::get('http://localhost/suprsales_api/Customer/getCustomerBalChart.php?id=' . $id . '&code=' . $code)->json();

 
    $userData['data'] = $balance;
//    After encoded the balance data it will show to the users
    echo json_encode($userData);
    exit;
  }

  public function ledger(Request $request, $id, $code, $type)
  {
    $id = $request->route('mycutomer');
    $code = $request->route('code');
    $type = $request->route('type');


    $ledger = Http::get('http://localhost/suprsales_api/Ledger/viewLedger.php?id=' . $id . '&code=' . $code)->json();


    $userData['data'] = $ledger;

    echo json_encode($userData);
    exit;
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
    //
  }
}
