<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ResponseTicketController extends Controller
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
		return view('responseTicket')->with(compact('announcement','ann','admins'));
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
		//dd($RESPONSE_DESC);
		$start_date = $request->get('start_date');
		$end_date = $request->get('end_date');
		
		$external = $request->has('customRadio') ? true : false;
		if($external){
			$res_type = $request->get('customRadio');
		}
		
		

	  
		//dd($RESPONSE_DESC);

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Ticket/createResponse.php?id='.$id.'&ticket_id='.$ticket_id, [
			'json' => [
				'RESPONSE_DESC' => $RESPONSE_DESC,
				'RESPONSE_TYPE' => $res_type
			]
		]);
		
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/')->json();
         $ids = Auth::user()->emp_id;
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();		
		
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
			return redirect('openticket/'.$ticket_id.'/'.$start_date.'/'.$end_date)->with('message','Response Added Successfully');
		}
	   else{
		   return redirect('openticket/'.$ticket_id.'/'.$start_date.'/'.$end_date)->with('message','Response not Added');
		 }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $id = $request->route('response'); 
		$user = Http::get('http://localhost/suprsales_api/Ticket/getComponentProcessor.php?id='.$id)->json();
		
     
     $userData['data'] = $user;

     echo json_encode($userData);
     exit;
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
		if ($request->has('processor')) {
        $processor = $request->get('processor');
		$RESPONSE_DESC = $request->get('RESPONSE_DESC');
		
		$RESPONSE_TYPE = 2;
		$emp_id = Auth::user()->emp_id;
        $id = $request->route('response'); 
  
        $client = new Client([
          'base_uri' => 'http://localhost',
        ]);
		
		$response2 = $client->request('POST', '/suprsales_api/Ticket/createResponse.php?id='.$emp_id.'&ticket_id='.$id, [
			'json' => [
				'RESPONSE_DESC' => $RESPONSE_DESC,
				'RESPONSE_TYPE' => $RESPONSE_TYPE
			]
		]);
         
        $response = $client->request('PUT', '/suprsales_api/Ticket/updateCurrentProcessor.php?id='.$id, [
          'json' => [
            'CURRENT_PROCESSOR_ID' => $processor,
          ]
        ]);
        
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('openticket')->with('message','Processor Changed Successfully');
	   }
	   else{
		   return redirect('openticket')->with('error','Processor not Changed');
	   }
		}
		else {
			 $start_date = $request->get('start_date');
		$end_date = $request->get('end_date');
		$status = $request->get('status');
		$prior_id = $request->get('prior_id');
		$component = $request->get('component');
		$processorr = $request->get('processorr');
        $id = $request->route('response'); 
  
        $client = new Client([
          'base_uri' => 'http://localhost',
        ]);
         
        $response = $client->request('PUT', '/suprsales_api/Ticket/updateTicket.php?id='.$id, [
          'json' => [
            'CURRENT_STATUS' => $status,
			'TICKET_PRIORITY_ID' => $prior_id,
			'TICKET_COMPONENT_ID' => $component,
			'CURRENT_PROCESSOR_ID' => $processorr
          ]
        ]);
        
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('openticket/'.$id.'/'.$start_date.'/'.$end_date)->with('message','Ticket Updated Successfully');
	   }
	   else{
		   return redirect('openticket/'.$id.'/'.$start_date.'/'.$end_date)->with('error','Ticket not Updates');
	   }
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
