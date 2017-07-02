<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Driver;
use App\AdminStation;
use App\Station;
use  Maatwebsite\Excel\Facades\Excel;
class ExcelController extends Controller
{
 public function getImport(){
    	return view('admin.themnv');
    }
  public function postImport(){
    	Excel::load(Input::file('file'),function($reader){
    		$reader->each(function($sheet){
    			foreach ($sheet as $row) {
    				if(User::checkEmail($row->email)){
                        if($row->tram==null){
    					User::insertNV($row->name,$row->email,$row->password,2);
                        $user_id = User::user_id($row->email);
                        Driver::insertdriver($row->gender,$row->phone,$row->birthday,$user_id,$row->type,$row->graduation);
                    }else{
                        User::insertNV($row->name,$row->email,$row->password,3);
                        $user_id = User::user_id($row->email);
                        $station_id = Station::station_id($row->tram);
                        
                            AdminStation::insertadmin($row->gender,$row->phone,$row->birthday,$user_id,$station_id,$row->graduation);
                        
                        
                    }
    				}
    			}
    			
    		});
    	});
    	return redirect()->intended('themnv');
    }
    public function themnvlx(Request $requests){
        $name = $requests->ten;
        $email = $requests->mail;
        $password = $requests->pass;
        $type = $requests->chucvu;
        $rong ="";
        if(User::checkEmail($email)){
            User::insertNV($name,$email,$password,2);
            $user_id = User::user_id($email);
            Driver::insertdriver($rong,$rong,$rong,$user_id,$type,$rong);
            return redirect()->intended('themnv')->with(['theml_message'=>'Thêm nhân viên thành công']);
        }
        else {
            return redirect()->intended('themnv')->with(['ktheml_message'=>'Tài khoản mail bị trùng lặp']);
        }
    }
    public function postql(Request $requests){
        $name = $requests->ten;
        $email = $requests->mail;
        $password = $requests->pass;
        $station_id = $requests->chucvu;
        $rong ="";
        if(User::checkEmail($email)){
            User::insertQL($name,$email,$password);
            $user_id = User::user_id($email);
            AdminStation::insertadmin($rong,$rong,$rong,$user_id,$station_id,$rong);
            return redirect()->intended('themnv')->with(['them_message'=>'Thêm nhân viên thành công']);
        }
        else {
            return redirect()->intended('themnv')->with(['kthem_message'=>'Tài khoản mail bị trùng']);
        }
    }
}
