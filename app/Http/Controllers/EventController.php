<?php namespace App\Http\Controllers;
use App\Models\Event as Event;
use App\Models\Category as Category;
use Request;
use View;
use App\Models\Province as Province;
use App\Models\Amphur as Amphur;
use File;

class EventController extends Controller {

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
		$event = Event::get();
		foreach($event as $key => $value){
			$event[$key]['name'] = Controller::filterlang($event[$key]['name'],'tha');
		}
		return view('event/index', ['event' => $event]);
	}

	public function manage($id = '')
	{	
		$province = Province::get();
		if(!empty($id)){
			$event = Event::where('id',$id)->get();
			$lang = ['tha','eng','cha'];
			foreach($lang as $key => $value){
				$event[0]['name_'.$value] = Controller::filterlang($event[0]['name'],$value);
				$event[0]['detail_'.$value] = Controller::filterlang($event[0]['detail'],$value);
				$event[0]['address_'.$value] = Controller::filterlang($event[0]['address'],$value);
			}
			$amphur = Amphur::where('PROVINCE_ID', $event[0]['provinceID'])->get();
			return view('event/edit', ['event' => $event,'province' => $province,'amphur' => $amphur]);
		}else{
			return view('event/add',['province' => $province]);
		}
		
	}

	public function getIndex(){
		$event = event::get();
		return $event ? 'Model Profile Connect Yes!' : 'Error! Model Profile Connect False!!!';
	}

	public function save(){
		$data = Request::all();
		
		if(!empty($data['ID'])){
			$event = Event::find($data['ID']);
		}else{
			$event = new Event;
		}
		$event->name = "<!--tha".$data['name_tha']."--!><!--eng".$data['name_eng']."--!><!--cha".$data['name_cha']."--!>";
		$event->detail = "<!--tha".$data['detail_tha']."--!><!--eng".$data['detail_eng']."--!><!--cha".$data['detail_cha']."--!>";
		$event->startdate = $data['startdate'];
		$event->enddate = $data['enddate'];
		$event->address = "<!--tha".$data['address_tha']."--!><!--eng".$data['address_eng']."--!><!--cha".$data['address_cha']."--!>";
		$event->tel = $data['tel'];
		$event->cover = 'thumbnail.png';
		$event->logo = 'logo.png';
		$event->provinceID = $data['provinceID'];
		$event->amphurID = $data['amphurID'];
		//amphurID,provinceID,cover,recommend
		
		if(!empty($data['ID'])){
			$event::where('ID', $data['ID'])->update($event['attributes']);
			$eventid = $data['ID'];
		}else{
			$event->save();
			$eventid = $event->id;
		}
		if(!empty($data['cover']))
			$data['cover']->move('uploads/event/'.$eventid.'/','thumbnail.png');
		if(!empty($data['logo']))
			$data['logo']->move('uploads/event/'.$eventid.'/','logo.png');

		return redirect('event')->with('message', 'บันทึกข้อมูลเรียบร้อย');
	}
	public function delete($id){
		Event::where('ID', $id)->delete();
		return redirect('event')->with('message', 'ลบกิจกรรมเรียบร้อย');
	}
}
