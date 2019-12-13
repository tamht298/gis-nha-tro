<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\phuong;
use App\khunhatro;
use DB;
use App\CHarts\ChartTheoPhuong;
use Illuminate\Support\Collection;

class ThongKe extends Controller
{
    //
    public function ThongKeTheoPhuong(){

        $ds = DB::select('select phuong.gid, phuong.tenphuong, sum((case ST_Contains(phuong.geom, tro.geom)
										when True then 1
										else 0 end)) as sl
        from vungranhgioiphuongtxtdm_region phuong left join khunhatro_tdm_point tro
        on ST_Contains(phuong.geom, tro.geom)=True
        group by phuong.gid, phuong.tenphuong');

        return view('pages.admin.ThongKeTheoPhuong',['ds'=>$ds]);
    }

    public function ThongKeTheoTro(){
        $ds2 = DB::select('select tro.gid, tro.tennhatro, tro.diachi, count(*) sl from otro left join khunhatro_tdm_point tro on otro.makhutro=tro.gid where otro.ngaydi is null group by tro.gid, tro.tennhatro');
        return view('pages.admin.ThongKeTheoChuTro',['ds2'=>$ds2]);
    }




}
