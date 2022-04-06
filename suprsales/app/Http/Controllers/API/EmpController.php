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
    public function store(Request $request)
    {
        $emp = $request->get('emp');
		$flag = $request->get('flag');

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);

      $response = $client->request('POST', '/suprsales_api/Employee/api-update.php', [
        'json' => [
          'EMP_ID' => $emp,
		  'FLAG' => $flag
        ]
      ]);
      //dd($response);
	 //echo $response->getBody();
      return redirect('/empss');
    }

    public function reset(Request $request)
    {
		$request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);

		$token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        $updatePassword = DB::table('password_resets')
                            ->where(['email' => $request->email, 'token' => $token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();


          return redirect('/empss')->with('message', 'Password has been changed!');


    }
	public function shows(Request $request, $id, $code)
    {
        $id = $request->route('empss');
	  $code = $request->route('code');

      $balance = Http::get('http://localhost/suprsales_api/Login_Details/loginById.php?id='.$id.'&device_type='.$code)->json();


     $userData['data'] = $balance;

     echo json_encode($userData);
     exit;
    }

    public function show(Request $request, $id)
    {
		if(isset(Auth::user()->id)){

      $id = $request->route('empss');
	  $ids = Auth::user()->emp_id;

	  $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'empss'){
				$count = 1;
				break;
			}
        }
	}

		if($count == 1){

		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();

		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();

		$cust = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id='.$id)->json();

		return view('custEmp',['emp' => $id])->with(compact('announcement','ann','cust'));
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
        $request->validate([
            'emp_id' => 'required|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);


          $user = User::where('emp_id', $request->emp_id)
                      ->update(['password' => Hash::make($request->password)]);

			if(Auth::user()->emp_id == $request->emp_id){
				Auth::logout();
	 $request->session()->invalidate();

    $request->session()->regenerateToken();


     return redirect('userlogin')->with('message', 'Your password has been changed!');
			}
			else{

          return redirect('/empss')->with('message', 'Password has been changed!');
			}
    }


	public function editemp(Request $request, $id, $editemp)
    {



        //$type=Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();


        $id = $request->route('empss');
	    $editemp = $request->route('editemp');


        $reporting_manager=$request->get('rep_mgr');
        $approver = $request->get('emp_approver');
	    $ownership = $request->get('ownership');
		$vehicle_type = $request->get('vehicle_type');


      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);




      $response = $client->request('PUT', '/suprsales_api/Employee/updateVehicle.php?id='.$id, [
        'json' => [
         'APPROVER_ID' => $approver,
         'REPORTING_MANAGER_ID' => $reporting_manager,

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
