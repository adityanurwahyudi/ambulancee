<?php

namespace App\Controllers;
use App\Models\LayananModel;

use App\Controllers\BaseController;

class Layanan extends BaseController
{
	protected $layanan;

    function __construct()
    {
        $this->layanan = new LayananModel(  );
    }
	public function index()
	{ 
		$layanan = new LayananModel();
        $data['layanan'] = $layanan->paginate(5, 'layanan');
        $data['pager'] = $layanan->pager;
        $data['nomor'] = nomor($this->request->getVar('page_layanan'), 5);
        return view('admin/layanann', $data);
	}

	public function create()
	{
		return view('admin/c_layanan');
	}
    public function save()
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
                ],
                'desc' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
 
			$layanan = new LayananModel();
			$dataLayanan = $this->request->getFile('gambar');
			$fileName = $dataLayanan->getRandomName();
			$layanan->insert([
				'nama' => $this->request->getPost('nama'),
				'gambar' => $fileName,
				'desc' => $this->request->getPost('desc')
			]);
		$dataLayanan->move('uploads/layanan/', $fileName);
		session()->setFlashdata('success', 'Layanan Berhasil diupload');
		return redirect()->to(base_url('layanann'));
	}
	function l_edit($id)
    {
        $dataLayanan = $this->layanan->find($id);
        if (empty($dataLayanan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Layanan Tidak ditemukan !');
        }
        $data['layanan'] = $dataLayanan;
        return view('admin/l_edit', $data);
    }
    public function edit(){
        $id = $this->request->getPost('id'); //ini name input 
		
        $nama = $this->request->getPost('nama');
        $dataBerkas = $this->request->getFile('gambar');
        $desc = $this->request->getPost('desc');
        $fileName = $dataBerkas->getRandomName();
        $dataBerkas->move('uploads/layanan/', $fileName);

        $this->layanan->set('nama', $nama);
        $this->layanan->set('gambar', $fileName);
        $this->layanan->set('desc', $desc);
        $this->layanan->where('id_layanan', $id);
        $this->layanan->update();
        session()->setFlashdata('success', 'Layanan Berhasil diupdate');
		return redirect()->to(base_url('layanann'));    
    }
	function delete($id)
    {
        $dataLayanan = $this->layanan->find($id);
        if (empty($dataLayanan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Layanan Tidak ditemukan !');
        }
        $this->layanan->delete($id);
        session()->setFlashdata('message', 'Delete Data Layanan Berhasil');
        return redirect()->to('/layanann');
    }
 

 
}