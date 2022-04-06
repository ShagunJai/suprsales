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


class PartialapproveController extends Controller
{
      public function index()
      {
        if(isset(Auth::user()->id)){
            //$emp = Auth::user()->emp_id;
            //$admins = Http::get('http://localhost/suprsales_api/Stock/getStockByEmp.php?id='.$emp)->json();
            $ids = Auth::user()->emp_id;
           // $details= Http::get('http://localhost/suprsales_api/customerOrder/skuListByCustomerId.php?id='.$ids)->json();
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
        
        $count = 0;
        if(isset($ann)){
        foreach ($ann as $val) {
            if($val['auth_reference'] == 'approve'){
                $count = 1;	
                break;
            }
        } 
    }
        
        if($count == 1){
            return view('partialapprove')->with(compact('announcement','ann'));
        }
        else{
            return redirect('error');
        }
        }
         else {
            return redirect('userlogin');
        }
    }
}