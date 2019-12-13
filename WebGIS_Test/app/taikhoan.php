<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\khunhatro;
class taikhoan extends Model
{
    //
    protected $table = 'taikhoan';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function khunhatro_tdm_point()
    {
        return $this->belongsTo('App\khunhatro','makhutro','id');
    }
}
