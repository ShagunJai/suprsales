<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;
use Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class VerifyDistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Http::get('http://localhost/suprsales_api/Customer/getNonVerifiedDistributor.php')->json();
        $dist = Http::get('http://localhost/suprsales_api/Customer/getVerifiedDistributor.php')->json();

        if (isset(Auth::user()->id)) {
            $emp_id = Auth::user()->emp_id;

            $ids = Auth::user()->emp_id;
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

            $count = 0;
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'verifydistributor') {
                        $count = 1;
                        break;
                    }
                }
            }

            if ($count == 1) {
                return view('verifyDistributor')->with(compact('levels', 'dist', 'announcement', 'ann'));
            } else {
                return redirect('error');
            }
        } else {
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

        $name = "kite";
        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            $pdf = "verification/" . $name . ".pdf";
            Storage::disk('public')->put($pdf,  File::get($file));
        } else {
            $pdf = null;
        }

        return redirect('/verifydistributor');
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
