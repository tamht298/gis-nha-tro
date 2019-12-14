<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\baiviet;
use DB;
use Session;
class QLBaiViet extends Controller
{
    //
    public function DsBaiViet(){
        $pageSize = 4;
        $dsBaiViet=DB::table('baiviet')-->paginate($pageSize);


        return view('pages.admin.QLBaiViet',['dsBaiViet'=>$dsBaiViet, 'pageSize'=>$pageSize]);
    }

    public function SuaTrangThai(Request $req, $id){
        $baiviet = baiviet::find($id);
        $baiviet->trangthaiduyet = $req->trangthai;
        $baiviet->save();
        if($baiviet){
            Session::flash('success', 'Cập nhật trạng thái thành công!');
        }else {
		Session::flash('error', 'Cập nhật thất bại!');
	}
        return redirect()->back();
    }

    public function XoaBV(Request $req, $id){

        $baivietxoa=baiviet::destroy($id);
        if ($baivietxoa) {
		    Session::flash('success', 'Xóa bài viết thành công!');
        }else {
            Session::flash('error', 'Xóa thất bại!');
        }
        return redirect()->route('quan-ly-bai-viet');
    }
}
