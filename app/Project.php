<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'ID_Project';
    protected $fillable = ['ID_Project', 'userID', 'Project_Start', 'Project_End', 'ProjectSite',
                            'Hospital', 'Task'];
}
