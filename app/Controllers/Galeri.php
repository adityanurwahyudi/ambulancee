<?php

namespace App\Controllers;
use App\Models\GaleriModel;

use App\Controllers\BaseController;

class Galeri extends BaseController
{
	protected $galeri;

    function __construct()
    {
        $this->galeri = new GaleriModel(  );
    }

	public function index()
	{
		
		$galeri = new GaleriModel();
        $data['galeri'] = $galeri->paginate(5, 'galeri');
        $data['pager'] = $galeri->pager;
        $data['nomor'] = nomor($this->request->getVar('page_galeri'), 5);
        return view('admin/galeri', $data);
	}

	public function create()
	{
		return view('admin/c_galeri');
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
 
                ],
			'deskripsi' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
 
		$galeri = new GaleriModel();
		$dataGaleri = $this->request->getFile('gambar');
		$fileName = $dataGaleri->getRandomName();
		$galeri->insert([
			'gambar' => $fileName,
			'nama' => $this->request->getPost('nama'),
			'deskripsi' => $this->request->getPost('deskripsi')
		]);
		$dataGaleri->move('uploads/galeri/', $fileName);
		session()->setFlashdata('success', 'gambar Berhasil diupload');
		return redirect()->to(base_url('galeri'));
	}
	function g_edit($id)
    {
        $dataCrew = $this->galeri->find($id);
        if (empty($dataCrew)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Galeri Tidak ditemukan !');
        }
        $data['galeri'] = $dataCrew;
        return view('admin/g_edit', $data);
    }
    public function edit(){
        $id = $this->request->getPost('id'); //ini name input 
		
        $nama = $this->request->getPost('nama');
        $deskripsi = $this->request->getPost('deskripsi');
        $dataBerkas = $this->request->getFile('gambar');
        $fileName = $dataBerkas->getRandomName();
        $dataBerkas->move('uploads/galeri/', $fileName);

        $this->galeri->set('nama', $nama);
        $this->galeri->set('deskripsi', $deskripsi);
        $this->galeri->set('gambar', $fileName);
        $this->galeri->where('id_galeri', $id);
        $this->galeri->update();
        session()->setFlashdata('success', 'Galeri Berhasil diupdate');
		return redirect()->to(base_url('galeri'));    
    }
		function delete($id)
    {
        $dataGaleri = $this->galeri->find($id);
        if (empty($dataGaleri)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Galeri Tidak ditemukan !');
        }
        $this->galeri->delete($id);
        session()->setFlashdata('message', 'Delete Data Galeri Berhasil');
        return redirect()->to('/galeri');
    }
 
}