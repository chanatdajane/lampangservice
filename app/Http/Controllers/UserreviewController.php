<?php namespace App\Http\Controllers;
use App\User as User;
use App\Models\Userreview as Userreview;
use App\Models\Place as Place;
use Request;
class UserreviewController extends Controller {

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
		$place = Place::get();
		foreach($place as $key => $value){
			$place[$key]['name'] = Controller::filterlang($place[$key]['name'],'tha');
		}
		$userreview = Userreview::get();
		foreach ($userreview as $key => $value) {
			$user = User::where('id', $value['userID'])->get();
			$userreview[$key]['user'] = $user[0]['name'];
			$placelist = Place::where('ID', $value['placeID'])->get();
			$userreview[$key]['place'] = Controller::filterlang($placelist[0]['name'],'tha');
			if($value['approve'] == 0) $value['approveval'] = 'รอการตรวจสอบ';
			else $value['approveval'] = 'อนุมัติแล้ว';

			$userreview[$key]['detail'] = str_limit($value['detail'], $limit = 100, $end = '...<a class="reviewmore" id="reviewmore-'.$value['ID'].'">more</a>');
		}
		return view('userreview/index',['userreview'=>$userreview,'place'=>$place]);
	}

	public function approve($id){
		$userreview = Userreview::find($id);
		if($userreview->approve == 0) $userreview->approve = 1;
		else $userreview->approve = 0;
		$userreview::where('ID', $id)->update($userreview['attributes']);
		$userreview->save();
		return redirect('userreview')->with('message', 'อนุมัติรีวิวเรียบร้อย');
	}

	public function delete($id){
		Userreview::where('ID', $id)->delete();
		return redirect('userreview')->with('message', 'ลบรีวิวเรียบร้อย');
	}

	public function getUserreview(){
		$placeid = Request::get('placeid');
		if($placeid != 0)
			$userreview = Userreview::where('placeID', $placeid)->get();
		else
			$userreview = Userreview::get();

		foreach ($userreview as $key => $value) {
			$user = User::where('id', $value['userID'])->get();
			$userreview[$key]['user'] = $user[0]['name'];
			$placelist = Place::where('ID', $value['placeID'])->get();
			$userreview[$key]['place'] = Controller::filterlang($placelist[0]['name'],'tha');
			if($value['approve'] == 0) $value['approveval'] = 'รอการตรวจสอบ';
			else $value['approveval'] = 'อนุมัติแล้ว';

			$userreview[$key]['detail'] = str_limit($value['detail'], $limit = 100, $end = '...<a class="reviewmore" id="reviewmore-'.$value['ID'].'">more</a>');
		}

		return $userreview;
	}

	public function getFullreview(){
		$reviewid = Request::get('reviewid');
		$userreview = Userreview::where('ID', $reviewid)->get();
		return $userreview[0]['detail'];
	}

	// public function delete($id){
	// 	User::where('id', $id)->delete();
	// 	return redirect('user')->with('message', 'ลบผู้ใช้เรียบร้อย');
	// }
}
