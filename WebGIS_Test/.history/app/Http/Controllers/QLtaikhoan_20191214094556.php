<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\taikhoan;
use App\khunhatro;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Hash;
use Session;
class QLtaikhoan extends Controller
{
    //
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function DanhsachTK(){
        $pageSize=4;
        $taikhoan = taikhoan::all()->paginate($pageSize);
        $khunhatro = khunhatro::all();
        return view('pages.admin.QLTaiKhoan',['taikhoan'=>$taikhoan],['khunhatro'=>$khunhatro], ['pageSize']);
    }

    // Them TK
    public function ThemTK(Request $req){
            $taikhoan = new taikhoan();

            $taikhoan->tendangnhap = $req->tendangnhap;
            $taikhoan->matkhau = Hash::make($req->matkhau);
            $date = date("Y-m-d H:i:s");
            $taikhoan->ngaytao = $date;
            $taikhoan->trangthai = 0;
            $taikhoan->makhutro = $req->makhutro;
            $taikhoan->quyen = $req->quyen;
            $taikhoan->save();
            if($taikhoan){
                Session::flash('success', 'Thêm thành công!');
            }else {
                Session::flash('error', 'Thêm thất bại!');
            }
            return redirect()->back();


    }

    public function SuaTK($id,Request $req){
        $taikhoan = taikhoan::find($id);
        $taikhoan->matkhau = Hash::make($req->matkhau);
        $date = date("Y-m-d H:i:s");
        $taikhoan->ngaytao = $date;
        $taikhoan->makhutro = $req->makhutro;
        $taikhoan->quyen = $req->quyen;
        $taikhoan->save();
        if ($taikhoan) {
		    Session::flash('success', 'Cập nhật tài khoản thành công!');
        }else {
            Session::flash('error', 'Cập nhật tài khoản thất bại!');
        }

        return redirect()->back();
    }
    public function XoaTK($id){
        $xoataikhoan = taikhoan::destroy($id);
        if ($xoataikhoan) {
		    Session::flash('success', 'Xóa bài viết thành công!');
        }else {
            Session::flash('error', 'Xóa thất bại!');
        }
        return redirect()->back();
    }
}
