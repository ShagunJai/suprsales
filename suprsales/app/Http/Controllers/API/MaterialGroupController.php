<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class MaterialGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mat = Http::get('http://localhost/suprsales_api/Material_Group/getMaterialGroup.php/')->json();
         
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'material'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('material')->with(compact('announcement','ann','mat'));
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
         $id = $request->route('material'); 
		 $ids = Auth::user()->emp_id;
		 
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'material'){
				$count = 1;	
				break;
			}
        }
	}
	
	if($count == 1){
         
         
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();	
		
		$sk = Http::get('http://localhost/suprsales_api/Stock/getSku.php?id='.$id)->json();	
		
		return view('sku')->with(compact('announcement','ann','sk'));
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
       $GROUP_ID = $request->get('GROUP_ID');
        $GROUP_NAME = $request->get('GROUP_NAME');
        $FLAG = $request->get('FLAG');
        $id = $request->route('material'); 
  
  
        $client = new Client([
          // Base URI is used with relative requests
          'base_uri' => 'http://localhost',
        ]);
         
        $response = $client->request('PUT', '/suprsales_api/Material_Group/updateMaterialGroup.php?id='.$id, [
          'json' => [
            'GROUP_ID' => $GROUP_ID,
            'GROUP_NAME' => $GROUP_NAME,
            'FLAG' => $FLAG
          ]
        ]);
		
		
        
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/material')->with('message','Material Group Updated Successfully');
	   }
	   else{
		   return redirect('/material')->with('error','Material Group Not Updated');
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
