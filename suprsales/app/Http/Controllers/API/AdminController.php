<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function index()
    {
        //return view('typeAnn', $data);
		//$data['admins'] = $this->fillView();
		//$data1= Config::get('site_vars.supportEmail');
		
		$details = Http::get('http://localhost/suprsales_api/Admin/')->json();
        
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'adminn'){
				$count = 1;	
				break;
			}
        }
		}
		
		
		if($count == 1){
			return view('admin')->with(compact('announcement','details','ann'));
		}
		else{
			return redirect('error');
		}
		}
		else {
			return redirect('userlogin');
		}
		
    }
	
	/**public function filter(Request $request)
    {
        $EMP_NAME = $request->EMP_NAME;
		if(!empty($EMP_NAME)){
		$user = Admin::where('EMP_NAME', $EMP_NAME)->orderby('EMP_NAME')->get(); 
		}
		return view( 'admin' );
		
			  
	   //return response()->view('admin');
    }*/
	
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
      return redirect('/adminn');  
		
		
    }
	
	public function activate(Request $request)
    {
      
		$emp = $request->get('emp'); 

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);
       
      $response = $client->request('PUT', '/suprsales_api/Employee/api-update.php', [
        'json' => [
          'EMP_ID' => $emp
        ]
      ]);
      //dd($response);
      return redirect('/adminn');  
		
		
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
	  $id = $request->route('id'); 

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);
       
      $response = $client->request('PUT', '/suprsales_api/Employee/api-update.php', [
        'json' => [
          'EMP_ID' => $id
        ]
      ]);
      
      return redirect('/adminn');
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
