<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\Carrera;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cedula' => ['required', 'integer', 'gt:0', 'lt:99999999', 'unique:usuarios'],
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
			'rol' => ['required', 'integer', 'gt:0'],
            'carrera' => ['required', 'integer', 'gt:0']
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'cedula' => $data['cedula'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'rol_id' => $data['rol'],
            'carrera_id' => $data['carrera']
        ]);
    }
}
