<?php
namespace Admin;
use \FunctionalTester;

class LoginCest
{
    public function _before(FunctionalTester $I)
    {
        $I->wantTo('TEST DANG NHAP');
        $I->amGoingTo('http://localhost:8080/admin/login');
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->wantTo('Test thành công');
    }
}
