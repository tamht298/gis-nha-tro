<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Otro;
use App\baiviet;
use App\khunhatro;
use App\sinhvien;
use Session;
class QLOTro extends Controller
{
    //
    public function DsOtro(Request $req){
        $pageSize = 4;
        $dsOTro=DB::table('otro')->where('mssv', $req->getmssv)->join('khunhatro_tdm_point', 'otro.makhutro', '=', 'khunhatro_tdm_point.gid')->paginate($pageSize);
        $student = sinhvien::find($req->getmssv);

        return view('pages.admin.ThongTinTro',['dsOTro'=>$dsOTro, 'pageSize'=>$pageSize, 'student'=>$student]);
    }

    public function DSSVTro()
    {
        $pageSize = 4;
        $idkhutro = 1;
        $SVOTro=DB::table('otro')->where('makhutro', $idkhutro)->join('khunhatro_tdm_point', 'otro.makhutro', '=', 'khunhatro_tdm_point.gid','khunhatro_tdm_point', 'otro.makhutro', '=', 'khunhatro_tdm_point.gid')->paginate($pageSize);
        //$SVOTro = OTro::paginate($pageSize);
        return view('pages.user.hostel',['SVOTro'=>$SVOTro, 'pageSize'=>$pageSize]);
    }

    public function ThemDSSVTro(Request $req)
    {
        $Otro = new OTro();

        $Otro->mssv=$req->mssv;
        $Otro->ngayden=$req->ngayden;
        $Otro->ngaydi=$req->ngaydi;
        $Otro->makhutro=1;
        $Otro->sophong=$req->sophong;

        $Otro->save();

        echo "<script>alert('Thêm thành công!')</script>";
        return redirect()->route('quan-ly-tro');
    }

    public function SuaDSSVTro($id,Request $req)
    {
        $Otro = OTro::find($id);
        $Otro->mssv=$req->mssv;
        $Otro->ngayden=$req->ngayden;
        $Otro->ngaydi=$req->ngaydi;
        $Otro->makhutro=1;
        $Otro->sophong=$req->sophong;

        $Otro->save();
        return redirect()->back() ->with('alert', 'Sửa thành công!');
    }

    public function XoaDSSVTro($id)
    {
        OTro::destroy($id);
        return redirect()->back()->with('alert', 'Xóa dữ liệu thành công!');
    }

    public function SuaTTChuTro($gid,Request $req)
    {
        $khutro = khunhatro::find($gid);
        $khutro->tennhatro = $req->tennhatro;
        $khutro->tenchutro = $req->tenchutro;
        $khutro->sodienthoai = $req->sodienthoai;
        $khutro->diachi = $req->diachi;
        $khutro->save();
        return redirect()->back() ->with('alert', 'Sửa thành công!');
    }
    //Quản lý sinh viên trọ (chủ trọ)
    public function SinhVienTro(){
        $pageSize = 4;
        $idkhutro = 1;
        $khunhatro = khunhatro::find($idkhutro);
        $SVOTro = DB::table('otro')->where('makhutro', $idkhutro)->join('khunhatro_tdm_point', 'otro.makhutro', '=', 'khunhatro_tdm_point.gid')->paginate($pageSize);

        return view('pages.user.hostelstudent',['SVOTro'=>$SVOTro, 'pageSize'=>$pageSize,'khunhatro'=>$khunhatro]);
    }

    public function ThongTinChuTro(){
        $pageSize = 4;
        $idkhutro = 1;
        $khunhatro = khunhatro::find($idkhutro);
        $SVOTro = DB::table('otro')->where('makhutro', $idkhutro)->join('khunhatro_tdm_point', 'otro.makhutro', '=', 'khunhatro_tdm_point.gid')->paginate($pageSize);
        return view('pages.user.hostelinfo',['SVOTro'=>$SVOTro, 'pageSize'=>$pageSize,'khunhatro'=>$khunhatro]);
    }

    public function BaiVietChuTro(){
        $pageSize = 4;
        $idkhutro = 1;
        $khunhatro = khunhatro::find($idkhutro);
        $baiviet=baiviet::find($idkhutro)->paginate($pageSize);

        return view('pages.user.hostelposts',['pageSize'=>$pageSize,'baiviet'=>$baiviet, 'khunhatro'=>$khunhatro]);
    }

    public function ThemBaiViet(Request $req)
    {

        $baiviet = new baiviet();

        $baiviet->tieude= $req->tieude;
        $baiviet->noidung= $req->noidung;
        $date = date("Y-m-d H:i:s");
        $baiviet->ngaytao= $date;
        $baiviet->makhutro= $req->makhutro;
        $baiviet->trangthaiduyet= 0;
        $baiviet->save();
        if($baiviet){
            Session::flash('success', 'Thêm thành công!');
        }else {
            Session::flash('error', 'Thêm thất bại!');
        }
        return redirect()->back();

    }

    public function SuaBaiViet($id,Request $req)
    {
        $baiviet = baiviet::find($id);
        $baiviet->tieude= $req->tieude;
        $baiviet->noidung= $req->noidung;
        $baiviet->makhutro= $req->makhutro;

        $baiviet->save();
        if($baiviet){
            Session::flash('success', 'Cập nhật thành công!');
        }else {
            Session::flash('error', 'Cập nhật thất bại!');
        }
        return redirect()->back();
    }

    public function XoaBaiViet($id)
    {
        $baiviet = baiviet::destroy($id);
        if($baiviet){
            Session::flash('success', 'Xóa thành công!');
        }else {
            Session::flash('error', 'Xóa thất bại!');
        }
        return redirect()->back();
    }

    //trang bai viet
    public function BaiViet(){
        $pageSize = 4;
        $dsBaiViet=DB::table('baiviet')->where('')->paginate($pageSize);

        $dsKhuTro =khunhatro::all();

        return view('pages.user.posts',['dsBaiViet'=>$dsBaiViet,'dsKhuTro'=>$dsKhuTro, 'pageSize'=>$pageSize]);
    }

}
