<?php namespace App\Http\Controllers;
use App\Models\Smart as Smart;
use App\Models\Category as Category;
use Request;
use View;
use App\Models\Province as Province;
use App\Models\SmartGallery as SmartGallery;
use File;

class SmartController extends Controller {

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
		//$event = Place::where('id','1')->get();
		$smart = Smart::get();
		foreach($smart as $key => $value){
			$smart[$key]['name'] = Controller::filterlang($smart[$key]['name'],'tha');
		}
		return view('smart/index', ['smart' => $smart]);
	}

	public function manage($id = '')
	{	
		$province = Province::get();
		if(!empty($id)){
				$smart = Smart::where('id',$id)->get();
				$smart[0]['name_tha'] = Controller::filterlang($smart[0]['name'],'tha');
				$smart[0]['name_eng'] = Controller::filterlang($smart[0]['name'],'eng');
				$smart[0]['description_tha'] = Controller::filterlang($smart[0]['description'],'tha');
				$smart[0]['description_eng'] = Controller::filterlang($smart[0]['description'],'eng');
			
			$smartGalleryList = SmartGallery::where('smartID',$id)->get();
			$smartGallery = array();
			foreach($smartGalleryList as $key=>$value){
				array_push($smartGallery,$value['attributes']['name']);
			}

			return view('smart/edit', ['smart' => $smart,'province' => $province,'smartGallery' => $smartGallery]);
		}else{
			return view('smart/add',['province' => $province]);
		}
		
	}

	public function save(){
		$data = Request::all();
		//print_r($data);
		if(!empty($data['ID'])){
			$smart = Smart::find($data['ID']);
		}else{
			$smart = new Smart;
		}

		$smart->name = "<!--tha".$data['name_tha']."--!><!--eng".$data['name_eng']."--!>";
		$smart->description = "<!--tha".$data['description_tha']."--!><!--eng".$data['description_eng']."--!>";
		$smart->link = $data['link'];
		$smart->provinceID = $data['provinceID'];
		
		//cover,recommend
		if(!empty($data['ID'])){
			$smart::where('ID', $data['ID'])->update($smart['attributes']);
			$smartid = $data['ID'];
		}else{
			$smart->save();
			$smartid = $smart->id;
		}

		if(file_exists('uploads/smart/temp')){
			if(!file_exists('uploads/smart/'.$smartid)){
				mkdir('uploads/smart/'.$smartid);
				$movefile = File::move('uploads/smart/temp', 'uploads/smart/'.$smartid.'/gallery');
				$files = glob('uploads/smart/'.$smartid.'/gallery/*');
				foreach($files as $file){
					$filename = explode("/", $file);
					$smart_gal = new SmartGallery;
					$smart_gal->smartID = $smartid;
					$smart_gal->name = $filename[4];
					$smart_gal->save();
				}
			}else{
				$files = glob('uploads/smart/temp/*');
				
				foreach($files as $file){
					$filename = explode("/", $file);
					$smart_gal = new SmartGallery;
					$smart_gal->smartID = $smartid;
					$smart_gal->name = $filename[3];
					$smart_gal->save();

					copy($file, 'uploads/smart/'.$smartid.'/gallery/'.$filename[3]);
				}
			}
			
		}
		File::deleteDirectory('uploads/smart/temp');
		//File::move('uploads/place/temp', 'uploads/place/'.$placeid.'/gallery');

		return redirect('smart')->with('message', 'บันทึกข้อมูลเรียบร้อย');
	}

	public function galleryupload(){
		$data = Request::all();
		foreach($data['gallery'] as $key=>$value){
			 $value->move('uploads/smart/temp/',$value->getClientOriginalName());
		}
		//delete('uploads/place/16/thumbnail/');
		return $data;
	}

	public function delete($id){
		Smart::where('ID', $id)->delete();

		return redirect('smart')->with('message', 'ลบสถานที่เรียบร้อย');
	}
}
