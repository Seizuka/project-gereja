<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	/*if (Auth::user()->hasRole('admin')) {
		return view('admin');
	}
	if (Auth::user()->hasRole('user')) {
		return view('home');
	}else{
		return view('auth.register');
	}*/
	return view('auth.register');
});

Route::get('admin-page', function() {
    return 'Halaman untuk Admin';
})->middleware('role:admin')->name('admin');

Route::get('user-page', function() {
    return 'Halaman untuk User';
})->middleware('role:user')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::post('/register', 'RegistrationController@store');
Route::get('/dashboard', 'DashboardController@index');
//Route::get('/qrcode/{id}', 'QrcodeController@index')->name('qrcode2');
//Route::get('/qrcode/{id}', 'HomeController@daftar')->name('qrcode');
Route::get('/dashboard', 'AppController@index')->name('dashboard');
Route::get('/dashboard', 'DashboardController@jadwal')->name('dashboard');
Route::get('/jemaat', 'JemaatController@index')->name('jemaat');
Route::get('/jemaat', 'JemaatController@jemaat')->name('jemaat');
Route::post('/daftarpagi', 'HomeController@pagi')->name('daftarpagi');
Route::post('/daftarmalam', 'HomeController@malam')->name('daftarmalam');
Route::get('/scan', 'QrcodeController@scan')->name('scan');
Route::get('/home', 'HomeController@sisa')->name('home');
Route::get('/qrcode/{id}', 'QrcodeController@cek')->name('qrcode');
//Route::get('/qrcode/delete/{id}', 'QrcodeController@destroy')->name('qrcode');
Route::get('qr-code-g', function () {
  
    \QrCode::size(500)
            ->format('png')
            ->generate('$data->barcode', public_path('images/qrcode.png'));
    
  return view('qrcode');
    
});
Route::get('jemaat', [
    'uses' => 'JemaatController@jemaat',
    'as' => 'jemaat-list'
]);
