<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class SKUController extends Controller
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
		return view('sku')->with(compact('announcement','ann'));
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
        $FACTOR = $request->get('FACTOR');
		$GROUP_ID = $request->get('GROUP_ID');
        $FLAG = $request->get('FLAG');
        $id = $request->route('sku'); 
  
        $client = new Client([
          // Base URI is used with relative requests
          'base_uri' => 'http://localhost',
        ]);
         
        $response = $client->request('PUT', '/suprsales_api/Stock/updateSku.php?id='.$id, [
          'json' => [
            'FACTOR' => $FACTOR,
            'FLAG' => $FLAG
          ]
        ]);
        
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('material/'.$GROUP_ID)->with('message','SKU Updated Successfully');
	   }
	   else{
		   return redirect('material/'.$GROUP_ID)->with('error','SKU Not Updated');
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
