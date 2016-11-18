<?php
namespace App\Libraries;

use App\Models\Navigate as Nav;
use App\Models\Category;

class Navigate
{
    /**
     * Danh sách navigation của các hệ thống
     */
    public function getNavigate()
    {
        return array(Nav::NAV_ADMIN     => 'Nav Admin',
                     Nav::NAV_EMPLOYEE  => 'Nav Employee',
                     Nav::NAV_CUSTOMER  => 'Nav Customer',
                     Nav:: NAV_TUTORIAL => 'Tutorial',
                     Nav::NAV_ARTICLE   => 'Article');
    }

    /**
     * Danh sách select admin
     */
    public function getListsAdmin()
    {

        $list = [];
        foreach ($this->getNavAll() as $key => $value) {
            $list[$value->id] = $value->name;
        }

        return $list;
    }

    /**
     * Danh sách navigation full
     */
    public function getNavAll()
    {
        return Nav::orderBy('order', 'ASC')->get();
    }

    /**
     * Danh sách navigation admin
     */
    public function getNavAdmin()
    {
        return Nav::where('type', Nav::NAV_ADMIN)->orderBy('order', 'ASC')->get();
    }

    /**
     * Danh sách navigation customer
     */
    public function getNavCustomer()
    {
        return Nav::where('type', Nav::NAV_CUSTOMER)->orderBy('order', 'ASC')->get();
    }

    /**
     * Danh sách navigation customer
     */
    public function getNavUser()
    {
        return Nav::where('type', Nav::NAV_EMPLOYEE)->orderBy('order', 'ASC')->get();
    }

    /**
     * Danh sách category dành cho select
     */
    public function getSelectCategories()
    {
        $list = [];
        foreach ($this->getCategories() as $keys => $values) {
            $list[$values->id] = $values->name;
        }

        return $list;
    }

    /**
     * Danh sách categories
     */
    public function getCategories()
    {
        return Category::orderBy('order', 'ASC')->get();
    }
}