<?php

namespace App\Controllers;
use App\Models\LayananModel;


class Home extends BaseController
{
	protected $layanan;

    function __construct()
    {
        $this->layanan = new LayananModel(  );
    }

	public function layanan()
	{
		
		$data['layanan'] = $this->layanan->findAll();
            return view('ambulance/layanan', $data);
	}


	public function index()
	{
		return view('home');
	}
}
