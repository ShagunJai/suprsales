<?php
//use App\Http\Controllers\AdminController;
//use App\Http\Controllers\ContactController;
//use App\Http\Controllers\RoleController;
use App\Http\Controllers\API\RolesController;
use App\Http\Controllers\API\AuthsController;
use App\Http\Controllers\API\EmpController;
use App\Http\Controllers\API\CustController;
use App\Http\Controllers\API\SalesController;
use App\Http\Controllers\API\AnnounceController;
use App\Http\Controllers\API\TypeAnnounceController;
use App\Http\Controllers\API\ModuleController;
use App\Http\Controllers\API\ScreenController;
use App\Http\Controllers\API\AssignRoleController;
use App\Http\Controllers\API\AdminSalesController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\StockController;
use App\Http\Controllers\API\PlantController;
use App\Http\Controllers\API\PackingController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\LoginProfileController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\userLoginController;
use App\Http\Controllers\API\createFarmerController;
use App\Http\Controllers\API\createRetailerController;
use App\Http\Controllers\API\Error404Controller;
use App\Http\Controllers\API\ErrorSearchController;
use App\Http\Controllers\API\CreateLevelController;
use App\Http\Controllers\API\LevelSettingsController;
use App\Http\Controllers\API\CreateClaimController;
use App\Http\Controllers\API\ViewClaimController;
use App\Http\Controllers\API\ChangeLevelController;
use App\Http\Controllers\API\ApproveClaimController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\API\ContactViewController;
use App\Http\Controllers\API\PendingClaimController;
use App\Http\Controllers\API\MyCustomerController;
use App\Http\Controllers\API\MyOrderController;
use App\Http\Controllers\API\MyTicketController;
use App\Http\Controllers\API\TicketController;
use App\Http\Controllers\API\ViewTicketController;
use App\Http\Controllers\API\MaterialGroupController;
use App\Http\Controllers\API\SKUController;
use App\Http\Controllers\API\OpenTicketController;
use App\Http\Controllers\API\ResponseTicketController;
use App\Http\Controllers\API\MyAnnounceController;
use App\Http\Controllers\API\CreateEmployeeController;
use App\Http\Controllers\API\MyPlantController;
use App\Http\Controllers\API\StocklistController;
use App\Http\Controllers\API\MyResponseTicketController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\MyRegionOrderController;
use App\Http\Controllers\API\ComponentController;
use App\Http\Controllers\API\AssignComponentController;
use App\Http\Controllers\API\VerifyDistributorController;
use App\Http\Controllers\API\AreaController;
use App\Http\Controllers\API\ZoneController;
use App\Http\Controllers\API\RejectedClaimController;
use App\Http\Controllers\API\AssignPlantController;
use App\Http\Controllers\API\DepotOrderController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\AssignedTaskController;
use App\Http\Controllers\API\AssignedActivityController;
use App\Http\Controllers\API\DelegatedTaskController;
use App\Http\Controllers\API\DelegatedActivityController;
use App\Http\Controllers\API\AllClaimsController;
use Illuminate\Support\Facades\Config;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Admin;
use Illuminate\Support\Facades\Input;
use App\Http\Middleware\EnsureRouteIsValid;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('forget-password', [ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forget-password');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword']);

