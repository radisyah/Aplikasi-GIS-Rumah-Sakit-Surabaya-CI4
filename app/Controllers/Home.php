<?php namespace App\Controllers;
use App\Models\ModelRumkit;


class Home extends BaseController
{

	public function __construct()
  {
		$this->ModelRumkit = new ModelRumkit();
    helper('form');
	}

	public function index()
	{
		$data = array(
			'title' => 'Pemetaan Rumah Sakit Surabaya',
			'isi' => 'v_home',
			'rumkit' => $this->ModelRumkit->all_data(),
		);	
		return view('layout/v_wrapper',$data);
	}

	

}
