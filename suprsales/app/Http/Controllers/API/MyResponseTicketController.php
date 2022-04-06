<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class MyResponseTicketController extends Controller
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
		$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		 
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();		
		return view('myResponse')->with(compact('announcement','ann','admins'));
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
        $ticket_id = $request->get('ticket_id');
		$id = Auth::user()->emp_id;
		$RESPONSE_DESC = $request->get('RESPONSE_DESC');
		$RESPONSE_TYPE = 1;
		 $start_date = $request->get('start_date');
		$end_date = $request->get('end_date');
		
		//dd($RESPONSE_DESC);

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Ticket/createResponse.php?id='.$id.'&ticket_id='.$ticket_id, [
			'json' => [
				'RESPONSE_DESC' => $RESPONSE_DESC,
				'RESPONSE_TYPE' => $RESPONSE_TYPE
			]
		]);
		
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/')->json();
         $ids = Auth::user()->emp_id;
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();		
		
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
			return redirect('myticket/'.$ticket_id.'/'.$start_date.'/'.$end_date)->with('message','Response Added Successfully');
		}
	   else{
		   return redirect('myticket/'.$ticket_id.'/'.$start_date.'/'.$end_date)->with('message','Response not Added');
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
