<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailplan extends Model
{
    public $incrementing = false;
    public $table = "detailplans";
    protected $primaryKey = 'ID_detial';
    protected $fillable = ['ID_detial', 'ID_Plan', 'userID', 'Date_PlanS', 'Detial_Plan',
                            'Location_Plan', 'Plan_Name_All', 'Money_Total', 'Lastmodify'];
}
