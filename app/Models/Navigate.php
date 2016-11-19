<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Navigate extends Model
{
    const NAV_ADMIN = 0; //navigation Admin
    const NAV_EMPLOYEE = 1; //navigation Employee
    const NAV_CUSTOMER = 2; //navigation Customer
    const NAV_TUTORIAL = 3; //tutorialspoint
    const NAV_ARTICLE = 4; //article


    protected $fillable   = ['name', 'type', 'order'];
    public    $timestamps = false;

    public function getNavItem()
    {
        return $this->hasMany('App\Models\NavigateItem', 'nav_id', 'id');
    }

    public function scopeFindName($query,$name = ''){
        return $query->where('name','LIKE','%'.$name.'%');
    }

    public function scopeFindType($query, $type = -1){
        return $query->where('type','LIKE',$type);
    }
}
