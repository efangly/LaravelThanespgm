<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'ID_Plan';
    protected $fillable = ['ID_Plan', 'userID', 'Date_Start', 'Date_End', 'Money',
                            'Location', 'Plan', 'Plan_Name', 'Lastmodify'];
}
