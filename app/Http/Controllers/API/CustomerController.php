<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
//  Index() is use for the control the index page
  public function index()
  {
    //$cust contain "TYPE_CODE":"","EMP_NAME":"","TYPE":"","CUSTOMER_ID":"","RELATIONSHIP":"","CUSTOMER_NAME":"","CUSTOMER_CITY":"","CUSTOMER_MOB":"","CUSTOMER_BANK_ACC_NO":"","CUSTOMER_STATUS":"","VERIFICATION_DOC":"","VERIFICATION_STATUS"
       $cust = Http::get('http://localhost/suprsales_api/Customer/')->json();
    //$tpe contain customer type code customer type name
       $type = Http::get('http://localhost/suprsales_api/Customer_Type_Master/')->json();
     // It shows the announcement in the top announcement btn
    //if the user has not logged in. Auth::user() is used to get the currently authenticated user.

    if (isset(Auth::user()->id)) {
      $ids = Auth::user()->emp_id;
    //   It shows the updated announcements in every page top contain all the Announcement from get getAnnouncementByRegion.php
      $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
    // It i=compare the authenticate users get by ids
      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
    // for the customer authentication it compare tha custoer by id
      $count = 0;
      if (isset($ann)) {
        foreach ($ann as $val) {
          if ($val['auth_reference'] == 'customer') {
            $count = 1;
            break;
          }
        }
      }
     //The compact() function is used to convert given variable to array in which the key of the array
     //will be the name of the variable and the value of the array will be the value of the variable.

      if ($count == 1) {
        return view('customer')->with(compact('cust', 'type', 'announcement', 'ann'));
      }
     // it will return 404 eror if the user is not authenticate
      else {
        return redirect('error');
      }
    } else {
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
      // list your route arguments after your other dependencies:

  public function show(Request $request, $id)
  {
    //   Routing in Laravel allows to route all your application requests to its appropriate controller.
    $id = $request->route('customer');
    // a button inside view that can allow user to download file without navigating to any other view or route
    return response()->download('storage/verification/' . $id);
  }

  public function shows(Request $request, $id, $code)
  {
    $id = $request->route('customer');
    $code = $request->route('code');

    $balance = Http::get('http://localhost/suprsales_api/Customer/getCustomerBalChart.php?id=' . $id . '&code=' . $code)->json();


    $userData['data'] = $balance;

    echo json_encode($userData);
    exit;
  }

  public function ledger(Request $request, $id, $code, $type)
  {
    $id = $request->route('customer');
    $code = $request->route('code');
    $type = $request->route('type');


    $ledger = Http::get('http://localhost/suprsales_api/Ledger/viewLedger.php?id=' . $id . '&code=' . $code)->json();


    $userData['data'] = $ledger;

    echo json_encode($userData);
    exit;
  }

//For update the customer inside My Customer Edit option inside the Action
  public function update(Request $request, $id, $code)
  {
    $cust_name = $request->get('cust_name');
    $cust_mob = $request->get('cust_mob');
    $cust_bank = $request->get('cust_bank');
    $flag = $request->get('flag');
    $id = $request->route('customer');
    $code = $request->route('code');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

    $response = $client->request('PUT', '/suprsales_api/Customer/api-update.php?id=' . $id . '&code=' . $code, [
      'json' => [
        'CUST_NAME' => $cust_name,
        'CUST_MOB' => $cust_mob,
        'CUST_BANK_ACCOUNT' => $cust_bank,
        'FLAG' => $flag
      ]
    ]);
    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/customer')->with('message', 'Customer Updated Successfully');
    } else {
      return redirect('/customer')->with('error', 'Customer Not Updated');
    }
  }


  public function editcust(Request $request, $id, $code)
  {
    $cust_name = $request->get('cust_name');
    $cust_mob = $request->get('cust_mob');
    $cust_bank = $request->get('cust_bank');
    $flag = $request->get('flag');
    $id = $request->route('customer');
    $code = $request->route('code');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

    $response = $client->request('PUT', '/suprsales_api/Customer/api-update.php?id=' . $id . '&code=' . $code, [
      'json' => [
        'CUST_NAME' => $cust_name,
        'CUST_MOB' => $cust_mob,
        'CUST_BANK_ACCOUNT' => $cust_bank,
        'FLAG' => $flag
      ]
    ]);

    return redirect('/customer')->with('message', 'Customer Updated Successfully');
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
