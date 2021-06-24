<?php namespace App\Controllers;

class Page extends BaseController
{
	public function homee()
	{
		echo view("ambulance/homee");
	}public function galeri()
	{
		echo view("ambulance/galeri");
	}public function about()
	{
		echo view("ambulance/about");
	}public function layanan()
	{
		echo view("ambulance/layanan");
	}
	public function b_edit()
	{
		echo view("admin/b_edit");
	}
	public function c_crew()
	{
		echo view("c_crew");
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