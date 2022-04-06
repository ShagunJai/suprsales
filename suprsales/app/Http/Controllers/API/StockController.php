<?php

namespace App\Http\Controllers\API;
use App\Http\Traits\EmpTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class StockController extends Controller
{
    use EmpTrait;
	
    public function index()
    {
		$plant = Http::get('http://localhost/suprsales_api/Plant/')->json();
		$region = Http::get('http://localhost/suprsales_api/Region/')->json();
		
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'stock'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('stock')->with(compact('announcement','ann','plant','region'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
		
		//return response()->view('stock', $data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plants = $request->get('plant');
		$regions = $request->get('region');
		
		$plant = Http::get('http://localhost/suprsales_api/Plant/')->json();
		$region = Http::get('http://localhost/suprsales_api/Region/')->json();
		
		$ids = Auth::user()->emp_id;
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		$admins = Http::get('http://localhost/suprsales_api/Stock/getStockByRegion.php?id='.$regions.'&p_id='.$plants)->json();	
		
		return view('stock')->with(compact('announcement','ann','admins','plant','region'));
	
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
