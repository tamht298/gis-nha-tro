<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Otro;
use App\baiviet;
use App\khunhatro;
use App\sinhvien;
use App\taikhoan;
use Session;
use Hash;
class QLOTro extends Controller
{
    //
    public function DsOtro(Request $req){
        $pageSize = 4;
        $dsOTro=DB::table('otro')->where('mssv', $req->getmssv)->join('khunhatro_tdm_point', 'otro.makhutro', '=', 'khunhatro_tdm_point.gid')->paginate($pageSize);
        $student = sinhvien::find($req->getmssv);

        return view('pages.admin.ThongTinTro',['dsOTro'=>$dsOTro, 'pageSize'=>$pageSize, 'student'=>$student]);
    }

    public function DSSVTro(Request $req)
    {
        $pageSize = 4;
        $idkhutro = $request->session()->get('makhutro');
        $SVOTro=DB::table('otro')->where('makhutro', $idkhutro)->join('khunhatro_tdm_point', 'otro.makhutro', '=', 'khunhatro_tdm_point.gid','khunhatro_tdm_point', 'otro.makhutro', '=', 'khunhatro_tdm_point.gid')->paginate($pageSize);
        //$SVOTro = OTro::paginate($pageSize);
        return view('pages.user.hostel',['SVOTro'=>$SVOTro, 'pageSize'=>$pageSize]);
    }

    public function ThemDSSVTro(Request $req)
    {
        $Otro = new OTro();
        $Otro->mssv = $req->mssv;
        $Otro->ngayden = $req->ngayden;
        $Otro->makhutro = $req->session()->get('makhutro');
        $Otro->sophong = $req->sophong;

        $Otro->save();

        echo "<script>alert('Thêm thành công!')</script>";
        return redirect()->back()->with('alert', 'Thêm thành công!');
    }

    public function SuaDSSVTro($id,Request $req)
    {
        $Otro = OTro::find($id);
        $Otro->mssv=$req->mssv;
        $Otro->ngayden=$req->ngayden;
        $Otro->ngaydi=$req->ngaydi;
        $Otro->makhutro = $req->session()->get('makhutro');
        $Otro->sophong=$req->sophong;

        $Otro->save();
        return redirect()->back()->with('alert', 'Sửa thành công!');
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
        return redirect()->back()->with('alert', 'Sửa thành công!');
    }
    //Quản lý sinh viên trọ (chủ trọ)
    public function SinhVienTro(Request $request){
        $pageSize = 10;
        $idkhutro = $request->session()->get('makhutro');
        $khunhatro = khunhatro::find($idkhutro);
        $SVOTro = DB::table('otro')->where('makhutro', $idkhutro)->join('khunhatro_tdm_point', 'otro.makhutro', '=', 'khunhatro_tdm_point.gid')->paginate($pageSize);

        return view('pages.user.hostelstudent',['SVOTro'=>$SVOTro, 'pageSize'=>$pageSize,'khunhatro'=>$khunhatro]);
    }

    public function ThongTinChuTro(Request $request){
        $pageSize = 1;
        $idkhutro = $request->session()->get('makhutro');
        $khunhatro = khunhatro::find($idkhutro)->paginate($pageSize);
        // $tro = khunhatro::find($idkhutro)->paginate($pageSize);
        return view('pages.user.hostelinfo',[pageSize'=>$pageSize,'khunhatro'=>$khunhatro]);
    }

    public function BaiVietChuTro(Request $request){
        $pageSize = 10;
        $idkhutro = $request->session()->get('makhutro');
        $khunhatro = khunhatro::find($idkhutro);

        $baiviet=DB::table('baiviet')->where('makhutro', $idkhutro)->paginate($pageSize);

        return view('pages.user.hostelposts',['pageSize'=>$pageSize,'baiviet'=>$baiviet, 'khunhatro'=>$khunhatro]);
    }

    public function ThemBaiViet(Request $req)
    {

        $baiviet = new baiviet();

        $baiviet->tieude= $req->tieude;
        $baiviet->noidung= $req->noidung;
        $date = date("Y-m-d H:i:s");
        $baiviet->ngaytao= $date;
        $baiviet->makhutro= $req->session()->get('makhutro');
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
        $pageSize = 10;
        $dsBaiViet=DB::table('baiviet')->where('trangthaiduyet', 1)->paginate($pageSize);

        $dsKhuTro =khunhatro::all();

        return view('pages.user.posts',['dsBaiViet'=>$dsBaiViet,'dsKhuTro'=>$dsKhuTro, 'pageSize'=>$pageSize]);
    }

    public function TrangDoiMatKhau(){
        return view('pages.user.changepassword');
    }

    public function DoiMatKhau(Request $req){
        $tentaikhoan = session('tendn');
        $matkhaucu = $req->matkhaucu;
        $matkhaumoi = $req->matkhaumoi;
        $xacnhanmatkhaumoi = $req->xacnhanmatkhaumoi;
        $danhsachtaikhoan = taikhoan::all();
        foreach($danhsachtaikhoan as $item){
            if($item->tendangnhap == $tentaikhoan)
                $taikhoan = $item;
        }
        if($taikhoan!= null)
        {
            if(!Hash::check($matkhaumoi, $taikhoan->matkhau))
            {
                if(Hash::check($matkhaucu, $taikhoan->matkhau) && $matkhaumoi == $xacnhanmatkhaumoi)
                    {
                        $taikhoan->matkhau = Hash::make($matkhaumoi);
                        $taikhoan->save();
                        Session::flash('success', 'Đổi mật khẩu thành công!');
                    }
                else if($matkhaumoi != $xacnhanmatkhaumoi){
                    Session::flash('error', 'Mật khẩu mới và xác nhận mật khẩu mới không trùng nhau!');
                }
                else
                {
                    Session::flash('error', 'Mật khẩu cũ không hợp lệ!');
                }
                return redirect()->back();
            }
            else{
                Session::flash('error', 'Mật khẩu mới không được phép giống mật khẩu cũ!');
                return redirect()->back();
            }
        }
        else
            return ('pages.login');

    }
}
