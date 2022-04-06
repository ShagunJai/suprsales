<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AssignedTaskController extends Controller
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
		 $task = Http::get('http://localhost/suprsales_api/Task/getMyAssignedTask.php?id='.$ids)->json();
		 $priority = Http::get('http://localhost/suprsales_api/Task/assignedTaskPriorityChart.php?id='.$ids)->json();
		 $task_status = Http::get('http://localhost/suprsales_api/Task/assignedTaskStatusChart.php?id='.$ids)->json();
		 $emp = Http::get('http://localhost/suprsales_api/Employee/getReportingEmp.php?id='.$ids)->json();
		 $team_status =  Http::get('http://localhost/suprsales_api/Task/assignedTeamStatusChart.php?id='.$ids)->json();
		
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'assigntask'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('assignedTask')->with(compact('announcement','ann','emp','task','priority','task_status','team_status'));
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
    public function show(Request $request, $id)
    {
        if(isset(Auth::user()->id)){
			
	  $id = $request->route('assigntask'); 
	  $ids = Auth::user()->emp_id;
	  
	  $details = Http::get('http://localhost/suprsales_api/Task/getMyAssignedTask.php?id='.$ids)->json();
        
		$count = 0;	
		
		if(isset($details)){
		foreach($details as $value){
			if($value['TASK_ID'] == $id){
				$count = $count + 1;	
				break;
			}
			
		}
		}
		
		if($count != 0){
		 
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 
	  $task_det = Http::get('http://localhost/suprsales_api/Task/getTaskDetail.php?id='.$id)->json();
	  $emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		
		return view('assignedActivity')->with(compact('announcement','ann','task_det','emp'));
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
