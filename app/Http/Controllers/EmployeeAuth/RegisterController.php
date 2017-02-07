<?php

namespace App\Http\Controllers\EmployeeAuth;

use App\Models\Customer;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/customer/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'    => 'required|email|max:255|unique:customers',
            'name'     => 'required|max:255',
            'phone'    => 'required|max:255',
            'address'  => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Customer::create(['name'     => $data['name'],
                                 'email'    => $data['email'],
                                 'address'  => $data['address'],
                                 'phone'    => $data['phone'],
                                 'password' => bcrypt($data['password']),]);
    }

    public function showRegistrationForm()
    {
        return view('customer.auth.register');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }
}
