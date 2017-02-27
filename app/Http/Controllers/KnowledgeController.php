<?php namespace App\Http\Controllers;
use App\Models\Knowledge as Knowledge;
use App\Models\Category as Category;
use Request;
use View;
use App\Models\Province as Province;
use File;

class KnowledgeController extends Controller {

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
		//$knowledge = Place::where('id','1')->get();
		$knowledge = Knowledge::get();
		foreach($knowledge as $key => $value){
			$knowledge[$key]['name'] = Controller::filterlang($knowledge[$key]['name'],'tha');
		}
		return view('knowledge/index', ['knowledge' => $knowledge]);
	}

	public function manage($id = '')
	{	
		$province = Province::get();
		if(!empty($id)){
			$knowledge = Knowledge::where('id',$id)->get();
				$knowledge[0]['name_tha'] = Controller::filterlang($knowledge[0]['name'],'tha');
				$knowledge[0]['name_eng'] = Controller::filterlang($knowledge[0]['name'],'eng');
				$knowledge[0]['description_tha'] = Controller::filterlang($knowledge[0]['description'],'tha');
				$knowledge[0]['description_eng'] = Controller::filterlang($knowledge[0]['description'],'eng');
			
			return view('knowledge/edit', ['knowledge' => $knowledge,'province' => $province]);
		}else{
			return view('knowledge/add',['province' => $province]);
		}
		
	}

	public function getIndex(){
		$knowledge = knowledge::get();
		return $knowledge ? 'Model Profile Connect Yes!' : 'Error! Model Profile Connect False!!!';
	}

	public function save(){
		$data = Request::all();
		
		if(!empty($data['ID'])){
			$knowledge = Knowledge::find($data['ID']);
		}else{
			$knowledge = new Knowledge;
		}
		$knowledge->name = "<!--tha".$data['name_tha']."--!><!--eng".$data['name_eng']."--!>";
		$knowledge->description = "<!--tha".$data['description_tha']."--!><!--eng".$data['description_eng']."--!>";
		$knowledge->link = $data['link'];
		
		if(!empty($data['ID'])){
			$knowledge::where('ID', $data['ID'])->update($knowledge['attributes']);
			$knowledgeid = $data['ID'];
		}else{
			$knowledge->save();
			$knowledgeid = $knowledge->id;
		}
	
		return redirect('knowledge')->with('message', 'บันทึกข้อมูลเรียบร้อย');
	}
	public function delete($id){
		Knowledge::where('ID', $id)->delete();
		return redirect('knowledge')->with('message', 'ลบกิจกรรมเรียบร้อย');
	}
}
