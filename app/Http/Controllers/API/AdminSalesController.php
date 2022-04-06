<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpClient\HttpClient;
use GuzzleHttp\Client;
use Auth;
use Response;

class AdminSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();

        if (isset(Auth::user()->id)) {
            $ids = Auth::user()->emp_id;
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

            $count = 0;
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'asales') {
                        $count = 1;
                        break;
                    }
                }
            }
            if ($count == 1) {
                return view('orders')->with(compact('announcement', 'ann', 'admins'));
            } else {
                return redirect('error');
            }
        } else {
            return redirect('userlogin');
        }

        //return response()->view('orders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //  It get the employees Id from UI and store in $emp
        $emp = $request->get('emp');
     //  It get the days from UI and store in $days
       $days = $request->get('days');
    //  It get the status from UI and store in $status as new or downloaded
        $status = $request->get('status');
    // It is for two part date one is for start date one is for end date
        list($part1, $part2) = explode(' - ', $days);
    // It is for two part1 date is for start date it contain month,day,year
        list($month1, $day1, $year1) = explode('/', $part1);
    // It is for two part2 date is for end date it contain month,day,year
        list($month2, $day2, $year2) = explode('/', $part2);


        // declear start and end date by the year,month and day
        $start_date = $year1 . '-' . $month1 . '-' . $day1;
        $end_date = $year2 . '-' . $month2 . '-' . $day2;
       // It shows the announcement in the top announcement btn
       //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
        $ids = Auth::user()->emp_id;
        //It shows authenticated uses references and store it in $ann
        $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
        // $admins contain all EMP_ID with There EMP_NAME get from the ui
        $admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
        $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
        /*empty() function checks whether a variable is empty or not. This function returns false
        if the variable exists and is not empty, otherwise it returns true.
           */
        if (empty($emp)) {
            $order = Http::get('http://localhost/suprsales_api/Order/getOrderByEmp.php?start_date=' . $start_date . '&end_date=' . $end_date . '&id=' . $emp . '&status=' . $status)->json();


            return view('orders', ['start_date' => $start_date], ['end_date' => $end_date])->with(compact('announcement', 'ann', 'order', 'admins'));
        } else {
            $emps = join(',', $emp);
            $em = '[' . $emps . ']';

            $order = Http::get('http://localhost/suprsales_api/Order/getOrderByEmp.php?start_date=' . $start_date . '&end_date=' . $end_date . '&id=' . $em . '&status=' . $status)->json();


            return view('orders', ['start_date' => $start_date], ['end_date' => $end_date])->with(compact('announcement', 'ann', 'order', 'admins'));
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
    }
    // This is use for showing the data for the particular user
    public function shows(Request $request, $id, $rid)
    {
         //in $id put the data by route 'asale'
        $id = $request->route('asale');
         //  in $rid put the data by route 'rid'        $id = $request->route('myorder');
        $rid = $request->route('rid');
    // Then $orders contain details order get from  getOrderDetail . php inside Order inside suprsales_api
        $orders = Http::get('http://localhost/suprsales_api/Order/getOrderDetail.php?id=' . $id)->json();

    // the $order store as data inside $userdata
        $userData['data'] = $orders;
    //   Then encoded the userdata and shown to the user
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
    //   Then encoded the userdata and shown to the user
    public function update(Request $request, $id)
    {
        // It takes start date and end date from the users
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        //  If there is no record then it will redirect to asales
        if (empty($start_date)) {
            return redirect('/asales');
        }
        // If there is record then this part shown and it shows and the data will be downloaded from downloadAllEmpOrder.php
        else {
            $downloads = Http::get('http://localhost/suprsales_api/Order/downloadAllEmpOrder.php?start_date=' . $start_date . '&end_date=' . $end_date)->json();
        //$order contain all the order details with employee ids by the start  date it will call
            $order = Http::get('http://localhost/suprsales_api/Order/getAllEmpOrder.php?start_date=' . $start_date . '&end_date=' . $end_date)->json();
            //dd($order);
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=orders.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

        // It sets the column heading
            $columns = array('orderId', 'status', 'latitude', 'longitude', 'dateTime', 'order_value', 'distributor_br_id', 'distributor_erp_id', 'distributorName', 'Reported-By ID', 'Reported-By Name', 'Reported-By Role', 'Reported-By Email', 'sku_br_id', 'sku_erp_id', 'description', 'brand', 'sub_brand', 'uom', 'skuPrice', 'quantity', 'value', 'remarks', 'order_timestamp', 'Ack_Order_ID');
        // $callback is a function which is passed as an argument into another function.
            $callback = function () use ($order, $columns) {

                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($order as $review) {
                //to format a line as CSV($file, array value) file and writes it to an open file
                    fputcsv($file, array($review['ORDER_ID'], $review['STATUS'], $review['CUSTOMER_LATITUDE'], $review['CUSTOMER_LONGITUDE'], $review['ORDER_DATE'], $review['TOTAL_ORDER_VALUE'], $review['CUSTOMER_ID'], $review['CUSTOMER_ID'], $review['CUSTOMER_NAME'], $review['CREATED_BY'], $review['PLACED_BY'], $review['ROLE_NAME'], $review['EMP_EMAIL'], $review['SKU_ID'], $review['SKU_ID'], $review['SKU_DESCRIPTION'], "", "", "", $review['PRICE'], $review['SKU_QUANTITY'], $review['TOTAL_SKU_VALUE'], $review['REMARKS'], strtotime($review['ORDER_DATE']), "0"));
                }
            // after opening the file it help to close a file which is pointed by an open file pointer.
                fclose($file);
            };
            //stream use to access many types of data using a common set of functions and tools.
            return Response::stream($callback, 200, $headers)->send();
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
