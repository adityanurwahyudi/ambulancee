<?php namespace App\Controllers;
use App\Models\CrewwModel;
use App\Models\LayananModel;
use App\Models\KegiatanModel;
use App\Models\GaleriModel;

class Page extends BaseController
{
	protected $crew;
	protected $layanan;
	protected $galeri;

    function __construct()
    {
        $this->crew = new CrewwModel(  );
		$this->layanan = new LayananModel(  );
		$this->kegiatan = new KegiatanModel(  );
		$this->galeri = new GaleriModel(  );
    }
	
	public function homee()
	{
		$data['crew'] = $this->crew->findAll();
                $data['layanan'] = $this->layanan->findAll();
            return view('ambulance/homee', $data);
	}
	public function galerii()
	{
		
		$data['galeri'] = $this->galeri->findAll();
		$data['kegiatan'] = $this->kegiatan->findAll();
		echo view("ambulance/galerii", $data);
	}
	public function about()
	{
		$data['crew'] = $this->crew->findAll();
            return view('ambulance/about', $data);
	}
	public function b_edit()
	{
		echo view("admin/b_edit");
	}
	public function c_crew()
	{
		echo view("c_crew");
	}	
	public function c_galeri()
	{
		echo view("c_galeri");
	}	
	public function c_kegaitan()
	{
		echo view("c_kegiatan");
	}	
	public function c_layanan()
	{
		echo view("admin/c_layanan");
	}	
	public function e_layanan()
	{
		echo view("admin/e_layanan");
	}	
	
}