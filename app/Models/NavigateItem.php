<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavigateItem extends Model
{
    protected $table      = 'navigate_items';
    public    $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'route', 'nav_id'];

    public function getNavParent()
    {
        return $this->belongsTo('App\Models\Navigate', 'nav_id');
    }
}
