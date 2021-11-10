<?php

namespace App\Controllers;
use App\Models\KegiatanModel;

use App\Controllers\BaseController;

class Kegiatan extends BaseController
{
	protected $kegiatan;

    function __construct()
    {
        $this->kegiatan = new KegiatanModel(  );
    }

	public function index()
	{
		
		$kegiatan = new KegiatanModel();
        $data['kegiatan'] = $kegiatan->paginate(2, 'kegiatan');
        $data['pager'] = $kegiatan->pager;
        $data['nomor'] = nomor($this->request->getVar('page_kegiatan'), 2);
        return view('admin/kegiatan', $data);
	}

    
	public function create()
	{
		return view('admin/c_kegiatan');
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
			'video' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
                
			'deskripsi' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
		$this->kegiatan->insert([
            'nama' => $this->request->getVar('nama'),
            'video' => $this->request->getVar('video'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);
        session()->setFlashdata('message', 'Kegiatan Berhasil di Upload');
        return redirect()->to('/kegiatan');

	}
	function k_edit($id)
    {
        $dataKegiatan = $this->kegiatan->find($id);
        if (empty($dataKegiatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kegiatan Tidak ditemukan !');
        }
        $data['kegiatan'] = $dataKegiatan;
        return view('admin/k_edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'video' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
 
        $this->kegiatan->update($id, [
            'nama' => $this->request->getVar('nama'),
            'video' => $this->request->getVar('video'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);
        session()->setFlashdata('message', 'Update Data Kegiatan Berhasil');
        return redirect()->to('/kegiatan');
    }
    
    function delete($id)
    {
        $dataKegiatan = $this->kegiatan->find($id);
        if (empty($dataKegiatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kegiatan Tidak ditemukan !');
        }
        $this->kegiatan->delete($id);
        session()->setFlashdata('message', 'Delete Data Kegiatan Berhasil');
        return redirect()->to('/kegiatan');
    }
}
 
