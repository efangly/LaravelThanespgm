<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckWorking extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'id_checkworking';
    protected $fillable = ['id_checkworking', 'name', 'status', 'position', 'ipaddress','imgpath','lastmodified'];
}
