<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpClient\HttpClient;
use GuzzleHttp\Client;
use Auth;
use Response;
//use Illuminate\Http\Request;


class CreateorderController extends Controller
{
      public function index()
      {
        if(isset(Auth::user()->id)){
            //$emp = Auth::user()->emp_id;
            //$admins = Http::get('http://localhost/suprsales_api/Stock/getStockByEmp.php?id='.$emp)->json();
            $ids = Auth::user()->emp_id;
            $details= Http::get('http://localhost/suprsales_api/customerOrder/skuListByCustomerId.php?id='.$ids)->json();
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
            $custo=Http::get('http://localhost/suprsales_api/customerOrder/getCustomerOrderByCustID.php?id='.$ids.'&start_date='.'&end_date=')->json();
		
        $count = 0;
        if(isset($ann)){
        foreach ($ann as $val) {
            if($val['auth_reference'] == 'createorder'){
                $count = 1;	
                break;
            }
        } 
    }
        
        if($count == 1){
            return view('createOrder')->with(compact('announcement','ann','details','custo'));
        }
        else{
            return redirect('error');
        }
        }
         else {
            return redirect('userlogin');
        }
    }
    public function store(Request $request)
    {
       // $emp = Auth::user()->emp_id;
        $ids = Auth::user()->emp_id;
         $skuu_id = $request->get('skuu_id');
         $Total_sku_value = $request->get('Total_sku_value');//$sku_quantity*
          $Total_order_value = $request->get('Total_order_value');
           $qnt = $request->get('qnt');
         $client = new Client([
          'base_uri' => 'http://localhost',
        ]);
                 $response = $client->request('POST', '/suprsales_api/customerOrder/createOrder.php', [
            'json' => [
             'SKU_ID' => $skuu_id,
             'SKU_QUANTITY' => $qnt,
              'TOTAL_SKU_VALUE' => $Total_sku_value,
              'TOTAL_ORDER_VALUE' => $Total_order_value, 
              'CUSTOMER_ID'=> $ids         ]
        ]);
        //echo "<script>console.log('Debug Objects: " . $response . "' );</script>";



        //echo $response;}
        return redirect('/createorder');}
}