<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});
/*akses api tanpa login */
Route::middleware('api')->group(function () {
  
  Route::any('/cari-ajax/kilat','BarangController@cariAjaxKilat');
  Route::any('/caribarang','BarangController@caribarang');
  Route::any('/deletesewa','SewaController@delete');
 


});

/*akses api harus login */
// Route::middleware('auth:api')->group(function () {
//   Route::any('/user-pesan/ajax-inbox/sekarang','User\PesanController@ajaxPesanInboxUser');
    
//   });
