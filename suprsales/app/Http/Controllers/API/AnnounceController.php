<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;
use Auth;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $announc = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/')->json();
		$type = Http::get('http://localhost/suprsales_api/Announcement/')->json();
		 $region = Http::get('http://localhost/suprsales_api/Region/')->json();
		
		if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'announce'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('createAnn')->with(compact('announcement','announc','type','ann','region'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
		
		//return response()->view('createAnn', $data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $announcement_id = $request->get('announcement_id');
		$announcement_name = $request->get('announcement_name');
		$announcement_valid_from = $request->get('announcement_valid_from');
		$announcement_valid_to = $request->get('announcement_valid_to');
		$announcement_description = $request->get('announcement_description');
		$region_id = $request->get('region_id');
		
		list($month1, $day1, $year1) = explode('/', $announcement_valid_from);
		$announcement_valid_FROM = $year1.'-'.$month1.'-'.$day1;
		
		list($month2, $day2, $year2) = explode('/', $announcement_valid_to);
		$announcement_valid_TO = $year2.'-'.$month2.'-'.$day2;
		
		if($request->hasFile('filename')){
		$file = $request->file('filename');
		$image = $file->getClientOriginalName();
		Storage::disk('public')->put($image,  File::get($file));
		}
		else
		{
			$image = null;
		}
	$id = Auth::user()->emp_id;

		$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://localhost',
		]);
 
	$response = $client->request('POST', '/suprsales_api/Announcement/create_announcement/api-create.php', [
	'json' => 
                [
        'ANNOUNCEMENT_ID'=> $announcement_id,
		'file'=> $image,
        'TITLE' => $announcement_name,
		'VALID_FROM' => $announcement_valid_FROM,
		'VALID_TILL' => $announcement_valid_TO,
		'DESCRIPTION' => $announcement_description,
		'REGION_ID' => $region_id,
		'EMP_ID'=> $id
                ]
           
        
    
	]);
	
	//dd($response);
	if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/announce')->with('message','Annoucement Added Successfully');
	   }
	   else{
		   return redirect('/announce')->with('error','Annoucement Not Added');
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
       $announcement_id = $request->get('announcement_id');
		$announcement_name = $request->get('announcement_name');
		$announcement_valid_from = $request->get('announcement_valid_from');
		$announcement_valid_to = $request->get('announcement_valid_to');
		$announcement_description = $request->get('announcement_description');
		$region_id = $request->get('region_id');
		$flag = $request->get('flag');
	  $id = $request->route('announce'); 
	  $ids = Auth::user()->emp_id;
		
		if($request->hasFile('filename')){
		$filename = $request->file('filename');
		
		$image = $filename->getClientOriginalName();
		Storage::disk('public')->put($image,  File::get($filename));
		}
		else
		{
			$announc = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/')->json();
			foreach ($announc as $value)
			 {
				 if($value['ANNOUNCE_ID'] == $id)
				 {
					 $image = $value['IMAGE'];
				 }
			 }
		}
		
      

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);
       
      $response = $client->request('PUT', '/suprsales_api/Announcement/create_announcement/api-update.php?id='.$id, [
        'json' => [
          'ANNOUNCEMENT_ID'=> $announcement_id,
		'file'=> $image,
        'TITLE' => $announcement_name,
		'VALID_FROM' => $announcement_valid_from,
		'VALID_TILL' => $announcement_valid_to,
		'DESCRIPTION' => $announcement_description,
		'REGION_ID' => $region_id,
		'EMP_ID'=> $ids,
          'FLAG' => $flag,
        ]
      ]);
      if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/announce')->with('message','Annoucement Updated Successfully');
	   }
	   else{
		   return redirect('/announce')->with('error','Annoucement Not Updated');
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
