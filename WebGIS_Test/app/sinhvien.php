<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sinhvien extends Model
{
    protected $table = 'sinhvien';
    public $timestamps = false;
    protected $primaryKey = 'mssv';
    public $incrementing = false;
}
