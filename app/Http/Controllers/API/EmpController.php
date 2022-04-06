<?php

namespace App\Http\Controllers\API;

use App\Http\Traits\EmployeeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Hash;

class EmpController extends Controller
{
    use EmployeeTrait;


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//   It collect the EMP_ID and FLAG to select the Action btn Activate/Deactivate get from the users
    public function store(Request $request)
    {
     //$emp collect emp from users
        $emp = $request->get('emp');
     //$flag collect flag from users
        $flag = $request->get('flag');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost',
        ]);
   // 'POST used to send data to a server to create/update a resource
   //To update the requested data to the api-update.php inside Employee inside suprsales_api in json format
           $response = $client->request('POST', '/suprsales_api/Employee/api-update.php', [
            'json' => [
            //It create the api as EMP_ID get from emp
                'EMP_ID' => $emp,
            //It create the api as FLAG get from flag
                'FLAG' => $flag
            ]
        ]);
        //dd($response);
        //echo $response->getBody();
        // After selecting the Action it will automatically redirect the all employess page
        return redirect('/empss');
    }
    // To Reset the Password and update the new password and update the data
    public function reset(Request $request)
    {
    //It will check the users exists or not after check the users it will chage the users
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);
    //generate random string of specific length.
    // to generate random number and store in the $token veriable and we set the token inside password_resets
    $token = Str::random(60);
    //It will reset the password and set password as a random number
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
    //It will check the reset password
        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $token])
            ->first();
    //It checks the not updated password if there is any error it will show error
        if (!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');
    // It give request for the email wher eto change the password
        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
     //It will update the database with new password_resets
        DB::table('password_resets')->where(['email' => $request->email])->delete();

    //After reset the password t will automatically redirect the All Employee page as empss
        return redirect('/empss')->with('message', 'Password has been changed!');
    }
    // list your route arguments after your other dependencies:
  // It shows the data define by the login_ID get from Api
    public function shows(Request $request, $id, $code)
    {
      //  in $id put the data by route 'empss'
        $id = $request->route('empss');
      //  in $code put the data by route 'code'
        $code = $request->route('code');
      //$balance contan all login id get from the API
        $balance = Http::get('http://localhost/suprsales_api/Login_Details/loginById.php?id=' . $id . '&device_type=' . $code)->json();
      // Store the $balance data as an array
        $userData['data'] = $balance;
      //Encode the userdata in the json format
        echo json_encode($userData);
        exit;
    }

    public function show(Request $request, $id)
    {
      //it gives the emp_id with authenticated user ID
        if (isset(Auth::user()->id)) {
      //  in $id put the data by route 'empss'
            $id = $request->route('empss');
            $ids = Auth::user()->emp_id;
      //It shows authenticated uses references and store it in $ann
            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
      //initialize the $count =0
            $count = 0;
      /*If $ann is not null
       then for each $ann value is set in $val
       if 'auth_reference' of $val specified id equals to 'empss'
       then take $count=1 */
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'empss') {
                        $count = 1;
                        break;
                    }
                }
            }
         //If count became 1 then
            if ($count == 1) {

                $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
          //It shows authenticated uses references and store it in $ann by their ID
                $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
          //$cust contain the Customers and define by their ID
                $cust = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id=' . $id)->json();
            //The  compact() function is used to convert given variable to array in which the key of the array will be the name of the variable and the value of the array will be the value of the variable
            // it will make the array of announcement', 'ann', 'cust' and store it inside the  .
                return view('custEmp', ['emp' => $id])->with(compact('announcement', 'ann', 'cust'));
            }
          // it will return 404 eror if the cust is not authenticate
            else {
                return redirect('error');
            }
        }
        // otherwise it will return to the userlogin page
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
    //  update function  is used for update the cutomer password afer verify the users by email
    public function update(Request $request, $id)
    {
        $request->validate([
            'emp_id' => 'required|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);

    //    It update the password with respective EMP_ID
        $user = User::where('emp_id', $request->emp_id)
            ->update(['password' => Hash::make($request->password)]);
    //If The EMP_ID is equal to requested EMP_ID Then it will invalidate the session and regenerate the Token for the password
        if (Auth::user()->emp_id == $request->emp_id) {
            Auth::logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();
          //After regenerate the token it will redirect the userlogin page
            return redirect('userlogin')->with('message', 'Your password has been changed!');
        }
         // otherwise it will redirect the All Employee page
        else {

            return redirect('/empss')->with('message', 'Password has been changed!');
        }
    }



    // It shows the employee details inside the edit btn form
    public function editemp(Request $request, $id, $editemp)
    {
       //$id put the data by route 'empss'
        $id = $request->route('empss');
        //$editemp put the data by route  'editemp'
        $editemp = $request->route('editemp');
        //$ownership collect auth_name from 'ownership'
        $ownership = $request->get('ownership');
        //$vehicle_type collect auth_name from 'vehicle_type'
      $vehicle_type = $request->get('vehicle_type');
        //$reporting_manager collectd  auth_name from 'rep_mgr'
        $reporting_manager = $request->get('rep_mgr');
        //$approver collect auth_name from 'emp_approver'
        $approver = $request->get('emp_approver');
        //$employee_type collect auth_name from 'employee_type'
        $employee_type = $request->get('employee_type');


        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost',
        ]);
        // /Put the requested data to the updateVehicle.php inside Employee inside suprsales_api in Json format after that api update the data
        $response = $client->request('PUT', '/suprsales_api/Employee/updateVehicle.php?id=' . $id, [
            'json' => [
                // Contain the data from users
                'APPROVER_NAME' => $approver,
                'REPORTING_MANAGER_NAME' => $reporting_manager,

                'VEHICLE_OWNERSHIP' => $ownership,
                'VEHICLE_TYPE' => $vehicle_type


            ]
        ]);
        // dd($response);
        //echo $response->getBody();
        return redirect('/empss');
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
