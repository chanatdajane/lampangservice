<?php namespace App\Http\Controllers;
use App\Models\Organization as Organization;
use Request;
use File;

class OrganizationController extends Controller {

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
		$organization = Organization::where('parentID',0)->get();
		foreach($organization as $key=>$value){
			$organization[$key]['child'] = Organization::where('parentID',$value['ID'])->get();
			$organization[$key]['name'] = $value['name'];
		}
		return view('organization/index', ['organization' => $organization]);
	}
	public function save(){
		$data = Request::all();

		if(!empty($data['ID'])){
			$organization = Organization::find($data['ID']);
		}else{
			$organization = new Organization;
		}

		$organization->name = $data['name'];
		// $organization->parentID = $data['parentID'];
		
		if(!empty($data['ID'])){
			$organization::where('ID', $data['ID'])->update($organization['attributes']);
			$organizationid = $data['ID'];
		}else{
			$organization->save();
			$organizationid = $organization->id;
		}
		
		return redirect('organization')->with('message', 'บันทึกข้อมูลเรียบร้อย');
	}

	public function getorganization(){
		$catid = Request::get('catid');
		$organization = Organization::where('ID', $catid)->get();
		
		return $organization;
	}

	public function delete($id){
		Organization::where('parentID', $id)->delete();
		Organization::where('ID', $id)->delete();
		return redirect('organization')->with('message', 'ลบกิจกรรมเรียบร้อย');
	}

}
