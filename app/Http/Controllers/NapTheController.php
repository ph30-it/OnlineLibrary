<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;

class NapTheController extends Controller
{
	public function index(){
		return view('user.napthe');
	}

	public function napthe(Request $request){
		$merchant_id = Config::where('name','=','merchant_id')->first()->value;
		$api_user = Config::where('name','=','api_user')->first()->value;
		$api_password = Config::where('name','=','api_password')->first();
		$pin = $request->pin;
		$seri = $request->seri;
		$card_type = $request->name_card;
		$price_guest = $request->price;
		$note = "";
		$result =  file_get_contents("http://sv.gamebank.vn/api/card2?merchant_id=".$merchant_id."&api_user=".trim($api_user)."&api_password=".trim($api_password)."&pin=".trim($pin)."&seri=".trim($seri)."&card_type=".intval($card_type)."&price_guest=".$price_guest."&note=".urlencode($note)."");   
		$result = str_replace("\xEF\xBB\xBF",'',$result);
		$result = json_decode($result);
		if($result->code === 0 && $result->info_card >= 10000) {
			return response()->json(['code' => 0, 'msg' => "Nạp thẻ thành công mệnh giá " .  $result->info_card]);
		}else {
			return  response()->json(['code' => 1, 'msg' => $result->msg]);
		} //TODO: + day user
	}
}
