<?php namespace App\Http\Controllers;
use App\Models\Place as Place;
use App\Models\Category as Category;
use App\Models\PlaceCategory as PlaceCategory;
use App\Models\PlaceGallery as PlaceGallery;
use App\Models\PlaceTime as PlaceTime;
use App\Models\Province as Province;
use App\Models\Amphur as Amphur;
use App\Models\PlaceTel as PlaceTel;
use App\User as User;
use Request;
use File;

class PlaceController extends Controller {

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
		//$place = Place::where('id','1')->get();
		$place = Place::get();
		// $category = Category::get();
		$placecate = array();

		foreach($place as $key => $value){
			$placeCategoryList = PlaceCategory::where('placeID',$value['ID'])->get();

			$user = User::where('id',$place[$key]['userID'])->get();
			$place[$key]['user'] = $user[0]['name'];

			foreach($placeCategoryList as $key2=>$value2){
				$category = Category::where('ID',$value2['categoryID'])->get();
				// echo json_encode($category[0]['name']);
				$catname = Controller::filterlang($category[0]['name'],'tha');
				$placecate[$key][$key2] = $catname; 
				// $place[$key]['category'] = $category[$value2['categoryID']-1]['attributes']['ID'];
			}
			$place[$key]['name'] = Controller::filterlang($place[$key]['name'],'tha');
		}
		// print_r(json_encode($placecate[0]));
		return view('place/index', ['place' => $place,'placecate' => $placecate]);
	}

	public function manage($id = '')
	{	

		$category = Category::where('parentID',0)->get();
		foreach($category as $key=>$value){
			$category[$key]['child'] = Category::where('parentID',$value['ID'])->get();
			$category[$key]['name'] = Controller::filterlang($value['name'],'tha');
			foreach($category[$key]['child'] as $key2=>$value2){
				$category[$key]['child'][$key2]['name'] = Controller::filterlang($value2['name'],'tha');
			}
		}
		
		$province = Province::get();
		$day = ['จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์','อาทิตย์'];

		if(!empty($id)){
			$place = Place::where('id',$id)->get();
			$lang = ['tha','eng','cha'];
			foreach($lang as $key => $value){
				$place[0]['name_'.$value] = Controller::filterlang($place[0]['name'],$value);
				$place[0]['shortdes_'.$value] = Controller::filterlang($place[0]['description'],$value);
				$place[0]['description_'.$value] = Controller::filterlang($place[0]['description'],$value);
				$place[0]['address_'.$value] = Controller::filterlang($place[0]['address'],$value);
				$place[0]['interview_'.$value] = Controller::filterlang($place[0]['interview'],$value);
				$place[0]['recommendtxt_'.$value] = Controller::filterlang($place[0]['recommendtxt'],$value);
			}
			
			$placeCategoryList = PlaceCategory::where('placeID',$id)->get();
			$placeCategory = array();
			foreach($placeCategoryList as $key=>$value){
				array_push($placeCategory,$value['attributes']['categoryID']);
			}

			$placeGalleryList = PlaceGallery::where('placeID',$id)->get();
			$placeGallery = array();
			foreach($placeGalleryList as $key=>$value){
				array_push($placeGallery,$value['attributes']['name']);
			}

			$placeTime = PlaceTime::where('placeID',$id)->get();
			$placetel = PlaceTel::where('placeID',$id)->get();
			//$placeCategory = PlaceCategory::where('placeID',$id)->get();
			$amphur = Amphur::where('PROVINCE_ID', $place[0]['provinceID'])->get();

			return view('place/edit', ['place' => $place,'category' => $category,'placeCategory' => $placeCategory,'province' => $province,'amphur' => $amphur,'placeGallery' => $placeGallery,'day'=>$day,'placeTime' => $placeTime,'placetel'=>$placetel]);
		}else{
			return view('place/add',['category' => $category,'province' => $province,'day'=>$day]);
		}
		
	}

	public function getIndex(){
		$place = Place::get();
		return $place ? 'Model Profile Connect Yes!' : 'Error! Model Profile Connect False!!!';
	}

	public function save(){
		$data = Request::all();
		//print_r($data);
		if(!empty($data['ID'])){
			$place = Place::find($data['ID']);
		}else{
			$place = new Place;
		}

		$place->name = "<!--tha".$data['name_tha']."--!><!--eng".$data['name_eng']."--!><!--cha".$data['name_cha']."--!>";
		$place->shortdes = "<!--tha".$data['shortdes_tha']."--!><!--eng".$data['shortdes_eng']."--!><!--cha".$data['shortdes_cha']."--!>";
		$place->description = "<!--tha".$data['description_tha']."--!><!--eng".$data['description_eng']."--!><!--cha".$data['description_cha']."--!>";
		// $place->opentime = $data['opentime'];
		// $place->closetime = $data['closetime'];
		$place->prayer = $data['prayer'];
		$place->parking = $data['parking'];
		$place->email = $data['email'];
		$place->timeps = $data['timeps'];
		// $place->tel = $data['tel'];
		$place->website = $data['website'];
		$place->facebook = $data['facebook'];
		$place->provinceID = $data['provinceID'];
		$place->amphurID = $data['amphurID'];
		$place->userID = \Auth::user()->id;
		$place->recommendtxt = "<!--tha".$data['recommendtxt_tha']."--!><!--eng".$data['recommendtxt_eng']."--!><!--cha".$data['recommendtxt_cha']."--!>";
		if(!empty($data['recommend'])){
			if($data['recommend'] == 'on') $place->recommend = 1;
			else if($data['recommend'] == 1) $place->recommend = 1;
			else $place->recommend = 0;
		}
		else
			$place->recommend = 0;
		$place->cover = 'thumbnail.png';
		
		$place->address = "<!--tha".$data['address_tha']."--!><!--eng".$data['address_eng']."--!><!--cha".$data['address_cha']."--!>";
		$place->lat = $data['lat'];
		$place->lng = $data['lng'];
		$place->interview = "<!--tha".$data['interview_tha']."--!><!--eng".$data['interview_eng']."--!><!--cha".$data['interview_cha']."--!>";
		$place->recommendtxt = "<!--tha".$data['recommendtxt_tha']."--!><!--eng".$data['recommendtxt_eng']."--!><!--cha".$data['recommendtxt_cha']."--!>";
		
		//cover,recommend
		if(!empty($data['ID'])){
			$place::where('ID', $data['ID'])->update($place['attributes']);
			PlaceCategory::where('placeID', $data['ID'])->delete();
			PlaceTime::where('placeID', $data['ID'])->delete();
			PlaceTel::where('placeID', $data['ID'])->delete();
			$placeid = $data['ID'];
		}else{
			$place->save();
			$placeid = $place->id;
		}

		if(!empty($data['cover']))
			$data['cover']->move('uploads/place/'.$placeid.'/','thumbnail.png');

		if(file_exists('uploads/place/temp')){
			if(!file_exists('uploads/place/'.$placeid)){
				mkdir('uploads/place/'.$placeid);
				$movefile = File::move('uploads/place/temp', 'uploads/place/'.$placeid.'/gallery');
				$files = glob('uploads/place/'.$placeid.'/gallery/*');
				foreach($files as $file){
					$filename = explode("/", $file);
					$place_gal = new PlaceGallery;
					$place_gal->placeID = $placeid;
					$place_gal->name = $filename[4];
					$place_gal->save();
				}
			}else{
				$files = glob('uploads/place/temp/*');
				
				foreach($files as $file){
					$filename = explode("/", $file);
					$place_gal = new PlaceGallery;
					$place_gal->placeID = $placeid;
					$place_gal->name = $filename[3];
					$place_gal->save();

					copy($file, 'uploads/place/'.$placeid.'/gallery/'.$filename[3]);
				}
			}
			
		}


		if(!empty($data['category'])){
			foreach($data['category'] as $key=>$value){
				$place_cat = new PlaceCategory;
				$place_cat->placeID = $placeid;
				$place_cat->categoryID = $value;
				$place_cat->save();
			}
		}

		if(!empty($data['startday'])){
			foreach($data['startday'] as $key=>$value){
				$place_time = new PlaceTime;
				$place_time->placeID = $placeid;
				$place_time->startday = $value;
				$place_time->endday = $data['endday'][$key];
				$place_time->starttime = $data['starttime'][$key];
				$place_time->endtime = $data['endtime'][$key];

				$place_time->save();
			}
		}

		if(!empty($data['tel'])){
			foreach($data['tel'] as $key=>$value){
				$place_tel = new PlaceTel;
				$place_tel->placeID = $placeid;
				$place_tel->tel = $value;

				$place_tel->save();
			}
		}

		 // print_r($data);
		File::deleteDirectory('uploads/place/temp');
		// print_r($data['recommend']);
		return redirect('place')->with('message', 'บันทึกข้อมูลเรียบร้อย');
	}

	public function delete($id){
		Place::where('ID', $id)->delete();
		PlaceCategory::where('placeID', $id)->delete();

		return redirect('place')->with('message', 'ลบสถานที่เรียบร้อย');
	}

	public function getAmphur(){
		$provinceID = Request::get('provinceid');
		$amphur = Amphur::where('PROVINCE_ID', $provinceID)->get();
		return $amphur;
	}

	public function deleteimg(){
		$data = Request::all();
		//delete('uploads/place/16/thumbnail/');
		return $data;
	}

	public function galleryupload(){
		$data = Request::all();
		foreach($data['gallery'] as $key=>$value){
			$value->move('uploads/place/temp/',$value->getClientOriginalName());
		}
		//delete('uploads/place/16/thumbnail/');
		return $data;
	}
}
