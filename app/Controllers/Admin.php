<?php

namespace App\Controllers;


use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\MemberModel;

class Admin extends BaseController
{
    protected $bukuModel;
    protected $kategoriModel;
    protected $memberModel;
    // pake protected biar bisa dipake dikelas ini dan class turununannya 
    public function __construct() // biar gak nulis banyak nulis new komik model jika ada beberapa method/function
    {
        $this->bukuModel = new BukuModel();
        $this->kategoriModel = new KategoriModel();
        $this->memberModel = new MemberModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Home | Dashboard Admin',
            'buku' => $this->bukuModel->getBuku(),
            'member' => $this->memberModel->getMember(),
            'kategori' => $this->kategoriModel->getKategori()
        ];
        return view('admin/home', $data);
    }

    public function listBuku()
    {
        $data = [
            'title' => 'List Buku | Dashboard Admin',
            'buku' => $this->bukuModel->getBuku(),
            'kategori' => $this->kategoriModel->getKategori(),

        ];
        return view('admin/dataBuku/listBuku', $data);
    }

    public function tambahBuku()
    {
        $data = [
            'title' => 'Tambah Member | Dashboard Admin',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategoriModel->getKategori(),
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
                    'is_unique' => 'Gabole Sama Judulnya sayang'
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
            $fileSampul->move('img/cover', $namaSampul);
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
                    'kategori' =>  $this->request->getPost('kategori'),
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
        $buku = $this->bukuModel->find($id);
        if ($buku['sampul'] != 'default.jpg') {
            // hapus gambar
            $gambarPath = FCPATH . 'img\cover/' . $buku['sampul'];
            unlink($gambarPath);
        }
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
            'kategori' => $this->kategoriModel->getKategori(),


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
            'kategori' => [
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
            $fileSampul->move('img/cover', $namaSampul);
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
                    'kategori' =>  $this->request->getPost('kategori'),
                    'tahun' =>  $this->request->getPost('tahun'),
                    'jumlah' =>  $this->request->getPost('jumlah'),
                    'rak' =>  $this->request->getPost('rak'),
                    'sampul' =>  $namaSampul,

                ]
            );
            session()->setFlashdata('pesan', ' Data Berhasil Dirubah');
            return redirect()->to('/admin/dataBuku/listBuku');
        } else {
            session()->setFlashdata('error', $validation->listErrors());
            // return redirect()->to('/admin/dataBuku/editBuku/' . $id)->withInput();
            return redirect()->to('/admin/dataBuku/editBuku/' . $bukuLama['slugh'])->withInput();
        }
    }

    public function indexProfile()
    {
        $data = [
            'title' => 'Profile Saya | Dashboard Admin',
        ];
        return view('admin/profile', $data);
    }
}
