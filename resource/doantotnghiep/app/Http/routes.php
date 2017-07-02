<?php
use Illuminate\Http\Request;
use App\Station;
use App\Router;
use App\Pickup_point;
use App\Route_car;
use App\CarRoute;
use App\Car;
use App\Driver;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('home',['as'=>'home','uses'=>'TickitController@getbookTickit']);
Route::post('home',['as'=>'home','uses'=>'TickitController@postbookTickit']);
Route::get('cat', function(Request $request){
	$cat_id = $request->input('cat_id');
	$subcategory = Router::where('station_id', '=', $cat_id)->get();
	return Response::json($subcategory);
});
Route::get('rou', function(Request $request){
	$rou_id = $request->input('rou_id');
	$subcategory = Route_car::where('router_id', '=', $rou_id)->get();
	return Response::json($subcategory);
});
Route::get('pick_up', function(Request $request){
	$cat_id = $request->input('cat_id');
	$subcategory = Pickup_point::where('station_id', '=', $cat_id)->get();
	return Response::json($subcategory);
});
Route::get('car', function(Request $request){
	$cat_id = $request->input('rou_id');
	$subcategory = CarRoute::where('router_id', '=', $cat_id)->where('status','=',0)->get();
	$arrCarLT=array();
	foreach ($subcategory as $key => $value) {
		$carLT=Car::where('id','=',$value->car_id)->get();
		foreach ($carLT as $key => $clt) {
			$arrCarLT[]=$clt;
		}
	}
	return Response::json($arrCarLT);
});
Route::get('lienhe', function () {
    return view('lienhe');
});
Route::get('ht.thanhtoan', function () {
    return view('htthanhtoan');
});
Route::group(['middleware'=>'auth'],function(){
Route::get('admin', function () {
	$car = Car::all();
	$driver = Driver::all();
	$station = Station::all();
	$rou = Router::all();
    return view('admin.admin',['car'=>$car,'driver'=>$driver,'station'=>$station,'rou'=>$rou]);
});
Route::get('pcxelotrinh',['as'=>'pcxelotrinh','uses'=>'PcController@postpcxelt']);
Route::get('pcxetram',['as'=>'pcxetram','uses'=>'PcController@postpcxetr']);
Route::get('baocao',['as'=>'baocao','uses'=>'PcController@baocao']);
Route::get('laydulieu',['as'=>'laydulieu','uses'=>'PcController@laydulieu']);
Route::get('laydulieuhai',['as'=>'laydulieu','uses'=>'PcController@laydulieuhai']);
Route::get('laydulieuba',['as'=>'laydulieu','uses'=>'PcController@laydulieuba']);
Route::get('export',['as'=>'export','uses'=>'PcController@export']);
Route::get('station',function(){
  $sta = Station::all();
  return Response::json($sta);
});
Route::get('new',['as'=>'new','uses'=>'NewController@getnew']);
Route::post('new',['as'=>'new','uses'=>'NewController@postnew']);
Route::get('thongke',['as'=>'thongke','uses'=>'TickitController@thongke']);
Route::get('themnv',['as'=>'themnv','uses'=>'ExcelController@getImport']);
Route::post('themnv',['as'=>'themnv','uses'=>'ExcelController@postImport']);
Route::post('themlaixe',['as'=>'themlaixe','uses'=>'ExcelController@themnvlx']);
Route::post('themqli',['as'=>'themqli','uses'=>'ExcelController@postql']);
Route::get('themve',['as'=>'themve','uses'=>'TickitController@getImportTickit']);
Route::post('themve',['as'=>'themve','uses'=>'TickitController@postImportTickit']);
Route::get('dsve',['as'=>'dsve','uses'=>'TickitController@getTickit']);
Route::get('lsve',['as'=>'lsve','uses'=>'TickitController@LSTickit']);
Route::post('dsve',['as'=>'dsve','uses'=>'TickitController@postTickit']);
Route::post('ve',['as'=>'ve','uses'=>'TickitController@postdsTickit']);
Route::get('themtuyenlt',['as'=>'themtuyenlt','uses'=>'TickitController@getRoute']);
Route::post('themben',['as'=>'themben','uses'=>'TickitController@postStation']);
Route::post('suaben',['as'=>'suaben','uses'=>'TickitController@editStation']);
Route::post('xoaben',['as'=>'xoaben','uses'=>'TickitController@deleteStation']);
Route::get('taolt',['as'=>'taolt','uses'=>'TickitController@getLoTrinh']);
Route::post('taolt',['as'=>'taolt','uses'=>'TickitController@postLoTrinh']);
Route::get('getdeletelt/{id}',['as'=>'getdeletelt','uses'=>'TickitController@deleteLoTrinh']);
// Route::get('edittime/{id}',['as'=>'edittime','uses'=>'TickitController@geteditLoTrinh']);
Route::post('edittime',['as'=>'edittime','uses'=>'TickitController@posteditLoTrinh']);
Route::post('themtuyenlt',['as'=>'themtuyenlt','uses'=>'TickitController@postRoute']);
Route::post('suatuyen',['as'=>'suatuyen','uses'=>'TickitController@editRoute']);
Route::post('xoatuyen',['as'=>'themtuyenlt','uses'=>'TickitController@deleteRoute']);
Route::post('themddon',['as'=>'themddon','uses'=>'TickitController@postPickup']);
Route::post('xoaddon',['as'=>'xoaddon','uses'=>'TickitController@deletePickup']);
Route::post('suaddon',['as'=>'suaddon','uses'=>'TickitController@fixPickup']);
Route::get('qlixe',['as'=>'qlixe','uses'=>'QlixeController@getFormxe']);
Route::post('qlixe',['as'=>'qlixe','uses'=>'QlixeController@postFormxe']);
Route::get('xoaxe/{id}',['as'=>'xoaxe','uses'=>'QlixeController@deletexe']);
Route::post('taoxetuyen',['as=>taoxetuyen','uses'=>'QlixeController@postxetuyen']);
Route::post('xetramdon',['as=>xetramdon','uses'=>'QlixeController@postxetramdon']);
Route::get('ttadmin',['as'=>'ttadmin','uses'=>'TtAdmin@getAdmin']);
Route::post('ttadmin',['as'=>'ttadmin','uses'=>'TtAdmin@postAdmin']);

Route::get('ttnv',['as'=>'ttnv','uses'=>'TtnvController@getTtnv']);
Route::get('delete/{id}',['as'=>'getdelete','uses'=>'TtnvController@deleteTtnv']);
Route::get('ttnv_adminsts',['as'=>'ttnv_adminsts','uses'=>'TtnvController@getAdminStation']);
Route::get('deletead/{id}',['as'=>'getdeletead','uses'=>'TtnvController@deleteAd']);
Route::get('nhanvien', function () {
    return view('admin.nhanvien');
});
});

 Route::get('index',['as'=>'index',function(){
 	return view('index');
}]);
Route::get('login',['as'=>'login','uses'=>'LoginController@getLogin']);
Route::post('login',['as'=>'login','uses'=>'LoginController@postLogin']);
Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset','Auth\PasswordController@reset');
Route::get('logout',['as'=>'logout','uses'=>'LoginController@logout']);
// Khách đăng nhâp
Route::group(['middleware'=>'auth'],function(){
Route::get('guest',['as'=>'guest','uses'=>'GuestController@getForm']);
Route::post('guest_doimatkhau',['as'=>'guest_doimatkhau','uses'=>'GuestController@doimatkhau']);
Route::post('vote',['as'=>'vote','uses'=>'GuestController@vote']);
});
Route::get('xemve',['as'=>'xemve','uses'=>'TickitController@XemTickit']);
//nhân viên lái xe
Route::group(['middleware'=>'auth'],function(){
Route::get('driver',['as'=>'driver','uses'=>'DriverController@getForm']);
Route::post('driver',['as'=>'driver','uses'=>'DriverController@postForm']);
Route::post('driver_suamk',['as'=>'driver_suamk','uses'=>'DriverController@suamk']);
Route::get('xemlich',['as'=>'xemlich','uses'=>'DriverController@xemlich']);
});
// nhân viên qlis trạm đăng nhập
Route::group(['middleware'=>'auth'],function(){
Route::get('admin_station',['as'=>'admin_station','uses'=>'AdminStationController@getForm']);
Route::get('adminsts_tt',['as'=>'adminsts_tt','uses'=>'AdminStationController@getttcanhan']);
Route::post('adminsts_sua',['as'=>'adminsts_sua','uses'=>'AdminStationController@postttcanhan']);
Route::post('adminsts_suamk',['as'=>'adminsts_suamk','uses'=>'AdminStationController@editmk']);
Route::post('adminsts_xacnhan',['as'=>'adminsts_xacnhan','uses'=>'AdminStationController@xacnhan']);
Route::post('adminsts_doilaixe',['as'=>'adminsts_doilaixe','uses'=>'AdminStationController@doilaixe']);
Route::post('adminsts_xacnhanmai',['as'=>'adminsts_xacnhanmai','uses'=>'AdminStationController@xacnhanngaymai']);
Route::post('adminsts_doilaixemai',['as'=>'adminsts_doilaixemai','uses'=>'AdminStationController@doilaixengaymai']);
Route::get('adminsts_dsve',['as'=>'adminsts_dsve','uses'=>'AdminStationController@getdsve']);
Route::get('adminsts_ngaymai',['as'=>'adminsts_ngaymai','uses'=>'AdminStationController@getdsvengaymai']);
Route::get('adminsts_lsu',['as'=>'adminsts_lsu','uses'=>'AdminStationController@getlsu']);
Route::get('adminsts_phancong/{id}',['as'=>'adminsts_phancong','uses'=>'AdminStationController@phancong']);
Route::get('adminsts_phancongmai/{id}',['as'=>'adminsts_phancongmai','uses'=>'AdminStationController@phancongngaymai']);
});