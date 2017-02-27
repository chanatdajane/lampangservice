<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

use App\Models\Menu as Menu;

class ComposerServiceProvider extends ServiceProvider {

    public function boot()
    {
        View::composer('app', function($view){
        	$menu = Menu::get();
		    $view->with('menu', $menu);
		});
    }

    public function register()
    {
        //
    }
}