<?php namespace App\Controllers;
use App\Models\ModelAuth;

class Auth extends BaseController
{

	public function __construct() {
		$this->ModelAuth = new ModelAuth();
		helper('form');
	}

	public function index()
	{
		$data = array(
			'title' => 'Login',
			'isi' => 'v_login',
			'errors' => \Config\Services::validation(),
		);	
		return view('layoutAuth/v_wrapper',$data);
	}

	public function cek_login()
	{
		if ($this->validate([
			'email'=>[
				'label' => 'E-Mail',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong!'
				]
			],
			'password'=>[
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong!'
				]
			]
		])) {
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$cek = $this->ModelAuth->login($email, $password);

			if($cek){
				session()->set('log',true);
				session()->set('id_user',$cek['id_user']);
				session()->set('username',$cek['username']);
				session()->set('email',$cek['email']);
				session()->set('password',$cek['password']);
				session()->set('id_profil',$cek['id_profil']);

				return redirect()->to(base_url('home'));
				
			}else{
				session()->setFlashdata('error', 'Login Gagal');
        return redirect()->to(base_url('auth'));
			}
		}else{
			$errors = \Config\Services::validation();
			return redirect()->to(base_url('auth'))->withInput()->with('errors', $errors);
		}
	}

	public function logout(){
    session()->remove('log');
    session()->remove('username');
    session()->remove('email');
    session()->remove('password');
    session()->setFlashdata('pesanSukses', 'Logout Sukses');
    return redirect()->to(base_url('auth'));
  }

	

}
