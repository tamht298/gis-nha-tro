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

Route::get('', function () {
    return view('pages.user.contact');
});

// Route::get('quan-ly-tro', 'QLOTro@DSSVTro')->name('quan-ly-tro');

Route::post('ThemDSSVTro', 'QLOTro@ThemDSSVTro')->name('ThemDSSVTro');
Route::post('SuaDSSVTro/{id}', 'QLOTro@SuaDSSVTro')->name('SuaDSSVTro');
Route::post('XoaDSSVTro/{id}', 'QLOTro@XoaDSSVTro')->name('XoaDSSVTro');

Route::post('SuaTTChuTro/{gid}', 'QLOTro@SuaTTChuTro')->name('SuaTTChuTro');


Route::post('ThemBaiViet', 'QLOTro@ThemBaiViet')->name('ThemBaiViet');
Route::post('SuaBaiViet/{id}', 'QLOTro@SuaBaiViet')->name('SuaBaiViet');
Route::post('XoaBaiViet/{id}', 'QLOTro@XoaBaiViet')->name('XoaBaiViet');
Route::get('danh-sach-tro', 'QLOTro@SinhVienTro')->name('danh-sach-tro');
Route::get('thong-tin-chu-tro', 'QLOTro@ThongTinChuTro')->name('thong-tin-chu-tro');
Route::get('danh-sach-bai-viet', 'QLOTro@BaiVietChuTro')->name('danh-sach-bai-viet');
Route::get('trang-tin', 'QLOTro@BaiViet')->name('trang-tin');

Route::get('doi-mat-khau','QLOTro@TrangDoiMatKhau')->name('doi-mat-khau');
Route::post('doi-mat-khau','QLOTro@DoiMatKhau')->name('doi-mat-khau');

Route::get('send-email', 'ContactController@sendEmail');
