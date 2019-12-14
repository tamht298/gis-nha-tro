<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\khunhatro;
use App\dangnhap;
use DB;
use Hash;
class QLkhutro extends Controller
{
    //

    public function trangchu(){
        return view('index');
    }
    public function DsKhuTro(){
        $dsNhatro=khunhatro::all();
        return view('pages.admin.QLKhuTro',['dsNhatro'=>$dsNhatro]);
    }
    public function ThemKhuTro(Request $request){
        $khunhatro = new khunhatro();
        $khunhatro->tennhatro=$request->tennhatro;
        $khunhatro->diachi=$request->diachi;
        $khunhatro->tenchutro=$request->tenchutro;
        $khunhatro->sodienthoai=$request->sodienthoai;
        $khunhatro->save();
        if($baiviet){
            Session::flash('success', 'Thêm khu trọ thành công!');
        }else {
		Session::flash('error', 'Thêm khu trọ thất bại!');
	}
        return redirect()->route('quan-ly-khu-tro');
    }
    public function SuaNhaTro($gid,Request $request){
        $dsNhatro=khunhatro::find($gid);
        $dsNhatro->tennhatro=$request->tennhatro;
        $dsNhatro->diachi=$request->diachi;
        $dsNhatro->tenchutro=$request->tenchutro;
        $dsNhatro->sodienthoai=$request->sodienthoai;
        $dsNhatro->save();
        if($baiviet){
            Session::flash('success', 'Cập nhật khu trọ thành công!');
        }else {
		Session::flash('error', 'Cập nhật thất bại!');
	}
        return redirect()->route('quan-ly-khu-tro');
        // khunhatro::where('gid',$gid)->update(['tennhatro'=>'1']);
        // return redirect()->route('quan-ly-khu-tro');
    }
    public function XoaNhaTro($gid){
        $tro=khunhatro::destroy($gid);
        if($tro){
            Session::flash('success', 'Xoá khu trọ thành công!');
        }else {
		Session::flash('error', 'Xoá thất bại!');
	}
        return redirect()->route('quan-ly-khu-tro');
    }
    public function login(Request $req){
        $tendangnhap=$req->inputEmail;
        $matkhau=$req->inputPassword;
        // $dn=dangnhap::where('tendangnhap',$tendangnhap)->where('matkhau',$matkhau)->get();
        // if(count($dn)>0)
        // {

        //     if($dn[0]->quyen==0)
        //     {
        //         session()->put('tendn',$dn[0]->tendangnhap);
        //         return redirect('trang-chu');
        //     }
        //     else if($dn[0]->quyen==1)
        //     {
        //         session()->put('tenadmin',$dn[0]->tendangnhap);
        //         return redirect('trang-quan-tri');
        //     }
        // }
        $dn=dangnhap::where('tendangnhap',$tendangnhap)->get();
        if($dn!=null)
        {
            foreach($dn as $lg)
            {
                if(Hash::check($matkhau, $lg->matkhau))
                {
                    if($lg->quyen==0)
                    {
                        session()->put('tendn',$lg->tendangnhap);
                        return redirect('trang-chu');
                    }
                    else if($lg->quyen==1)
                    {
                        session()->put('tenadmin',$lg->tendangnhap);
                        return redirect('trang-quan-tri');
                    }
                }
            }
            return redirect('login');
        }
        tro
        return redirect('login');
  //       return "<script>alert('Dang nhap that bai'); window.location='login'</script>";
    }
    public function thoat(){
        session()->forget('tendn');
        return redirect('trang-chu');
    }
    public function thoatadmin(){
        session()->forget('tenadmin');
        return redirect('trang-chu');
    }
    public function trangtin(){
        return view('pages.user.posts');
    }
}
