<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->id)){
         $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		return view('profile')->with(compact('announcement','ann'));
        }
        else {
			return redirect('userlogin');
		}
        //return view('profile');
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
    public function show(Request $request, $id)
    {
		if(isset(Auth::user()->id)){
	  $id = $request->route('profile'); 
     
	  $ids = Auth::user()->emp_id;
	  $details = Http::get('http://localhost/suprsales_api/Contacts/?id='.$ids)->json();
        
		$count = 0;	
		
		if(isset($details)){
		foreach($details as $value){
			if($value['REPORTING_MANAGER_ID'] == $id){
				$count = 1;	
				break;
			}
			foreach($value['EMPLOYEE'] as $employee){
				if($employee['EMP_ID'] == $id){
				$count = 2;	
				break;
			}
			foreach($employee['EMPLOYEE'] as $emp){
				if($emp['EMP_ID'] == $id){
				$count = 3;	
				break;
			}
			foreach($emp['EMPLOYEE'] as $emps){
				if($emps['EMP_ID'] == $id){
				$count = 4;	
				break;
			}
			}
			}
		}
		}
		}
		
		if($count != 0){
	    $data = Http::get('http://localhost/suprsales_api/Employee/getById.php?id='.$id)->json();
	   $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
	  $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
	  return view('profile')->with(compact('announcement','data','ann'));
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
