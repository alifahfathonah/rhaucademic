<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Student;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/
	
	use RegistersUsers;
	
	/**
	* Where to redirect users after registration.
	*
	* @var string
	*/
	protected $redirectTo = RouteServiceProvider::HOME;
	
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware('guest');
	}
	
	/**
	* Get a validator for an incoming registration request.
	*
	* @param  array  $data
	* @return \Illuminate\Contracts\Validation\Validator
	*/
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'nokk'	=> ['required'],
			'nik'	=> ['required'],
			'name' => ['required', 'string', 'max:255'],
			'username' => ['required', 'string', 'max:255', 'unique:users'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
			]
		);
	}
	
	/**
	* Create a new user instance after a valid registration.
	*
	* @param  array  $data
	* @return \App\User
	*/
	protected function create(array $data)
	{
		$s = $this->check($data['nokk'], $data['nik']);
		
		if(!$s){
			return 'x';
		}
		if($s->user_id) return 'y';

		$usr = User::create([
			'level'	=> 9,
			'name' => $data['name'],
			'email' => $data['email'],
			'username' => $data['username'],
			'password' => Hash::make($data['password']),
			]
		);
		$s->update(['user_id' => $usr->id]);
		
		return $usr;
		
	}
	
	private function check($kk, $nik)
	{
		return Student::where('nokk', $kk)->where('nik', $nik)->first();
	}
}