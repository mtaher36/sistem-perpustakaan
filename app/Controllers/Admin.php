<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Admin extends BaseController
{
    protected $bukuModel; // pake protected biar bisa dipake dikelas ini dan class turununannya 
    public function __construct() // biar gak nulis banyak nulis new komik model jika ada beberapa method/function
    {
        $this->bukuModel = new BukuModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home | Dashboard Admin',
        ];
        return view('admin/home', $data);
    }

    public function listBuku()
    {
        $data = [
            'title' => 'List Buku | Dashboard Admin',
            'buku' => $this->bukuModel->getBuku()
        ];
        return view('admin/dataBuku/listBuku', $data);
    }

    public function tambahBuku()
    {
        $data = [
            'title' => 'Tambah Buku | Dashboard Admin',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/dataBuku/tambahBuku', $data);
    }


    public function save()
    {
        // validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'is_unique' => 'Gabole Sama Judulnya babi'
                ]
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'rak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'sampul' => [
                'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'jangan gede gede',
                    'is_image' => 'yang anda pilih bkn gambar asw',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // // ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // ngambil gambar default
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // ambil nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindah gambar ke img
            $fileSampul->move('img', $namaSampul);
        }
        // jika data valid, simpan ke database

        // var_dump($isDataValid);
        // var_dump($this->request->getPost());
        // var_dump($validation->getErrors());

        // var_dump($this->request->getFile('sampul'));

        if ($isDataValid) {

            $slugh = url_title($this->request->getVar('judul'), '-', true);
            $this->bukuModel->insert(
                [
                    // $this->request->getVar();
                    'judul' =>  $this->request->getPost('judul'),
                    'slugh' =>  $slugh,
                    'pengarang' =>  $this->request->getPost('pengarang'),
                    'penerbit' =>  $this->request->getPost('penerbit'),
                    'tahun' =>  $this->request->getPost('tahun'),
                    'jumlah' =>  $this->request->getPost('jumlah'),
                    'rak' =>  $this->request->getPost('rak'),
                    'sampul' =>  $namaSampul,

                ]
            );

            // Handle file upload

            session()->setFlashdata('pesan', ' Data Berhasil Ditambahkan');
            return redirect()->to('/admin/dataBuku/listBuku');
        } {
            // $k = $validation->listErrors();
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/admin/dataBuku/tambahBuku')->withInput($validation);
        }
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id); //Cara ini cara konvensional, bahayaaaa!
        session()->setFlashdata('pesan', 'Delete Data Berhasil');
        return redirect()->to('/admin/dataBuku/listBuku');
    }

    public function edit($slugh)
    {
        // $buku = $this->bukuModel->getBuku($slugh);
        // if (!$buku) {
        //     // Tampilkan pesan atau lakukan penanganan lain jika buku tidak ditemukan
        //     throw new \Exception('Buku tidak ditemukan.');
        // }
        $data = [
            'title' => 'Dashboard Ubah Data Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($slugh),

        ];
        return view('admin/dataBuku/editBuku', $data);
    }

    public function update($id)
    {
        // cek judul
        $bukuLama = $this->bukuModel->getBuku($this->request->getPost('slugh'));
        if ($bukuLama['judul'] == $this->request->getPost('slugh')) {
            $role_judul = 'required';
        } else {
            $role_judul = 'required|is_unique[buku.judul]';
        }
        // validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'rules' => $role_judul,
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'is_unique' => 'Gabole Sama Judulnya babi'
                ]
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'rak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'sampul' => [
                'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'jangan gede gede',
                    'is_image' => 'yang anda pilih bkn gambar asw',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // // ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // ngambil gambar default
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // ambil nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindah gambar ke img
            $fileSampul->move('img', $namaSampul);
        }
        if ($isDataValid) {

            $slugh = url_title($this->request->getVar('judul'), '-', true);
            $this->bukuModel->save(
                [
                    'id' => $id,
                    'judul' =>  $this->request->getPost('judul'),
                    'slugh' =>  $slugh,
                    'pengarang' =>  $this->request->getPost('pengarang'),
                    'penerbit' =>  $this->request->getPost('penerbit'),
                    'tahun' =>  $this->request->getPost('tahun'),
                    'jumlah' =>  $this->request->getPost('jumlah'),
                    'rak' =>  $this->request->getPost('rak'),
                    'sampul' =>  $namaSampul,

                ]
            );
            session()->setFlashdata('pesan', ' Data Berhasil Dirubah');
            return redirect()->to('/admin/dataBuku/listBuku');
        } {
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/admin/dataBuku/editBuku/buku.slugh ?>')->withInput();
        }
    }
}
