<?php namespace App\Http\Controllers;
use App\Models\Category as Category;
use Request;
use File;

class CategoryController extends Controller {

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
		$category = Category::where('parentID',0)->get();
		foreach($category as $key=>$value){
			$category[$key]['child'] = Category::where('parentID',$value['ID'])->get();
			$category[$key]['name'] = Controller::filterlang($value['name'],'tha');
			foreach($category[$key]['child'] as $key2=>$value2){
				$category[$key]['child'][$key2]['name'] = Controller::filterlang($value2['name'],'tha');
			}
		}
		
		return view('category/index', ['category' => $category]);
	}
	public function save(){
		$data = Request::all();

		if(!empty($data['ID'])){
			$category = Category::find($data['ID']);
		}else{
			$category = new Category;
		}

		$category->name = "<!--tha".$data['name_tha']."--!><!--eng".$data['name_eng']."--!><!--cha".$data['name_cha']."--!>";
		$category->parentID = $data['parentID'];
		//amphurID,provinceID,cover,recommend
		$category->piccolor = 'color.png';
		$category->picblack = 'black.png';

		if(!empty($data['ID'])){
			$category::where('ID', $data['ID'])->update($category['attributes']);
			$categoryid = $data['ID'];
		}else{
			$category->save();
			$categoryid = $category->id;
		}
		if(!empty($data['piccolor']))
			$data['piccolor']->move('uploads/category/'.$categoryid.'/','color.png');
		if(!empty($data['picblack']))
			$data['picblack']->move('uploads/category/'.$categoryid.'/','black.png');
		// return $data;
		return redirect('category')->with('message', 'บันทึกข้อมูลเรียบร้อย');
	}

	public function getcategory(){
		$catid = Request::get('catid');
		$category = Category::where('ID', $catid)->get();
		$lang = ['tha','eng','cha'];
		foreach($lang as $key => $value){
			$category[0]['name_'.$value] = Controller::filterlang($category[0]['name'],$value);
		}
		return $category;
	}

	public function delete($id){
		Category::where('parentID', $id)->delete();
		Category::where('ID', $id)->delete();
		return redirect('category')->with('message', 'ลบกิจกรรมเรียบร้อย');
	}

}
