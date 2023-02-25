<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelProfil;


class Profil extends BaseController
{

	public function __construct()
  {
    helper('form');
    $this->ModelProfil = new ModelProfil();
    $this->ModelUser = new ModelUser();
	}


	public function edit($id_profil)
  {
    $data = array(
			'title' => 'Edit Profil',
      'profil' => $this->ModelProfil->detail_data($id_profil),
			'isi' => 'v_editProfil',
		);
		return view('layout/v_wrapper', $data);
  }

	public function save_edit($id_profil)
  {
    if (!$this->validate([
      'nama'=>[
        'label' => 'Nama',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
				'no_telp'=>[
				'label' => 'No Telepon',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong'
					]
				],
        'foto' => [
          'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto, 2048]',
          'errors' => [
            'max_size' => 'Ukuran File Maksimal 2 MB',
            'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png | Ukuran Maks 2mb',
          ]
  
        ]
    ])) {
			$errors = \Config\Services::validation();
      session()->setFlashdata('error', $this->validator->listErrors());      
      return redirect()->to(base_url('profil/edit/'.$id_profil)); 
		}else{
      $dataBerkas = $this->request->getFile('foto');
      if ($dataBerkas->getError()==4) {
        $data = array(
          'id_profil' => $id_profil,
          'nama' => $this->request->getPost('nama'),
          'no_telp' => $this->request->getPost('no_telp'),
        );
        $this->ModelProfil->update_data($data);
      }else{
        $profil = $this->ModelProfil->detail_data($id_profil);
        $fileName = $dataBerkas->getRandomName();
        $data = array(
          'id_profil' => $id_profil,
          'nama' => $this->request->getPost('nama'),
          'no_telp' => $this->request->getPost('no_telp'),
          'foto' => $fileName,
        );
        $dataBerkas->move('img/', $fileName);
        $this->ModelProfil->update_data($data);
      }
      session()->setFlashdata('pesanSukses', 'Data Berhasil Diupdate');
      return redirect()->to(base_url('profil/edit/'.$id_profil)); 
		}
  }



	//--------------------------------------------------------------------

}
