<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Url;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/', function () {

	//dd(request('url'));

	$url=request('url');

	$validator = Validator::make(compact('url'), [
            'url' => 'required|url'
        ])->validate();



    $record=Url::whereUrl(request('url'))->first();
    //dd($url);
    if (!$record) {
       $record=Url::create(['url'=>request('url'),'shortened'=>Url::getUniqueShortendUrl()]);
    }
    return view('/result')->withShortened($record->shortened);
});


//go to page url in browser
Route::get('/{shortened}', function ($shortened) {
	$url = Url::whereShortened($shortened)->first() ;
	if (!$url) {
		return redirect('/'); /* not backslash!!*/
	}
	return redirect($url->url);
});
