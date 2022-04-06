<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class DelegatedActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
        if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 
		
		
		
			return view('delegatedActivity')->with(compact('announcement','ann','emp'));
		
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
        if ($request->has('TASK_ATTACHMENT')) {
		$task_id = $request->get('task_id');
        $attachments = array();
		
        if($request->hasFile('TASK_ATTACHMENT')){
		foreach($request->file('TASK_ATTACHMENT') as $file) {
		$name = $file->getClientOriginalName();
		array_push($attachments, $name);
		$path = "task/".$task_id."/".$name;
		Storage::disk('public')->put($path,  File::get($file));
		}
		}
		else {
			$attachments = null;
		}
		
		
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Task/uploadTaskAttachment.php?id='.$task_id, [
			'json' => [
				'TASK_ATTACHMENT' => $attachments
			]
		]);
		
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/delegatedtask/'.$task_id)->with('message','Attachment Added Successfully');
	   }
	   else{
		   return redirect('/delegatedtask/'.$task_id)->with('error','Attachment Not Added');
	   }
	   
		}
		
		else if($request->has('ACTIVITY_ATTACHMENT')){
			
		$task_id = $request->get('task_id');
		$activity_id = $request->get('activity_id');
        $attachments = array();
		
        if($request->hasFile('ACTIVITY_ATTACHMENT')){
		foreach($request->file('ACTIVITY_ATTACHMENT') as $file) {
		$name = $file->getClientOriginalName();
		array_push($attachments, $name);
		$path = "task/".$task_id."/".$activity_id."/".$name;
		Storage::disk('public')->put($path,  File::get($file));
		}
		}
		else {
			$attachments = null;
		}
		
		
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Task/uploadActivityAttachment.php?id='.$activity_id, [
			'json' => [
				'ACTIVITY_ATTACHMENT' => $attachments
			]
		]);
		
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/delegatedtask/'.$task_id)->with('message','Activity Attachment Added Successfully');
	   }
	   else{
		   return redirect('/delegatedtask/'.$task_id)->with('error','Activity Attachment Not Added');
	   }
	   
			
			
		}
		
		else {
			
	    $activity_name = $request->get('activity_name');
		$startdate = $request->get('startdate');
		$enddate = $request->get('enddate');
		$assigned = $request->get('assigned');
		$description = $request->get('description');
		
		$task_id = $request->get('task_id');
		
		list($month1, $day1, $year1) = explode('/', $startdate);
		$START_DATE = $year1.'-'.$month1.'-'.$day1;
		
		list($month2, $day2, $year2) = explode('/', $enddate);
		$DUE_DATE = $year2.'-'.$month2.'-'.$day2;
		
		
		
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Task/createActivity.php?id='.$task_id, [
			'json' => [
				'ACTIVITY_HEADER' => $activity_name,
				'ACTIVITY_DESCRIPTION' => $description,
				'ACTIVITY_OWNER' => $assigned,
				'START_DATE' => $START_DATE,
				'DUE_DATE' => $DUE_DATE
			]
		]);
		
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/delegatedtask/'.$task_id)->with('message','Activity Created Successfully');
	   }
	   else{
		   return redirect('/delegatedtask/'.$task_id)->with('error','Activity Not Created');
	   }
		
			
		}
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
	  $id = $request->route('delegatedactivity'); 
	  list($delegate_to, $act_id) = explode('_', $id);
     //check if id matches team memeber id of task only then open like profilecontrollr
	  $ids = Auth::user()->emp_id;
	 
	  $details = Http::get('http://localhost/suprsales_api/Task/getTaskDetail.php?id='.$act_id)->json();
        
		$count = 0;	
		
		if(isset($details)){
		foreach($details as $value){
			foreach($value['ACTIVITY'] as $acti){
				if($acti['ACTIVITY_DELIGATION'] != null){
				foreach($acti['ACTIVITY_DELIGATION'] as $act){
			if($act['DELIGATED_TO'] == $delegate_to){
				$count = 1;	
			}
			else if($act['DELIGATION_FROM'] == $delegate_to){
				$count = 1;	
			}
			
			}
			
				}	
		}
		}
		}
	  
	  
	 
		if($count != 0){
	    $data = Http::get('http://localhost/suprsales_api/Employee/getById.php?id='.$delegate_to)->json();
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
          
		$assignment_id = $request->get('assignment_id');
		$status = $request->get('status');
		$duedate = $request->get('duedate');
		$flag = $request->get('flag');
		$act_desc = $request->get('act_desc');
		$emp_id = Auth::user()->emp_id;
		$task_id = $request->get('task_id');
	  $id = $request->route('delegatedactivity'); 
	 
	  
      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);
       
      $response = $client->request('PUT', '/suprsales_api/Task/updateActivityDeligated.php?id='.$id.'&emp_id='.$emp_id, [
        'json' => [
		'COMPLETION_STATUS'=> $status,
        'DELIGATED_TO' => $assignment_id,
		'DUE_DATE' => $duedate,
		'FLAG' => $flag,
		'ACTIVITY_DESCRIPTION' => $act_desc
        ]
      ]);
      if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/delegatedtask/'.$task_id)->with('message','Activity Updated Successfully');
	   }
	   else{
		   return redirect('/delegatedtask/'.$task_id)->with('error','Activity Not Updated');
	   }
	   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
		if ($request->has('activity_id')) {
		$id = $request->route('delegatedactivity');
		$task_id = $request->get('task_id');
		$activity_id = $request->get('activity_id');
		
		//$path = "task/".$task_id."/".$name;
        return response()->download('storage/task/'.$task_id."/".$activity_id.'/'.$id);
			
		}
		else {
		$id = $request->route('delegatedactivity');
		$task_id = $request->get('task_id');
		
		//$path = "task/".$task_id."/".$name;
        return response()->download('storage/task/'.$task_id."/".$id);
    }
	}
}
