<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Mail;
use Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LoginProfileController extends Controller
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
		
	   $data = Http::get('http://localhost/suprsales_api/Employee/getById.php?id='.$ids)->json();
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		
		return view('loginProfile')->with(compact('announcement','data','ann'));
		}
		else {
			return redirect('userlogin');
		}
        //return view('loginProfile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
		$file = $request->file('filename');
		$image = $file->getClientOriginalName();
		$image->resize(320, 240);
		Storage::disk('public')->put($image,  File::get($file));
		*/
		if(Auth::user()->email == $request->email){
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
		
		 Auth::logout();
	 $request->session()->invalidate();

    $request->session()->regenerateToken();
	 
	 
     return redirect('userlogin')->with('message', 'Your password has been changed!');

          //return redirect('/loginprofile')->with('message', 'Your password has been changed!');
		}
		else
		{
			return redirect('/loginprofile')->with('error', 'Please enter your registered email');
		}
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
		$mobile = $request->get('mobile');
		$id = $request->route('loginprofile'); 
		 $count = 0;
		 
		 if($request->hasFile('filename')){
		$file = $request->file('filename');
		 //$file->resize(320, 240);
		 $data = getimagesize($file);
		 $width = $data[0];
		 $height = $data[1];
		 if($width >= 250 && $height>= 250){
			$count = 1; 
		 }
			 
		 $image = $file->getClientOriginalName();
		
		 Storage::disk('public')->put($image,  File::get($file));
		}
		else
		{	
			$image = Auth::user()->image;
		}
		 
		 if($count == 0){
		 $client = new Client([
    'base_uri' => 'http://localhost',
		]);
 
	$response = $client->request('PUT', '/suprsales_api/Employee/update-emp.php?id='.$id, [
	'json' => 
                [
        'EMP_MOBILE_NO'=> $mobile,
		'EMP_IMAGE'=> $image
                ]
           
        
    
	]);
		 }
		 else
		 {
			 return redirect('/loginprofile')->with('error','Please Upload image with dimensions less than or equal to 250 X 250.');
		 }
	
	if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/loginprofile')->with('message','Profile Edited Successfully');
	   }
	   else{
		   return redirect('/loginprofile')->with('error','Profile Not Edited');
	   }
	
     
    

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
