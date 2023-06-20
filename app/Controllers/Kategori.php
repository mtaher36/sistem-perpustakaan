<?php

namespace App\Controllers;



use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;
    // pake protected biar bisa dipake dikelas ini dan class turununannya 
    public function __construct() // biar gak nulis banyak nulis new komik model jika ada beberapa method/function
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function listKategori()
    {

        $data = [
            'title' => 'List Kategori | Dashboard Admin',
            'kategori' => $this->kategoriModel->getKategori(),

        ];
        return view('admin/kategori/listKategori', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kategori' => [
                'rules' => 'required|is_unique[kategori.kategori]',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi',
                    'is_unique' => 'Gabole Sama Judulnya dong'
                ]
            ],
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->kategoriModel->save(
                [
                    // $this->request->getVar();
                    'kategori' =>  $this->request->getPost('kategori'),
                ]
            );

            session()->setFlashdata('pesan', ' Data Berhasil Ditambahkan');
            return redirect()->to('/kategori');
        } {
            // $k = $validation->listErrors();
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/kategori/create')->withInput($validation);
        }
    }
    public function delete($id)
    {
        if (!$this->kategoriModel->find($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Member not found');
        }

        $this->kategoriModel->delete($id); //Cara ini cara konvensional, bahayaaaa!
        session()->setFlashdata('pesan', 'Delete Data Berhasil');
        return redirect()->to('/kategori');
    }
}
