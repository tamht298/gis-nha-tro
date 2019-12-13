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

Route::get('/', function () {
    return view('index');
});

Route::get('trang-chu', function () {
    return view('index');
});

// Route::get('trang-tin', function () {
//     return view('pages.user.posts');
// });

Route::get('lien-he', function () {
    return view('pages.user.contact');
});

// Route::get('quan-ly-tro', 'QLOTro@DSSVTro')->name('quan-ly-tro');

Route::post('ThemDSSVTro', 'QLOTro@ThemDSSVTro')->name('ThemDSSVTro');
Route::post('SuaDSSVTro/{id}', 'QLOTro@SuaDSSVTro')->name('SuaDSSVTro');
Route::post('XoaDSSVTro/{id}', 'QLOTro@XoaDSSVTro')->name('XoaDSSVTro');

Route::post('SuaTTChuTro/{gid}', 'QLOTro@SuaTTChuTro')->name('SuaTTChuTro');

Route::get('quan-ly-tro', 'QLOTro@QLChuTro')->name('quan-ly-tro');
Route::post('ThemBaiViet', 'QLOTro@ThemBaiViet')->name('ThemBaiViet');
Route::post('SuaBaiViet/{id}', 'QLOTro@SuaBaiViet')->name('SuaBaiViet');
Route::post('XoaBaiViet/{id}', 'QLOTro@XoaBaiViet')->name('XoaBaiViet');

Route::get('trang-tin', 'QLOTro@BaiViet')->name('trang-tin');