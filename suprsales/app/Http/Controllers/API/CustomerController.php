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
    public function index()
    {
        $cust = Http::get('http://localhost/suprsales_api/Customer/')->json();
		$type = Http::get('http://localhost/suprsales_api/Customer_Type_Master/')->json();
		 
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'customer'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('customer')->with(compact('cust','type','announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
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
	  public function show(Request $request, $id){
		  $id = $request->route('customer'); 
       return response()->download('storage/verification/'.$id);
		
	  }
	  
    public function shows(Request $request, $id, $code)
    {
        $id = $request->route('customer'); 
	  $code = $request->route('code');
	   
      $balance = Http::get('http://localhost/suprsales_api/Customer/getCustomerBalChart.php?id='.$id.'&code='.$code)->json();
		
     
     $userData['data'] = $balance;

     echo json_encode($userData);
     exit;
    }
	
	public function ledger(Request $request, $id, $code, $type)
    {
        $id = $request->route('customer');
		$code = $request->route('code');
		$type = $request->route('type');
	  
	   
      $ledger = Http::get('http://localhost/suprsales_api/Ledger/viewLedger.php?id='.$id.'&code='.$code)->json();
		
     
     $userData['data'] = $ledger;

     echo json_encode($userData);
     exit;
    }

   
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
       
      $response = $client->request('PUT', '/suprsales_api/Customer/api-update.php?id='.$id.'&code='.$code, [
        'json' => [
          'CUST_NAME' => $cust_name,
		  'CUST_MOB' => $cust_mob,
		  'CUST_BANK_ACCOUNT' => $cust_bank,
          'FLAG' => $flag
        ]
      ]);
     if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/customer')->with('message','Customer Updated Successfully');
	   }
	   else{
		   return redirect('/customer')->with('error','Customer Not Updated');
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
       
      $response = $client->request('PUT', '/suprsales_api/Customer/api-update.php?id='.$id.'&code='.$code, [
        'json' => [
          'CUST_NAME' => $cust_name,
		  'CUST_MOB' => $cust_mob,
		  'CUST_BANK_ACCOUNT' => $cust_bank,
          'FLAG' => $flag
        ]
      ]);
      
      return redirect('/customer')->with('message','Customer Updated Successfully');
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
