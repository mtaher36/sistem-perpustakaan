<?php

namespace App\Controllers;

use App\Entities\User;

use App\Models\PeminjamanModel;
use App\Models\MemberModel;
use App\Models\BukuModel;

class Peminjaman extends BaseController
{
    protected $peminjamanModel;
    protected $memberModel;
    protected $bukuModel;


    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->memberModel = new MemberModel();
        $this->bukuModel = new BukuModel();
    }

    public function listPeminjaman()
    {
        $data = [
            'title' => 'List Peminjaman | Dashboard Admin',
            'peminjaman' => $this->peminjamanModel->getPeminjaman(),
            'member' => $this->memberModel->getMember(),

        ];
        return view('admin/peminjaman/listPeminjaman', $data);
    }


    public function tambahPeminjaman()
    {
        $data = [
            'title' => 'Tambah Peminjaman | Dashboard Admin',
            'validation' => \Config\Services::validation(),
            'member' => $this->memberModel->getMember(),
            'buku' => $this->bukuModel->getBuku(),
        ];
        return view('admin/peminjaman/tambahPeminjaman', $data);
    }

    public function getMemberName($id)
    {
        $this->memberModel = new MemberModel();
        $namaMember = $this->memberModel->getMemberName($id);

        if ($namaMember !== null) {
            echo $namaMember;
        } else {
            echo '';
        }
    }

    public function create()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_member' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'judul_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'tgl_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'tgl_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],

        ]);
        // $judulBuku = $this->request->getPost('judul_buku');
        // $sampulBuku = $this->bukuModel->getSampul($judulBuku);
        // var_dump($sampulBuku);


        // var_dump($this->request->getPost());
        $isDataValid = $validation->withRequest($this->request)->run();
        // var_dump($isDataValid);

        if ($isDataValid) {
            $judulBuku = $this->request->getPost('judul_buku');
            $sampulBuku = $this->bukuModel->getSampul($judulBuku);
            $this->peminjamanModel->insert(
                [
                    // $this->request->getVar();
                    'id_member' =>  $this->request->getPost('id_member'),
                    'id_booking' =>  $this->request->getPost('id_booking'),
                    'judul_buku' =>  $this->request->getPost('judul_buku'),
                    'sampul' =>  $sampulBuku,
                    'tgl_pinjam' =>  $this->request->getPost('tgl_pinjam'),
                    'tgl_kembali' =>  $this->request->getPost('tgl_kembali'),
                    'status' =>  $this->request->getPost('status'),
                ]
            );

            session()->setFlashdata('pesan', ' Data Berhasil Ditambahkan');
            return redirect()->to('/peminjaman');
        } {
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/peminjaman/tambah')->withInput($validation);
        }
    }
    public function edit($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);

        if (!($peminjaman)) {
            return redirect()->to('/peminjaman')->with('error', 'Data Peminjaman not found');
        }
        $data = [
            'title' => 'Dashboard Ubah Data Peminjaman',
            'peminjaman' => $peminjaman,
            'member' => $this->memberModel->getMember(),
            'buku' => $this->bukuModel->getBuku(),

        ];
        return view('admin/peminjaman/editPeminjaman', $data);
    }

    public function update($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tgl_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'tgl_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $judulBuku = $this->request->getPost('judul_buku');
            $sampulBuku = $this->bukuModel->getSampul($judulBuku);
            $data = [
                'id_member' =>  $this->request->getPost('id_member'),
                'id_booking' =>  $this->request->getPost('id_booking'),
                'judul_buku' =>  $this->request->getPost('judul_buku'),
                'sampul'     =>  $sampulBuku,
                'tgl_pinjam' =>  $this->request->getPost('tgl_pinjam'),
                'tgl_kembali' =>  $this->request->getPost('tgl_kembali'),
            ];
            $this->peminjamanModel->update($id, $data);
            // set pesan
            session()->setFlashdata('pesan', ' Data Berhasil Dirubah');
            return redirect()->to('/peminjaman');
        } {
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/peminjaman/edit/peminjaman.id_booking')->withInput();
        }
    }

    public function delete($id)
    {
        $this->peminjamanModel->delete($id); //Cara ini cara konvensional, bahayaaaa!
        session()->setFlashdata('pesan', 'Delete Data Berhasil');
        return redirect()->to('/peminjaman');
    }

    public function editStatusForm($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);

        if (!($peminjaman)) {
            return redirect()->to('/peminjaman')->with('error', 'Data Peminjaman not found');
        }
        $data = [
            'title' => 'Dashboard Ubah Data Peminjaman',
            'peminjaman' => $peminjaman,
            'member' => $this->memberModel->getMember(),
            'buku' => $this->bukuModel->getBuku(),

        ];
        return view('admin/peminjaman/editStatus', $data);
    }

    public function updateStatus($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'tgl_dikembalikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],

        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = [
                'status' =>  $this->request->getPost('status'),
                'tgl_dikembalikan' =>  $this->request->getPost('tgl_dikembalikan'),
            ];
            $this->peminjamanModel->update($id, $data);
            // set pesan
            session()->setFlashdata('pesan', ' Data Berhasil Dirubah');
            return redirect()->to('/peminjaman');
        } {
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/peminjaman/listPeminjaman/peminjaman.id_booking')->withInput();
        }
    }
}
