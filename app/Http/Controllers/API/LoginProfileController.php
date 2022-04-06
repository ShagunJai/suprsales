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
           //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
        if (isset(Auth::user()->id)) {
        //it gives the emp_id with authenticated user ID in $emp
            $ids = Auth::user()->emp_id;
      // It shows the announcement in the top announcement btn
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

            // {{-- $data contain all employee get by their ids from database through controller set as values it used in LoginProfile.blade.php --}}
            $data = Http::get('http://localhost/suprsales_api/Employee/getById.php?id=' . $ids)->json();
           //It shows authenticated uses references and store it in $ann
            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
           //The compact() function is used to convert given variable to array in
         // which the key of the array will be the name of the variable 'announcement', 'data', 'ann' array will be the value of the variable.
            return view('loginProfile')->with(compact('announcement', 'data', 'ann'));
        }
        // otherwise it will return to the userlogin page
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
        //authenticate user give request with email to reset the password
        if (Auth::user()->email == $request->email) {
            $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',

            ]);
        //    if it is true then this generate a token with random number
            $token = Str::random(60);
        //  The randome number is set in the database for that password with returns the current date and time
            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );
        //   This is for update the as set in the database
            $updatePassword = DB::table('password_resets')
                ->where(['email' => $request->email, 'token' => $token])
                ->first();
        //  If the updated value is not set in the database inen it called invalid token
            if (!$updatePassword)
                return back()->withInput()->with('error', 'Invalid token!');
        // // if there is no issue to update then this step is continued
            $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email' => $request->email])->delete();
          // after update  it will start the regenerate token when the season start
            Auth::logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();

          // it shows that the password has changes and redirect to userlogin page
            return redirect('userlogin')->with('message', 'Your password has been changed!');

            //return redirect('/loginprofile')->with('message', 'Your password has been changed!');
        }
        // if there is any error it will redirect to the loginprofile page and shows error
        else {
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
    // It is for the update mobile number and the profile picture
    public function update(Request $request, $id)
    {

        $mobile = $request->get('mobile');
        $id = $request->route('loginprofile');
        $count = 0;

        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            //$file->resize(320, 240);
            // this is use to set the profile picture with width and height to set the profile
            $data = getimagesize($file);
            $width = $data[0];
            $height = $data[1];
            if ($width >= 250 && $height >= 250) {
                $count = 1;
            }
            // the uploaded image is store in the $image as $file
            $image = $file->getClientOriginalName();
            //files that are going to be publicly accessible.
            Storage::disk('public')->put($image,  File::get($file));
        } //comparing the authenticated user image with the author of the picture
        else {
            $image = Auth::user()->image;
        }

        if ($count == 0) {
            $client = new Client([
                'base_uri' => 'http://localhost',
            ]);
            // After clicking the update inside edit btn the image and the mobile number update in the api in update - emp . php inside employee
            $response = $client->request('PUT', '/suprsales_api/Employee/update-emp.php?id=' . $id, [
                'json' =>
                [
                    'EMP_MOBILE_NO' => $mobile,
                    'EMP_IMAGE' => $image
                ]



            ]);
        } else {
            return redirect('/loginprofile')->with('error', 'Please Upload image with dimensions less than or equal to 250 X 250.');
        }

        if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
            return redirect('/loginprofile')->with('message', 'Profile Edited Successfully');
        } else {
            return redirect('/loginprofile')->with('error', 'Profile Not Edited');
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
