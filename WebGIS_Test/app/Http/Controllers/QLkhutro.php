<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\khunhatro;
use App\dangnhap;
use App\sinhvien;
use App\OTro;
use DB;
use Hash;
use Session;
class QLkhutro extends Controller
{
    //
    public function TrangChinh(){
        $dsNhatro = DB::table('khunhatro_tdm_point')->select('gid', 'tennhatro', 'tenchutro', 'sodienthoai', 'diachi', DB::raw('ST_X(geom) as x'), DB::raw('ST_Y(geom) as y'))->get();
        return view('index',['dsNhatro'=>$dsNhatro]);
    }

    public function QLDSKhuNhaTro(){
        $dsNhatro = DB::table('khunhatro_tdm_point')->select('gid', 'tennhatro', 'tenchutro', 'sodienthoai', 'diachi', DB::raw('ST_X(geom) as x'), DB::raw('ST_Y(geom) as y'))->get();
        return view('pages.admin.QLKhuTroBanDo',['dsNhatro'=>$dsNhatro]);
    }

    public function ThemKhuTroBanDo(Request $request){
        // $khunhatro = new khunhatro();
        // $khunhatro->tennhatro=$request->txtTennhatro;
        // $khunhatro->diachi=$request->txtDiachi;
        // $khunhatro->tenchutro=$request->txtTenchutro;
        // $khunhatro->sodienthoai=$request->txtSodienthoai;
        // $khunhatro->save();
        $khunhatro=DB::table('khunhatro_tdm_point')->insert(['tennhatro'=>$request->txtTennhatro,
         'tenchutro'=>$request->txtTenchutro, 'sodienthoai'=>$request->txtSodienthoai,
         'diachi'=>$request->txtDiachi, 'geom'=>DB::raw("ST_GeomFromText('POINT(".$request->x." ".$request->y.")', 4326)")]);
        if($khunhatro){
            Session::flash('success', 'Thêm khu trọ thành công!');
        }
        else {
		    Session::flash('error', 'Thêm khu trọ thất bại!');
	    }
        return redirect()->route('QLDSKhuNhaTro');
    }

    public function trangchu(){
        return view('index');
    }
    public function DsKhuTro(){
        $dsNhatro = DB::table('khunhatro_tdm_point')->select('gid', 'tennhatro', 'tenchutro', 'sodienthoai', 'diachi', DB::raw('ST_X(geom) as x'), DB::raw('ST_Y(geom) as y'))->get();
        //$dsNhatro=khunhatro::all();
        return view('pages.admin.QLKhuTro',['dsNhatro'=>$dsNhatro]);
    }
    public function ThemKhuTro(Request $request){
        $khunhatro = new khunhatro();
        $khunhatro->tennhatro=$request->tennhatro;
        $khunhatro->diachi=$request->diachi;
        $khunhatro->tenchutro=$request->tenchutro;
        $khunhatro->sodienthoai=$request->sodienthoai;
        $khunhatro->save();
        if($khunhatro){
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
        if($dsNhatro){
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
                        session()->put('makhutro',$lg->makhutro);
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
        Session::flash('error', 'Đăng nhập thất bại!');
        return redirect('login');
  //       return "<script>alert('Dang nhap that bai'); window.location='login'</script>";
    }

    public function DsSinhVienOtro($idChuTro){
        // code
        $dsSVOtro=DB::table('otro')->
        join('khunhatro_tdm_point','otro.makhutro','=','khunhatro_tdm_point.gid')->
        join('sinhvien','otro.mssv','=','sinhvien.mssv')->
        where('khunhatro_tdm_point.gid','=',$idChuTro)->
        select('sinhvien.ho','sinhvien.ten','sinhvien.mssv','otro.ngayden','otro.sophong',
        'sinhvien.gioitinh')->get();

        $tenkhutro=DB::table('khunhatro_tdm_point')->where('khunhatro_tdm_point.gid','=',$idChuTro)->
        select('khunhatro_tdm_point.tennhatro')->first();
        return view('pages.admin.Dssvotro',['dsSVOtro'=>$dsSVOtro], compact('tenkhutro'));

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
