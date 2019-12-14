<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\sinhvien;
use Session;

class QLSinhVien extends Controller
{
    public function DanhsachSV(){
        $pageSize = 4;
        $student = sinhvien::paginate($pageSize);


        return view('pages.admin.QLThongTinSV',['student'=>$student, 'pageSize'=>$pageSize]);
    }
    // public function ChitietSV($mssv){
    //     $student = sinhvien::find($mssv);
    //     // return view('pages.admin.QLThongTinSV',['student'=>$student]);
    // }
    public function ThemSV(Request $req){
        $student = new sinhvien();

        $student->mssv = $req->mssv;
        $student->ho = $req->ho;
        $student->ten = $req->ten;
        $student->ngaysinh = $req->ngaysinh;
        $student->gioitinh = $req->gioitinh;
        $student->dienthoai = $req->dienthoai;
        $student->email = $req->email;
        $student->lop = $req->lop;

        $student->save();

        // echo "<script>alert('Thêm thành công!')</script>";
        if($student){
            Session::flash('success', 'Thêm sinh viên thành công!');
        }else {
		Session::flash('error', 'Thêm thất bại!');
	}
        return redirect()->route('danhsachSV');
    }
    public function SuaSV($mssv,Request $req){
        $student = sinhvien::find($mssv);
        $student->mssv = $req->mssv;
        $student->ho = $req->ho;
        $student->ten = $req->ten;
        $student->ngaysinh = $req->ngaysinh;
        $student->gioitinh = $req->gioitinh;
        $student->dienthoai = $req->dienthoai;
        $student->email = $req->email;
        $student->lop = $req->lop;

        $student->save();
        if($student){
            Session::flash('success', 'Thêm sinh viên thành công!');
        }else {
		Session::flash('error', 'Thêm thất bại!');
	}
        return redirect()->back();
        // return redirect()->route('danhsachSV');

    }
    public function XoaSV($mssv){
        sinhvien::destroy($mssv);
        return redirect()->back()->with('alert', 'Xóa dữ liệu thành công!');
    }
}
