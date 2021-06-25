<?php

namespace App\Controllers;
use App\Models\CrewModel;

use App\Controllers\BaseController;

class Crew extends BaseController
{
	protected $crew;

    function __construct()
    {
        $this->crew = new CrewModel(  );
    }

	public function index()
	{
		
		$crew = new CrewModel();
        $data['crew'] = $crew->paginate(2, 'crew');
        $data['pager'] = $crew->pager;
        $data['nomor'] = nomor($this->request->getVar('page_crew'), 2);
        return view('admin/crew', $data);
	}

	public function create()
	{
		return view('admin/c_crew');
	}
	public function save()
	{
		if (!$this->validate(
			[
			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
			'gambar' => [
				'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
 
		$crew = new CrewModel();
		$dataCrew = $this->request->getFile('gambar');
		$fileName = $dataCrew->getRandomName();
		$crew->insert([
			'gambar' => $fileName,
			'nama' => $this->request->getPost('nama')
		]);
		$dataCrew->move('uploads/crew/', $fileName);
		session()->setFlashdata('success', 'gambar Berhasil diupload');
		return redirect()->to(base_url('crew'));
	}
	function c_edit($id)
    {
        $dataCrew = $this->crew->find($id);
        if (empty($dataCrew)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Crew Tidak ditemukan !');
        }
        $data['crew'] = $dataCrew;
        return view('admin/c_edit', $data);
    }
	
	public function update($id)
    {
        if (!$this->validate([
    		'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
				],
				'gambar' => [
				'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
 
			]
	
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
		$crew = new CrewModel();
		$dataCrew = $this->request->getFile('gambar');
		$fileName = $dataCrew->getRandomName();
		$this->crew->update([
			'gambar' => $fileName,
			'nama' => $this->request->getVar('nama')
		]);
		$dataCrew->move('uploads/crew/', $fileName);
        session()->setFlashdata('message', 'Update Data Booking Berhasil');
        return redirect()->to('/crew');	
	}


		function delete($id)
    {
        $dataCrew = $this->crew->find($id);
        if (empty($dataCrew)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Crew Tidak ditemukan !');
        }
        $this->crew->delete($id);
        session()->setFlashdata('message', 'Delete Data Crew Berhasil');
        return redirect()->to('/crew');
    }
 
}