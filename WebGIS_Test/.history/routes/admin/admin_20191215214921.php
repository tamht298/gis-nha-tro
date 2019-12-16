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


    Route::get('trang-quan-tri', function () {
        return view('pages.admin.Dashboard');
    });

    Route::get('quan-ly-thong-tin-sv', function () {
        return view('pages.admin.QLThongTinSV');
    });

    Route::get('quan-ly-khu-tro', function () {
        return view('pages.admin.QLKhuTro');
    });

    Route::get('quan-ly-bai-viet', function () {
        return view('pages.admin.QLBaiViet');
    });

    Route::get('thong-ke-theo-phuong', function () {
        return view('pages.admin.ThongKeTheoPhuong');
    });

    Route::get('thong-ke-theo-chu-tro', function () {
        return view('pages.admin.ThongKeTheoChuTro');
    });

    // Route::get('quan-ly-tai-khoan', function () {
    //     return view('pages.admin.QLTaiKhoan');
    // });



    Route::get('test', function(){
        $user = App\sinhvien::all()->toArray();
        var_dump($user);
    });

        Route::get('danhsachSV', 'QLSinhVien@DanhsachSV')->name('danhsachSV');
        Route::post('themSV', 'QLSinhVien@ThemSV')->name('themSV');
        Route::post('suaSV/{mssv}', 'QLSinhVien@SuaSV')->name('suaSV');
        Route::post('xoaSV/{mssv}', 'QLSinhVien@XoaSV')->name('xoaSV');

        Route::get('quan-ly-khu-tro','QLkhutro@DsKhuTro')->name('quan-ly-khu-tro');
        Route::post('themNhatro','QLkhutro@ThemKhuTro')->name('themNT');
        Route::post('suaNhatro/{gid}','QLkhutro@SuaNhaTro')->name('SuaNT');
        Route::post('xoaNhatro/{gid}','QLkhutro@XoaNhaTro')->name('XoaNT');

        Route::get('thong-tin-tro', function () {
            return view('pages.admin.ThongTinTro');
        })->name('view-thong-tin-tro');
        Route::post('thong-tin-tro','QLOTro@DsOtro')->name('thong-tin-tro');
        Route::post('themOTro','QLkhutro@ThemOTro')->name('themOTro');

        Route::get('quan-ly-bai-viet', 'QLBaiViet@DsBaiViet')->name('quan-ly-bai-viet');
        Route::post('sua-trang-thai/{id}', 'QLBaiViet@SuaTrangThai')->name('sua-trang-thai');
        Route::post('xoaBV/{id}', 'QLBaiViet@XoaBV')->name('xoaBV');

        Route::get('thong-ke-theo-phuong', 'ThongKe@ThongKeTheoPhuong')->name('thong-ke-theo-phuong');

        Route::get('quan-ly-tai-khoan', 'QLtaikhoan@DanhsachTK')->name('quan-ly-tai-khoan');
        Route::post('themTK', 'QLtaikhoan@ThemTK')->name('themTK');
        Route::post('suaTK/{id}', 'QLtaikhoan@SuaTK')->name('suaTK');
        Route::post('xoaTK/{id}', 'QLtaikhoan@XoaTK')->name('xoaTK');

        Route::get('thong-ke-theo-chu-tro', 'ThongKe@ThongKeTheoTro')->name('thong-ke-theo-chu-tro');
        Route::get('bieu-do-thong-ke-phuong', 'ThongKe@ChartTheoPhuong')->name('bieu-do-thong-ke-phuong');


        Route::get('sear', 'ThongKe@ChartTheoPhuong')->name('bieu-do-thong-ke-phuong');
