<?php

namespace App\Controllers;

use App\Entities\User;

use App\Models\MemberModel;

class Member extends BaseController
{
    protected $memberModel;
    // pake protected biar bisa dipake dikelas ini dan class turununannya 
    public function __construct() // biar gak nulis banyak nulis new komik model jika ada beberapa method/function
    {
        $this->memberModel = new MemberModel();
    }

    public function listMember()
    {
        $data = [
            'title' => 'List Member | Dashboard Admin',
            'member' => $this->memberModel->getMember(),

        ];
        return view('admin/member/listMember', $data);
    }

    public function tambahMember()
    {
        $data = [
            'title' => 'Tambah Buku | Dashboard Admin',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/member/tambahMember', $data);
    }


    public function create()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'nis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->memberModel->insert(
                [
                    // $this->request->getVar();
                    'nama' =>  $this->request->getPost('nama'),
                    'nis' =>  $this->request->getPost('nis'),
                    'kelas' =>  $this->request->getPost('kelas'),
                    'jurusan' =>  $this->request->getPost('jurusan'),
                ]
            );

            session()->setFlashdata('pesan', ' Data Berhasil Ditambahkan');
            return redirect()->to('/member');
        } {
            // $k = $validation->listErrors();
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/member/tambah')->withInput($validation);
        }
    }
    public function edit($id)
    {
        // $buku = $this->bukuModel->getBuku($slugh);
        // if (!$buku) {
        //     // Tampilkan pesan atau lakukan penanganan lain jika buku tidak ditemukan
        //     throw new \Exception('Buku tidak ditemukan.');
        // }
        $member = $this->memberModel->find($id);

        if (!($member)) {
            return redirect()->to('/member')->with('error', 'Siswa not found');
        }
        $data = [
            'title' => 'Dashboard Ubah Data Member',
            'member' => $member,

        ];
        return view('admin/member/editMember', $data);
    }


    public function update($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'nis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                ]
            ],
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'nis' => $this->request->getPost('nis'),
                'kelas' => $this->request->getPost('kelas'),
                'jurusan' => $this->request->getPost('jurusan')
            ];
            $this->memberModel->update($id, $data);
            // set pesan
            session()->setFlashdata('pesan', ' Data Berhasil Dirubah');
            return redirect()->to('/member');
        } {
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/member/update/member.id')->withInput();
        }
    }

    public function delete($id)
    {
        $this->memberModel->delete($id); //Cara ini cara konvensional, bahayaaaa!
        session()->setFlashdata('pesan', 'Delete Data Berhasil');
        return redirect()->to('/member');
    }
}
