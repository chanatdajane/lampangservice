<?php namespace App\Http\Controllers;
use App\Models\Place as Place;
use App\Models\Province as Province;
use App\Models\Amphur as Amphur;
use App\Models\Route as Route;
use App\User as User;

use Request;

class RouteController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$route = Route::get();
		foreach($route as $key => $value){
			$route[$key]['name'] = Controller::filterlang($route[$key]['name'],'tha');
			$route[$key]['description'] = Controller::filterlang($route[$key]['description'],'tha');

			$user = User::where('id',$route[$key]['userID'])->get();
			$route[$key]['user'] = $user[0]['name'];

			$startprovince = Province::where('PROVINCE_ID',$route[$key]['startProvinceID'])->get();
			$route[$key]['startprovince'] = $startprovince[0]['PROVINCE_NAME'];

			$endprovince = Province::where('PROVINCE_ID',$route[$key]['endProvinceID'])->get();
			$route[$key]['endprovince'] = $endprovince[0]['PROVINCE_NAME'];
		}
		return view('route/index', ['route' => $route]);
	}

	public function manage($id = '')
	{
		$place = Place::get();
		$province = Province::get();

		foreach($place as $key=>$value){
			$place[$key]['name'] = Controller::filterlang($place[$key]['name'],'tha');
		}
		if(!empty($id)){
			$route = Route::where('id',$id)->get();
			$lang = ['tha','eng','cha'];
			foreach($lang as $key => $value){
				$route[0]['name_'.$value] = Controller::filterlang($route[0]['name'],$value);
				$route[0]['description_'.$value] = Controller::filterlang($route[0]['description'],$value);
			}
			$startamphur = Amphur::where('PROVINCE_ID', $route[0]['startProvinceID'])->get();
			$endamphur = Amphur::where('PROVINCE_ID', $route[0]['endProvinceID'])->get();
			$placelist = array();

			if(!empty($route[0]['placeIDList'])){
				$placeIDList = explode(",", $route[0]['placeIDList']);
				foreach($placeIDList as $key=>$value){
					$placegetfromlist = Place::where('ID', $value)->get();
					$placegetfromlist[0]['name'] = Controller::filterlang($placegetfromlist[0]['name'],'tha');
					$placelist[$placegetfromlist[0]['ID']] = $placegetfromlist[0]['name'];
				}
			}
			

			return view('route/edit',['route'=>$route,'place'=>$place,'province'=>$province,'startamphur'=>$startamphur,'endamphur'=>$endamphur,'placelist'=>$placelist]);
		}
		else{
			return view('route/add',['place'=>$place,'province'=>$province]);
		}
	}
	public function save(){
		$data = Request::all();

		if(!empty($data['ID'])){
			$route = Route::find($data['ID']);
		}else{
			$route = new Route;
		}
		$route->name = "<!--tha".$data['name_tha']."--!><!--eng".$data['name_eng']."--!><!--cha".$data['name_cha']."--!>";
		$route->description = "<!--tha".$data['description_tha']."--!><!--eng".$data['description_eng']."--!><!--cha".$data['description_cha']."--!>";
		$route->startProvinceID = $data['startProvinceID'];
		$route->startAmphurID = $data['startAmphurID'];
		$route->endProvinceID = $data['endProvinceID'];
		$route->endAmphurID = $data['endAmphurID'];
		$route->placeIDList = $data['routelist'];
		$route->userID = \Auth::user()->id;
		$route->pic = 'thumbnail.png';

		if(!empty($data['ID'])){
			$route->id = $data['ID'];
			$route->save();
			$routeid = $data['ID'];
		}else{
			$route->save();
			$routeid = $route->id;
		}
		if(!empty($data['pic']))
			$data['pic']->move('uploads/route/'.$routeid.'/','thumbnail.png');

		return redirect('route')->with('message', 'บันทึกข้อมูลเรียบร้อย');
	}

	public function getplace(){
		$provinceID = Request::get('provinceid');
		$amphurID = Request::get('amphurid');
		$namesearch = Request::get('name');

		if($amphurID != 0){
			$place = Place::where('provinceID',$provinceID)->where('amphurID',$amphurID)->where('name','LIKE','%'.$namesearch.'%')->get();
		}
		else if($provinceID != 0){
			$place = Place::where('provinceID' , $provinceID)->where('name','LIKE','%'.$namesearch.'%')->get();
		}
		else{
			$place = Place::where('name','LIKE','%'.$namesearch.'%')->get();
		}

		foreach($place as $key=>$value){
			$place[$key]['name'] = Controller::filterlang($place[$key]['name'],'tha');
		}
		return $place;
	}

	public function delete($id){
		Route::where('ID', $id)->delete();
		return redirect('route')->with('message', 'ลบเส้นทางเรียบร้อย');
	}

}