Route::any('empss/reset/', [EmpController::class, 'reset'])->name('empss.reset');
Route::any ( '/search', function (Request $request) {
	$q = $request->get( 'q' );
	//use show by id in contacts
	
	
	$value = config('search.admin');
	foreach($value as $admins){
	if (strtoupper($q) == strtoupper($admins)){
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
			return redirect('errors');
		}
		}
		else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.employee');
	foreach($values as $employees){
	if (strtoupper($q) == strtoupper($employees)){
		$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
        $login = Http::get('http://localhost/suprsales_api/Login_Details/')->json();
         if(isset(Auth::user()->id)){
		  $ids = Auth::user()->emp_id;
		   $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'empss'){
				$count = 1;	
				break;
			}
        }
	}
		
		if($count == 1){
			return view('employee')->with(compact('admins','login','announcement','ann'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.authorization');
	foreach($values as $authorizations){
	if (strtoupper($q) == strtoupper($authorizations)){
		$screen = Http::get('http://localhost/suprsales_api/Screen/create_screen/')->json();
        $module = Http::get('http://localhost/suprsales_api/module/create_module/')->json();
        $admins = Http::get('http://localhost/suprsales_api/Authorization/')->json();
        if(isset(Auth::user()->id)){
		  $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		 
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'auths'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('auths')->with(compact('admins','module', 'screen','announcement','ann'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		} 
		 }
	
	}
	
	$values = config('search.screen');
	foreach($values as $screens){
	if (strtoupper($q) == strtoupper($screens)){
		 $admins = Http::get('http://localhost/suprsales_api/Screen/create_screen/')->json();
         if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		 
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'screens'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('screen')->with(compact('announcement','admins','ann'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}
        
	}
	
	}
	
	$values = config('search.module');
	foreach($values as $modules){
	if (strtoupper($q) == strtoupper($modules)){
		 $admins = Http::get('http://localhost/suprsales_api/module/create_module/')->json();
          if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		 
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'mods'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('module')->with(compact('announcement','admins','ann'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.role');
	foreach($values as $roles){
	if (strtoupper($q) == strtoupper($roles)){
		 $auths = Http::get('http://localhost/suprsales_api/Authorization/')->json();
		$roles = Http::get('http://localhost/suprsales_api/Role/')->json();
          if(isset(Auth::user()->id)){
		  $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'roles'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('role')->with(compact('announcement','auths','roles','ann'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.assign_role');
	foreach($values as $roles){
	if (strtoupper($q) == strtoupper($roles)){
		$emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		$role = Http::get('http://localhost/suprsales_api/Role/')->json();
        $details = Http::get('http://localhost/suprsales_api/UserMapping/')->json();
        if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'roless'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('assignRole')->with(compact('emp','role','details','announcement','ann'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.customer');
	foreach($values as $customers){
	if (strtoupper($q) == strtoupper($customers)){
		 $cust = Http::get('http://localhost/suprsales_api/Customer/')->json();
		$type = Http::get('http://localhost/suprsales_api/Customer_Type_Master/')->json();
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		 
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'customer'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('customer')->with(compact('cust','type','announcement','ann'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}
		 }
	
	}
	
	$values = config('search.assign_customer');
	foreach($values as $customers){
	if (strtoupper($q) == strtoupper($customers)){
		$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		 
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'custs'){
				$count = 1;	
				break;
			}
        }
	}
		
		if($count == 1){
			return view('assignCustomer')->with(compact('admins','announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
		
		 }
	
	}
	
	$values = config('search.my_customer');
	foreach($values as $mycustomer){
	if (strtoupper($q) == strtoupper($mycustomer)){
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 $cust = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'mycutomer'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('myCustomer')->with(compact('announcement','ann','cust'));
		}
		else{
			return redirect('error');
		}
		 }
		 else {
			return redirect('userlogin');
		}
        
	}
	
	}
	
	$values = config('search.create_employee');
	foreach($values as $createemployee){
	if (strtoupper($q) == strtoupper($createemployee)){
	 $level = Http::get('http://localhost/suprsales_api/Level/getLevel.php')->json();
		$emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		$plant = Http::get('http://localhost/suprsales_api/Plant/')->json();
		$area = Http::get('http://localhost/suprsales_api/Area/allArea.php')->json();
		$region = Http::get('http://localhost/suprsales_api/Region/')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'createemployee'){
				$count = 1;	
				break;
			}
        }
	}
		
		if($count == 1){
			return view('createEmp')->with(compact('announcement','ann','level','emp','plant','area','region'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	
	}
	}
	
	$values = config('search.create_farmer');
	foreach($values as $createfarmer){
	if (strtoupper($q) == strtoupper($createfarmer)){
		$region = Http::get('http://localhost/suprsales_api/Region/')->json();
		 $state = Http::get('http://localhost/suprsales_api/State/')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'createfarmer'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('createFarmer')->with(compact('announcement','ann','region','state'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		} 
	}
	
	}
	
	$values = config('search.create_reatiler');
	foreach($values as $createreatiler){
	if (strtoupper($q) == strtoupper($createreatiler)){
		$region = Http::get('http://localhost/suprsales_api/Region/')->json();
		 $state = Http::get('http://localhost/suprsales_api/State/')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'createretailer'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('createRetailer')->with(compact('announcement','ann','region','state'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
		
	}
	
	}
	
	
	$values = config('search.stock');
	foreach($values as $stocks){
	if (strtoupper($q) == strtoupper($stocks)){
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
	}
	
	}
	
	$values = config('search.order');
	foreach($values as $orders){
	if (strtoupper($q) == strtoupper($orders)){
		 $admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		 
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'asales'){
				$count = 1;	
				break;
			}
        }
    }
		if($count == 1){
			return view('orders')->with(compact('announcement','ann','admins'));
		}
		else{
			return redirect('error');
		}
		 }
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.packaging_unit');
	foreach($values as $packaging){
	if (strtoupper($q) == strtoupper($packaging)){
		$admins = Http::get('http://localhost/suprsales_api/Packaging_Unit/')->json();
		  if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		 
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'packing'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('packingUnit')->with(compact('announcement','admins','ann'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}
		 }
	
	}
	
	$values = config('search.plant');
	foreach($values as $plant){
	if (strtoupper($q) == strtoupper($plant)){
	  $admins = Http::get('http://localhost/suprsales_api/Plant/')->json();
      if(isset(Auth::user()->id)){
	  $ids = Auth::user()->emp_id;
	  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
	  $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'plantview'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('plant')->with(compact('announcement','admins','ann'));	
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}	
	}
	
	}
	
	$values = config('search.my_order');
	foreach($values as $myorder){
	if (strtoupper($q) == strtoupper($myorder)){
	  	if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'myorder'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('myOrder')->with(compact('announcement','ann'));
		}
		else{
			return redirect('error');
		}
		 }
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.material');
	foreach($values as $material){
	if (strtoupper($q) == strtoupper($material)){
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
	
	}
	
	$values = config('search.create_claim');
	foreach($values as $createclaim){
	if (strtoupper($q) == strtoupper($createclaim)){
	  $user = Http::get('http://localhost/suprsales_api/Level/getEmpLevelExpRates.php')->json();
		$claim_day = Http::get('http://localhost/suprsales_api/Level/getGlobalSetting.php')->json();
		
		
		
		if(isset(Auth::user()->id)){
			$emp_id = Auth::user()->emp_id;
			 $user = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id='.$emp_id)->json();
	  
			
			$emp_details = Http::get('http://localhost/suprsales_api/Employee/getById.php?id='.$emp_id)->json();
		
	   
			$exp = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id='.$emp_id)->json();
			
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'createclaim'){
				$count = 1;	
				break;
			}
        }
	}
		
		if($count == 1){
			return view('createClaim')->with(compact('announcement','ann','user','claim_day','exp','emp_details'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.view_claim');
	foreach($values as $viewclaim){
	if (strtoupper($q) == strtoupper($viewclaim)){
	  if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 $region = Http::get('http://localhost/suprsales_api/Employee/getById.php?id='.$ids)->json();
		$level = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'viewclaim'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('viewClaim')->with(compact('announcement','ann','region','level'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.approve_claim');
	foreach($values as $approveclaim){
	if (strtoupper($q) == strtoupper($approveclaim)){
	 if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'approveclaim'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('approveClaim')->with(compact('announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.level_settings');
	foreach($values as $levelsettings){
	if (strtoupper($q) == strtoupper($levelsettings)){
	   $levels = Http::get('http://localhost/suprsales_api/Level/getLevel.php')->json();
		$levelexp = Http::get('http://localhost/suprsales_api/Level/getLevelExpRates.php')->json();
		$global = Http::get('http://localhost/suprsales_api/Level/getGlobalSetting.php')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'levelsettings'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('levelSettings')->with(compact('levels','levelexp','announcement','ann','global'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}	
	}
	
	}
	
	$values = config('search.level_view');
	foreach($values as $levelview){
	if (strtoupper($q) == strtoupper($levelview)){
	  $level = Http::get('http://localhost/suprsales_api/Level/getEmpLevelExpRates.php')->json();
		$levels = Http::get('http://localhost/suprsales_api/Level/getLevel.php')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'changelevel'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('changeLevel')->with(compact('level','levels','announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	
	$values = config('search.contact');
	foreach($values as $contact){
	if (strtoupper($q) == strtoupper($contact)){
	  if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$details = Http::get('http://localhost/suprsales_api/Contacts/?id='.$ids)->json();
        
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'contactss'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('contacts')->with(compact('announcement','details','ann'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.contacts');
	foreach($values as $contacts){
	if (strtoupper($q) == strtoupper($contacts)){
	 if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$details = Http::get('http://localhost/suprsales_api/Contacts/?id='.$ids)->json();
        
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'contactss'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('contactview')->with(compact('announcement','details','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.my_ticket');
	foreach($values as $myticket){
	if (strtoupper($q) == strtoupper($myticket)){
	  if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'myticket'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('myTicket')->with(compact('announcement','ann'));
		}
		else{
			return redirect('error');
		}
		 }
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.open_ticket');
	foreach($values as $openticket){
	if (strtoupper($q) == strtoupper($openticket)){
	   if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'openticket'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('openTicket')->with(compact('announcement','ann'));
		}
		else{
			return redirect('error');
		}
		 }
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.ticket');
	foreach($values as $ticket){
	if (strtoupper($q) == strtoupper($ticket)){
	   $admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		 
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'ticket'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('ticket')->with(compact('announcement','ann','admins'));
		}
		else{
			return redirect('error');
		}
		 }
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	
	$values = config('search.create_announce');
	foreach($values as $announce){
	if (strtoupper($q) == strtoupper($announce)){
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
			return view('createAnn')->with(compact('announcement','type','ann','region'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.my_announce');
	foreach($values as $myannounce){
	if (strtoupper($q) == strtoupper($myannounce)){
	 $type = Http::get('http://localhost/suprsales_api/Announcement/')->json();
		 $region = Http::get('http://localhost/suprsales_api/Region/')->json();
		
		if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'myann'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('myAnn')->with(compact('announcement','type','ann','region'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	
	$values = config('search.announce');
	foreach($values as $announces){
	if (strtoupper($q) == strtoupper($announces)){
		$admins = Http::get('http://localhost/suprsales_api/Announcement/')->json();
   	 if(isset(Auth::user()->id)){
	   $ids = Auth::user()->emp_id;
	    $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
	
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'announcetype'){
				$count = 1;	
				break;
			}
        }
	}
		if($count == 1){
			return view('typeAnn')->with(compact('announcement','admins','ann'));
		}
		else{
			return redirect('errors');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.myregionorder');
	foreach($values as $myregionorder){
	if (strtoupper($q) == strtoupper($myregionorder)){
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		 $admins = Http::get('http://localhost/suprsales_api/Employee/getAllEmpByRegion.php?id='.$ids)->json();
		 
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'regionorder'){
				$count = 1;	
				break;
			}
        }
    }
		if($count == 1){
			return view('regionOrder')->with(compact('announcement','ann','admins'));
		}
		else{
			return redirect('error');
		}
		 }
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.my_plant');
	foreach($values as $myplant){
	if (strtoupper($q) == strtoupper($myplant)){
		  if(isset(Auth::user()->id)){
        $emp = Auth::user()->emp_id;
        $admins = Http::get('http://localhost/suprsales_api/Plant/getPlantByRegion.php?id='.$emp)->json();
      
	  $ids = Auth::user()->emp_id;
	   $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
	  $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'myplant'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('myPlant')->with(compact('announcement','admins','ann'));	
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.my_stock');
	foreach($values as $mystock){
	if (strtoupper($q) == strtoupper($mystock)){
		 if(isset(Auth::user()->id)){
            $emp = Auth::user()->emp_id;
            $admins = Http::get('http://localhost/suprsales_api/Stock/getStockByEmp.php?id='.$emp)->json();
            
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'stocklist'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('stockList')->with(compact('announcement','admins','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}  
	}
	
	}
	
	$values = config('search.dashboard');
	foreach($values as $dashboard){
	if (strtoupper($q) == strtoupper($dashboard)){
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$user = Http::get('http://localhost/suprsales_api/Employee/getById.php?id='.$ids)->json();
		
		$currentSales = Http::get('http://localhost/suprsales_api/Dashboard/currentMonthSales.php?id='.$ids)->json();
		
		if(\Carbon\Carbon::now()->format('d') >= '16') {
			$cycle = "h2";	
		}
		else {
			$cycle = "h1";	
		}
			 
	    if($cycle == "h1"){
			$start_day = "01";
			$end_day = "15";
		}
		if($cycle == "h2"){
			$start_day = "16";
			$end_day = "31";
		}
		
		$month = \Carbon\Carbon::now()->format('m');
		$year = \Carbon\Carbon::now()->format('Y');
		
		$start_date = $year."-".$month."-".$start_day;
		$end_date = $year."-".$month."-".$end_day;
		
		$currentClaim = Http::get('http://localhost/suprsales_api/Dashboard/claimByDateRange.php?id='.$ids.'&start_date='.$start_date.'&end_date='.$end_date)->json();
		$currentTicket = Http::get('http://localhost/suprsales_api/Dashboard/currentMonthTicket.php?id='.$ids)->json();
		$quat_sales = Http::get('http://localhost/suprsales_api/Dashboard/quaterlySalesChart.php?id='.$ids)->json();
		$mon_sales = Http::get('http://localhost/suprsales_api/Dashboard/monthlySalesChart.php?id='.$ids)->json();
		$top_dist = Http::get('http://localhost/suprsales_api/Dashboard/topDistributor.php?id='.$ids)->json();
		$top_prod = Http::get('http://localhost/suprsales_api/Dashboard/topProduct.php?id='.$ids)->json();
		$top_plant = Http::get('http://localhost/suprsales_api/Dashboard/topPlants.php?id='.$ids)->json();
		$mon_tic = Http::get('http://localhost/suprsales_api/Dashboard/monthlyTicketChart.php?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'dashboard'){
				$count = 1;	
				break;
			}
        }
		}
		
		
		if($count == 1){
			return view('dashboard')->with(compact('announcement','ann','user','currentSales','currentClaim','currentTicket','quat_sales','mon_sales','top_dist','top_prod','top_plant','mon_tic'));
		}
		else{
			return redirect('error');
		}
		}
		else {
			return redirect('userlogin');
		}
		
		
	}
	
	}
	
	$values = config('search.verify_dist');
	foreach($values as $verify_dist){
	if (strtoupper($q) == strtoupper($verify_dist)){
		 $levels = Http::get('http://localhost/suprsales_api/Customer/getNonVerifiedDistributor.php')->json();
		$dist = Http::get('http://localhost/suprsales_api/Customer/getVerifiedDistributor.php')->json();

		if(isset(Auth::user()->id)){
			$emp_id = Auth::user()->emp_id;
			 
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'verifydistributor'){
				$count = 1;	
				break;
			}
        }
	}
		
		if($count == 1){
			return view('verifyDistributor')->with(compact('levels','dist','announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.profile');
	foreach($values as $profile){
	if (strtoupper($q) == strtoupper($profile)){
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
        $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
	   $data = Http::get('http://localhost/suprsales_api/Employee/getById.php?id='.$ids)->json();
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		
		return view('loginProfile')->with(compact('announcement','data','ann'));
		}
		else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.rejected_claim');
	foreach($values as $rejected_claim){
	if (strtoupper($q) == strtoupper($rejected_claim)){
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'rejectedclaim'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('rejectedClaim')->with(compact('announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.create_comp');
	foreach($values as $create_comp){
	if (strtoupper($q) == strtoupper($create_comp)){
		 $admins = Http::get('http://localhost/suprsales_api/Ticket/getComponent.php')->json();
        $emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'component'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('component')->with(compact('announcement','admins','ann','emp'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.assign_comp');
	foreach($values as $assign_comp){
	if (strtoupper($q) == strtoupper($assign_comp)){
		 $emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		$comp = Http::get('http://localhost/suprsales_api/Ticket/getComponent.php')->json();
        $details = Http::get('http://localhost/suprsales_api/Ticket/getAssignComponent.php')->json();
        
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'assigncomponent'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('assignComponent')->with(compact('emp','comp','details','announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.area');
	foreach($values as $area){
	if (strtoupper($q) == strtoupper($area)){
		  $region = Http::get('http://localhost/suprsales_api/Region/')->json();
		$zone = Http::get('http://localhost/suprsales_api/Zone/')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'area'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('area')->with(compact('announcement','ann','region','zone'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.zone');
	foreach($values as $zone){
	if (strtoupper($q) == strtoupper($zone)){
		 $details = Http::get('http://localhost/suprsales_api/Zone/')->json();
        $region = Http::get('http://localhost/suprsales_api/Region/')->json();
		
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'zone'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('zone')->with(compact('details','announcement','ann','region'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		} 
	}
	
	}
	
	$values = config('search.assign_plant');
	foreach($values as $assign_plant){
	if (strtoupper($q) == strtoupper($assign_plant)){
		  $emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		$plant = Http::get('http://localhost/suprsales_api/Region/')->json();
        $details = Http::get('http://localhost/suprsales_api/Employee/getEmpRegionMapping.php')->json();
       
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'assignplant'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('assignPlant')->with(compact('emp','plant','details','announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.depot_order');
	foreach($values as $depot_order){
	if (strtoupper($q) == strtoupper($depot_order)){
		if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		 $admins = Http::get('http://localhost/suprsales_api/Employee/getAllEmpByPlant.php?id='.$ids)->json();
		 
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'depotorder'){
				$count = 1;	
				break;
			}
        }
    }
		if($count == 1){
			return view('depotOrder')->with(compact('announcement','ann','admins'));
		}
		else{
			return redirect('error');
		}
		 }
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.task');
	foreach($values as $task){
	if (strtoupper($q) == strtoupper($task)){
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 $task = Http::get('http://localhost/suprsales_api/Task/getTaskByEmp.php?id='.$ids)->json();
		 $priority = Http::get('http://localhost/suprsales_api/Task/taskPriorityChartByEmp.php?id='.$ids)->json();
		 $task_status = Http::get('http://localhost/suprsales_api/Task/taskStatusChartByEmp.php?id='.$ids)->json();
		 $emp = Http::get('http://localhost/suprsales_api/Employee/getReportingEmp.php?id='.$ids)->json();
		 $team_status =  Http::get('http://localhost/suprsales_api/Task/teamStatusChartByEmp.php?id='.$ids)->json();
		
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'task'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('task')->with(compact('announcement','ann','emp','task','priority','task_status','team_status'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
		
	}
	
	}
	
	$values = config('search.assigned_task');
	foreach($values as $assigned_task){
	if (strtoupper($q) == strtoupper($assigned_task)){
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 $task = Http::get('http://localhost/suprsales_api/Task/getMyAssignedTask.php?id='.$ids)->json();
		 $priority = Http::get('http://localhost/suprsales_api/Task/assignedTaskPriorityChart.php?id='.$ids)->json();
		 $task_status = Http::get('http://localhost/suprsales_api/Task/assignedTaskStatusChart.php?id='.$ids)->json();
		 $emp = Http::get('http://localhost/suprsales_api/Employee/getReportingEmp.php?id='.$ids)->json();
		 $team_status =  Http::get('http://localhost/suprsales_api/Task/assignedTeamStatusChart.php?id='.$ids)->json();
		
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'assigntask'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('assignedTask')->with(compact('announcement','ann','emp','task','priority','task_status','team_status'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}
	
	$values = config('search.delegated_task');
	foreach($values as $delegated_task){
	if (strtoupper($q) == strtoupper($delegated_task)){
		 if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 $task = Http::get('http://localhost/suprsales_api/Task/getMyDeligatedTask.php?id='.$ids)->json();
		 $priority = Http::get('http://localhost/suprsales_api/Task/deligatedTaskPriorityChart.php?id='.$ids)->json();
		 $task_status = Http::get('http://localhost/suprsales_api/Task/deligatedTaskStatusChart.php?id='.$ids)->json();
		 $emp = Http::get('http://localhost/suprsales_api/Employee/getReportingEmp.php?id='.$ids)->json();
		 $team_status =  Http::get('http://localhost/suprsales_api/Task/deligatedTeamStatusChart.php?id='.$ids)->json();
		
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'delegatedtask'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('delegatedTask')->with(compact('announcement','ann','emp','task','priority','task_status','team_status'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	}
	
	}

	
return redirect('errors');	
	
} );


Route::get ( '/cont', function (Request $request) {
	$q = $request->get( 'q' );
	
	if ($q == 'Admin'){
		$data['details'] = Http::get('http://localhost/suprsales_api/Admin/')->json();
		return response()->view('admin', $data, 200);
	}
	elseif ($q == 'Role' or $q == 'Create Role'){
		 $data['details'] = Http::get('http://localhost/suprsales_api/Role/')->json();	
		return response()->view('role', $data, 200);
	}
	

} );


Route::any('/notification', function(){
  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/')->json();
  return response()->view('createAnn', $announcement, 200);
});

Route::get('roles/open', [RolesController::class, 'open']);
Route::post('levelsettings/globalsettings', [LevelSettingsController::class, 'globalsettings'])->name('levelsettings.globalsettings');
Route::put('customer/{customer}/{code}', 'CustomerController@update');

Route::get('levelsettings/{levelsetting}', function(Request $request, $id){
  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/')->json();
  $id = $request->route('levelsetting');
	   
  $data = Http::get('http://localhost/suprsales_api/Level/getLevelExpRates.php?id='.$id)->json();
  return view('levelSettings')->with(compact('announcement','data'));
});


Route::put('customer/{customer}/{code}', [CustomerController::class, 'update']);
Route::any('customer/{customer}/{code}', [CustomerController::class, 'editcust'], function () {
	return redirect()->route('customer.editcust');
})->name('customer.editcust');

Route::get('customer/{customer}/{code}', [CustomerController::class, 'shows'], function () {
	return redirect()->route('customer.shows');
})->name('customer.shows');

Route::get('customer/{customer}/{code}/{type}', [CustomerController::class, 'ledger'], function () {
	return redirect()->route('customer.ledger');
})->name('customer.ledger');

Route::post('area/createarea/', [AreaController::class, 'createarea'], function () {
	return redirect()->route('area.createarea');
})->name('area.createarea');

Route::get('empss/{empss}/{code}', [EmpController::class, 'shows'], function () {
	return redirect()->route('empss.shows');
})->name('empss.shows');



Route::get('mycutomer/{mycutomer}/{code}', [MyCustomerController::class, 'shows'], function () {
	return redirect()->route('mycutomer.shows');
})->name('mycutomer.shows');

Route::put('mycutomer/{mycutomer}/{code}', [MyCustomerController::class, 'editcust'], function () {
	return redirect()->route('mycutomer.editcust');
})->name('mycutomer.editcust');

Route::get('mycutomer/{mycutomer}/{code}/{type}', [MyCustomerController::class, 'ledger'], function () {
	return redirect()->route('mycutomer.ledger');
})->name('mycutomer.ledger');

Route::get('viewclaim/{viewclaim}/{start_date}/{end_date}', [ViewClaimController::class, 'editcust'], function () {
	return redirect()->route('viewclaim.editcust');
})->name('viewclaim.editcust');

Route::get('approveclaim/{approveclaim}/{start_date}/{end_date}', [ApproveClaimController::class, 'editcust'], function () {
	return redirect()->route('approveclaim.editcust');
})->name('approveclaim.editcust');

Route::get('openticket/{openticket}/{start_date}/{end_date}', [OpenTicketController::class, 'shows'], function () {
	return redirect()->route('openticket.shows');
})->name('openticket.shows');

Route::get('myticket/{myticket}/{start_date}/{end_date}', [MyTicketController::class, 'shows'], function () {
	return redirect()->route('myticket.shows');
})->name('myticket.shows');

Route::get('approveclaim/{approveclaim}/{start_date}/{end_date}/{status}', [ApproveClaimController::class, 'state'], function () {
	return redirect()->route('approveclaim.state');
})->name('approveclaim.state');

Route::get('approveclaim/{approveclaim}/{start_date}/{end_date}/{status}/{submitted}', [ApproveClaimController::class, 'submitted'], function () {
	return redirect()->route('approveclaim.submitted');
})->name('approveclaim.submitted');

Route::get('asales/{asale}/{rid}', [AdminSalesController::class, 'shows'], function () {
	return redirect()->route('asales.shows');
})->name('asales.shows');

Route::get('regionorder/{regionorder}/{rid}', [MyRegionOrderController::class, 'shows'], function () {
	return redirect()->route('regionorder.shows');
})->name('regionorder.shows');

Route::get('depotorder/{depotorder}/{rid}', [DepotOrderController::class, 'shows'], function () {
	return redirect()->route('depotorder.shows');
})->name('depotorder.shows');

Route::get('myorder/{myorder}/{rid}', [MyOrderController::class, 'shows'], function () {
	return redirect()->route('myorder.shows');
})->name('myorder.shows');

Route::get('approval/{approval}/{start_date}/{end_date}', [PendingClaimController::class, 'editcust'], function () {
	return redirect()->route('approval.editcust');
})->name('approval.editcust');

/*Route::any('login/', [AdminController::class, 'userlogin'], function () {
})->name('login.userlogin')->middleware('auth');*/

Route::any('userlogin/', [userLoginController::class, 'login'])->name('userlogin.login');
Route::any('userlogin/logout/', [userLoginController::class, 'logout'])->name('userlogin.logout');
Route::any('empss/{empss}/{editemp}', [EmpController::class, 'editemp'])->name('empss.editemp');
Route::any('adminn/', [AdminController::class, 'activate'], function () {
	return redirect()->route('admin.activate');
})->name('admin.activate');

Route::any('approveclaim/', [ApproveClaimController::class, 'approve'], function () {
	return redirect()->route('approveclaim.approve');
})->name('approveclaim.approve');

Route::any('custs/{cust}', [CustomerController::class, 'show'], function () {
	return redirect()->route('customer.show');
});

Route::apiResource('myorder', MyOrderController::class);
Route::apiResource('roles', RolesController::class);
Route::apiResource('auths', AuthsController::class);
Route::apiResource('empss', EmpController::class);
Route::apiResource('custs', CustController::class);
Route::apiResource('saless', SalesController::class);
Route::apiResource('announce', AnnounceController::class);
Route::apiResource('announcetype', TypeAnnounceController::class);
Route::apiResource('mods', ModuleController::class);
Route::apiResource('screens', ScreenController::class);
Route::apiResource('roless', AssignRoleController::class);
Route::apiResource('asales', AdminSalesController::class);
Route::apiResource('customer', CustomerController::class);
//Route::apiResource('login', LoginController::class);
Route::apiResource('createlevel', CreateLevelController::class);
Route::apiResource('levelsettings', LevelSettingsController::class);
Route::apiResource('createclaim', CreateClaimController::class);
Route::apiResource('viewclaim', ViewClaimController::class);
Route::apiResource('changelevel', ChangeLevelController::class);
Route::apiResource('approveclaim', ApproveClaimController::class);
Route::apiResource('approval', PendingClaimController::class);
Route::apiResource('conatctview', ContactViewController::class);
Route::apiResource('mycutomer', MyCustomerController::class);
Route::apiResource('createfarmer', createFarmerController::class);
Route::apiResource('createretailer', createRetailerController::class);
Route::apiResource('userlogin', userLoginController::class);
Route::apiResource('errors', ErrorSearchController::class);
Route::apiResource('stock', StockController::class);
Route::apiResource('plantview', PlantController::class);
Route::apiResource('packing', PackingController::class);
Route::apiResource('contactss', ContactController::class);
Route::apiResource('adminn', AdminController::class);
Route::apiResource('profile', ProfileController::class);
Route::apiResource('loginprofile', LoginProfileController::class);
Route::apiResource('error', Error404Controller::class);
Route::apiResource('myticket', MyTicketController::class);
Route::apiResource('ticket', TicketController::class);
Route::apiResource('viewticket', ViewTicketController::class);
Route::apiResource('material', MaterialGroupController::class);
Route::apiResource('sku', SKUController::class);
Route::apiResource('openticket', OpenTicketController::class);
Route::apiResource('response', ResponseTicketController::class);
Route::apiResource('myann', MyAnnounceController::class);
Route::apiResource('createemployee', CreateEmployeeController::class);
Route::apiResource('myplant', MyPlantController::class);
Route::apiResource('stocklist', StocklistController::class);
Route::apiResource('myresponse', MyResponseTicketController::class);
Route::apiResource('dashboard', DashboardController::class);
Route::apiResource('regionorder', MyRegionOrderController::class);
Route::apiResource('component', ComponentController::class);
Route::apiResource('assigncomponent', AssignComponentController::class);
Route::apiResource('verifydistributor', VerifyDistributorController::class);
Route::apiResource('area', AreaController::class);
Route::apiResource('zone', ZoneController::class);
Route::apiResource('rejectedclaim', RejectedClaimController::class);
Route::apiResource('assignplant', AssignPlantController::class);
Route::apiResource('depotorder', DepotOrderController::class);
Route::apiResource('task', TaskController::class);
Route::apiResource('activity', ActivityController::class);
Route::apiResource('faq', FaqController::class);
Route::apiResource('assigntask', AssignedTaskController::class);
Route::apiResource('assignactivity', AssignedActivityController::class);
Route::apiResource('delegatedtask', DelegatedTaskController::class);
Route::apiResource('delegatedactivity', DelegatedActivityController::class);
Route::apiResource('allclaims', AllClaimsController::class);
//Route::get('adminss','App\Http\Controllers\AdminController@show');

?>