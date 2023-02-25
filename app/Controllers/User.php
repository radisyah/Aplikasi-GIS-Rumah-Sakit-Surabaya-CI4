<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelProfil;


class User extends BaseController
{

	public function __construct()
  {
    helper('form');
    $this->ModelProfil = new ModelProfil();
    $this->ModelUser = new ModelUser();
	}

	public function index()
	{
		$data = array(
			'title' => 'Data User',
			'profil' => $this->ModelUser->all_data(),
			'errors' => \Config\Services::validation(),
			'isi' => 'v_user',
		);	
		return view('layout/v_wrapper',$data);
	}

	public function edit($id_user)
  {
    $data = array(
			'title' => 'Edit User',
      'profil' => $this->ModelProfil->all_data(),
			'user' => $this->ModelUser->detail_data($id_user),
			'isi' => 'v_edit',
			'errors' => \Config\Services::validation()
		);
		return view('layout/v_wrapper', $data);
  }

	public function save_edit($id_user)
  {
    if (!$this->validate([
      'username'=>[
        'label' => 'Nama',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
				'email'=>[
				'label' => 'No Telepon',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong'
					]
				],
				'password'=>[
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong'
					]
				],
    ])) {
			$errors = \Config\Services::validation();
      return redirect()->to(base_url('user/edit/'.$id_user))->withInput()->with('errors', $errors);
		}else{
			$data = array(
				'id_user' => $id_user,
        'username' => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
        'password' => $this->request->getPost('password'),
      );
      $this->ModelUser->update_data($data);
      session()->setFlashdata('pesanSukses', 'Data Berhasil Diupdate');
      return redirect()->to(base_url('user/edit/'.$id_user)); 
		}
  }



	//--------------------------------------------------------------------

}
