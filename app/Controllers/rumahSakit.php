<?php namespace App\Controllers;
use App\Models\ModelRumkit;

class rumahSakit extends BaseController
{

	public function __construct() {
		helper('form');
		$this->ModelRumkit = new ModelRumkit();
	}

	public function index()
	{
		$data = array(
			'title' => 'Data Rumah Sakit Surabaya',
			'rumkit' => $this->ModelRumkit->all_data(),
			'isi' => 'rumkit/v_rumahSakit',
		);	
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{
		$data = array(
			'title' => 'Add Data Rumah Sakit Surabaya',
			'isi' => 'rumkit/v_add',
			'errors' => \Config\Services::validation()
		);	
		return view('layout/v_wrapper',$data);
	}

	public function save_add()
  {
    if (!$this->validate([
      'nama_rumkit'=>[
        'label' => 'Nama RS',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
			],
			'alamat'=>[
				'label' => 'Alamat RS',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong'
					]
			],
			'no_telpon'=>[
			'label' => 'No Telp RS',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} Tidak Boleh Kosong'
				]
			],
			'latitude'=>[
			'label' => 'lat',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} Tidak Boleh Kosong'
				]
			],
			'longtitude'=>[
			'label' => 'long',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} Tidak Boleh Kosong'
				]
			],
			'deskripsi'=>[
			'label' => 'deskripsi',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} Tidak Boleh Kosong'
				]
			],
			'foto' => [
			'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto, 2048]',
			'errors' => [
				'uploaded' => 'Harus Ada File yang diupload',
				'max_size' => 'Ukuran File Maksimal 2 MB',
				'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png | Ukuran Maks 2mb',
				]
			]
    ])) {
			session()->setFlashdata('errors', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}else{
			$dataBerkas = $this->request->getFile('foto');
			$fileName = $dataBerkas->getRandomName();
			$data = array(
				'nama_rumkit' => $this->request->getPost('nama_rumkit'),
				'alamat' => $this->request->getPost('alamat'),
				'no_telpon' => $this->request->getPost('no_telpon'),
				'deskripsi' => $this->request->getPost('deskripsi'),
				'latitude' => $this->request->getPost('latitude'),
				'longtitude' => $this->request->getPost('longtitude'),
				'foto' => $fileName,
			);
			$dataBerkas->move('img/', $fileName);
			$this->ModelRumkit->add($data);
			session()->setFlashdata('pesanSukses', 'Data Berhasil Ditambah');
      return redirect()->to(base_url('rumahSakit')); 
		}
  }

	public function edit($id_rumkit)
	{
		$data = array(
			'title' => 'Edit Data Rumah Sakit Surabaya',
			'detail' => $this->ModelRumkit->detail_data($id_rumkit),
			'isi' => 'rumkit/v_edit',
		);	
		return view('layout/v_wrapper',$data);
	}

	public function save_edit($id_rumkit)
  {
    if (!$this->validate([
      'nama_rumkit'=>[
        'label' => 'Nama RS',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
			],
			'alamat'=>[
				'label' => 'Alamat RS',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong'
					]
			],
			'no_telpon'=>[
			'label' => 'No Telp RS',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} Tidak Boleh Kosong'
				]
			],
			'latitude'=>[
			'label' => 'lat',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} Tidak Boleh Kosong'
				]
			],
			'longtitude'=>[
			'label' => 'long',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} Tidak Boleh Kosong'
				]
			],
			'deskripsi'=>[
			'label' => 'deskripsi',
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
			session()->setFlashdata('errors', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}else{
			$dataBerkas = $this->request->getFile('foto');
      if ($dataBerkas->getError()==4) {
        $data = array(
          'id_rumkit' => $id_rumkit,
					'nama_rumkit' => $this->request->getPost('nama_rumkit'),
					'alamat' => $this->request->getPost('alamat'),
					'no_telpon' => $this->request->getPost('no_telpon'),
					'deskripsi' => $this->request->getPost('deskripsi'),
					'latitude' => $this->request->getPost('latitude'),
					'longtitude' => $this->request->getPost('longtitude'),
        );
        $this->ModelRumkit->update_data($data);
      }else{
        $detail = $this->ModelRumkit->detail_data($id_rumkit);
        $fileName = $dataBerkas->getRandomName();
        $data = array(
          'id_rumkit' => $id_rumkit,
					'nama_rumkit' => $this->request->getPost('nama_rumkit'),
					'alamat' => $this->request->getPost('alamat'),
					'no_telpon' => $this->request->getPost('no_telpon'),
					'deskripsi' => $this->request->getPost('deskripsi'),
					'latitude' => $this->request->getPost('latitude'),
					'longtitude' => $this->request->getPost('longtitude'),
          'foto' => $fileName,
        );
        $dataBerkas->move('img/', $fileName);
        $this->ModelRumkit->update_data($data);
      }
      session()->setFlashdata('pesanSukses', 'Data Berhasil Diupdate');
      return redirect()->to(base_url('rumahSakit')); 
		}
  }

	public function delete_data($id_rumkit){
    $data = array(
      'id_rumkit' => $id_rumkit,
    );
    $this->ModelRumkit->delete_data($data);
    session()->setFlashdata('pesanSukses','Data Berhasil Dihapus');
    return redirect()->to(base_url('rumahSakit'));
  }

	//--------------------------------------------------------------------

}
