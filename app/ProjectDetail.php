<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'ID_ProjectDetail';
    protected $fillable = ['ID_ProjectDetail', 'ID_Project', 'productname', 'interface', 'interfacedatestart',
                            'interfacedateend', 'interfaceowner', 'interfacestatus', 'data', 'datadatestart',
                            'datadateend', 'dataowner', 'datastatus', 'test', 'testdatestart', 'testdateend',
                            'testowner', 'teststatus', 'install', 'installdatestart', 'installdateend',
                            'installowner', 'installstatus', 'setting', 'settingdatestart', 'settingdateend',
                            'settingowner', 'settingstatus', 'edit', 'editdatestart', 'editdateend', 'editowner',
                            'editstatus', 'train', 'traindatestart', 'traindateend', 'trainowner', 'trainstatus',
                            'using', 'usingdatestart', 'usingdateend', 'usingowner', 'usingstatus', 'check',
                            'checkdatestart', 'checkdateend', 'checkowner', 'checkstatus', 'standby',
                            'standbydatestart', 'standbydateend', 'standbyowner', 'standbystatus', 'acceptuser'];
}
