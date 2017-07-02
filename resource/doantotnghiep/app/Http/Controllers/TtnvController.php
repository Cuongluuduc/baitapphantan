<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Driver;
use App\DriverCar;
use App\AdminStation;
use App\Station;
use App\Car;

class TtnvController extends Controller
{
    public function getTtnv(){
    	// $customers = User::paginate(3);
        $driver = Driver::all();
    	$data = User::select('id','name','level','email')->where('level','=','2')->get()->toArray();
    	return view('admin.ttnv',['data'=>$data,'driver'=>$driver]);
    }
    public function deleteTtnv($id){
        $id_dr = Driver::findiddriver($id);
        $drcar_id = DriverCar::getid($id_dr);
        $car_id = DriverCar::getcar_id($id_dr);
        Car::upDateStatus2($car_id);
        DriverCar::deleteDriverCar($drcar_id);
        $iddriver = Driver::findiddriver($id);
    	$user = User::find($id);
    	$user->delete($id);
        $driver = Driver::deletedriver($iddriver);
    	return redirect()->route('ttnv');
    }
    public function deleteAd($id){
        $id_ql = AdminStation::findiddriver($id);
        AdminStation::deleteAd($id_ql);
        $user = User::find($id);
        $user->delete($id);
        return redirect()->route('ttnv_adminsts'); 
    }
    public function getAdminStation(){
        $adben = AdminStation::all();
        $station = Station::all();
        $user = User::where('level','=',3)->get();
        return view('admin.adtram',['adben'=>$adben,'user'=>$user,'station'=>$station]);
    }
}
