<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	function filterlang($content,$lang) {
		preg_match('/<!--'.$lang.'([^`]*?)--!>/', $content, $matches);
		if(!empty($matches[1])) {
			$matches[1] = strip_tags($matches[1]);
			//$shortContent = str_replace(array("\r", "\n"), '', $matches[1]);
			$shortContent = $matches[1];
		} else $shortContent = "";
		return empty($matches[1])? 'ไม่มีข้อมูล' : strip_tags($shortContent);
	}

}
