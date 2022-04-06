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

    //to get the data from api and store the value inside $ann,$task,$announcement,

    public function index()
    {
        if (isset(Auth::user()->id)) {
            $ids = Auth::user()->emp_id;
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
            // $ann contains all Reference by ID and get from suprsales_api
            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
            // $task contains all Assign task by ID and get from suprsales_api
            $task = Http::get('http://localhost/suprsales_api/Task/getMyAssignedTask.php?id=' . $ids)->json();
            // $priority contains all  given Assign task priorith by ID and get from suprsales_api
            $priority = Http::get('http://localhost/suprsales_api/Task/assignedTaskPriorityChart.php?id=' . $ids)->json();
            // $task_status contains all  given Assign task Status by ID and get from suprsales_api
            $task_status = Http::get('http://localhost/suprsales_api/Task/assignedTaskStatusChart.php?id=' . $ids)->json();
            // $emp contains all reporting employee and get from suprsales_api
            $emp = Http::get('http://localhost/suprsales_api/Employee/getReportingEmp.php?id=' . $ids)->json();
            //$team_status shows the complete task status how much completed and it get from api define by ID
            $team_status =  Http::get('http://localhost/suprsales_api/Task/assignedTeamStatusChart.php?id=' . $ids)->json();

            $count = 0;
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'assigntask') {
                        $count = 1;
                        break;
                    }
                }
            }
            //The compact() function is used to convert given variable to array in which the key of the array
            //will be the name of the variable and the value of the array will be the value of the variable.

            if ($count == 1) {
                return view('assignedTask')->with(compact('announcement', 'ann', 'emp', 'task', 'priority', 'task_status', 'team_status'));
            }
            // it will return 404 eror if the user is not authenticate

            else {
                return redirect('error');
            }
        }
        // Otherwise it will back to userlogin page
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
        if (isset(Auth::user()->id)) {
            //    It continue after conforming the user
            $id = $request->route('assigntask');
            $ids = Auth::user()->emp_id;
            //  It shows all the assignTask from api and store in $details
            $details = Http::get('http://localhost/suprsales_api/Task/getMyAssignedTask.php?id=' . $ids)->json();

            $count = 0;
            // it is the assign task work with the time
            if (isset($details)) {
                foreach ($details as $value) {
                    if ($value['TASK_ID'] == $id) {
                        $count = $count + 1;
                        break;
                    }
                }
            }

            if ($count != 0) {
                //  It shows the announcement inside create announcement shows from the getAnnouncementByRegion . php
                $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
                // Authorize user shows by the ids from Auth_Reference get from suprsales_api
                $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
                //  It shows the task detais and store inside $details get from suprsales_api
                $task_det = Http::get('http://localhost/suprsales_api/Task/getTaskDetail.php?id=' . $id)->json();
                //$emp contais emp_id and employee_name getting from getEmp.php from suprsales_api
                $emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
                // This return all the values in array format
                return view('assignedActivity')->with(compact('announcement', 'ann', 'task_det', 'emp'));
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
