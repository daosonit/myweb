<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
