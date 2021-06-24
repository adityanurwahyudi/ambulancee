<?php

namespace App\Controllers;

use App\Models\BookingModel;

class Booking extends BaseController
{
    protected $booking;

    function __construct()
    {
        $this->booking = new BookingModel(  );
    }

    public function index()
    {
        $booking = new BookingModel();
        $data['booking'] = $booking->paginate(5, 'booking');
        $data['pager'] = $booking->pager;
        $data['nomor'] = nomor($this->request->getVar('page_booking'),5);
        return view('admin/booking', $data);
    }
    
    public function store()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'pesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
 
        $this->booking->insert([
            'nama' => $this->request->getVar('nama'),
            'telepon' => $this->request->getVar('telepon'),
            'tanggal' => $this->request->getVar('tanggal'),
            'kategori' => $this->request->getVar('kategori'),
            'pesan' => $this->request->getVar('pesan'),
            'alamat' => $this->request->getVar('alamat'),
            'status' => $this->request->getVar('status')
        ]);
        session()->setFlashdata('message', 'Booking Berhasil');
        return redirect()->to('/contact');
    }
    
    function b_edit($id)
    {
        $dataBooking = $this->booking->find($id);
        if (empty($dataBooking)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Booking Tidak ditemukan !');
        }
        $data['booking'] = $dataBooking;
        return view('admin/b_edit', $data);
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
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'pesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
 
        $this->booking->update($id, [
            'nama' => $this->request->getVar('nama'),
            'telepon' => $this->request->getVar('telepon'),
            'tanggal' => $this->request->getVar('tanggal'),
            'kategori' => $this->request->getVar('kategori'),
            'pesan' => $this->request->getVar('pesan'),
            'alamat' => $this->request->getVar('alamat'),
            'status' => $this->request->getVar('status')
        
        ]);
        session()->setFlashdata('message', 'Update Data Booking Berhasil');
        return redirect()->to('/booking');
    }
    function delete($id)
    {
        $dataBooking = $this->booking->find($id);
        if (empty($dataBooking)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Booking Tidak ditemukan !');
        }
        $this->booking->delete($id);
        session()->setFlashdata('message', 'Delete Data Booking Berhasil');
        return redirect()->to('/booking');
    }
}