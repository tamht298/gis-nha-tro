<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OTro extends Model
{
    protected $table='otro';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
}
