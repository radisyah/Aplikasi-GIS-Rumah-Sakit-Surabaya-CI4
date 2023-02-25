<?php namespace App\Controllers;
use App\Models\ModelRumkit;

class allUser extends BaseController
{

	public function __construct() {
		$this->ModelRumkit = new ModelRumkit();
	}

	public function index()
	{
		$data = array(
			'title' => 'Data Rumah Sakit Surabaya',
			'nav' => 'Home',
			'rumkit' => $this->ModelRumkit->all_data(),
			'isi' => 'user/v_home',
		);	
		return view('layoutUser/v_wrapper',$data);
	}

	public function lokasi()
	{
		$data = array(
			'title' => 'Lokasi Rumah Sakit Surabaya',
			'nav' => 'Lokasi',
			'rumkit' => $this->ModelRumkit->all_data(),
			'isi' => 'user/v_lokasi',
		);	
		return view('layoutUser/v_wrapper',$data);
	}

	

}
