<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class Profile extends BaseController
{

    public function index()
    {
        // Mendapatkan semua data users
        $model = new UserModel();
        $data = [
            'title' => 'Home | Dashboard Admin',
            'user' => $model->findAll(),
        ];
        // Menampilkan view dengan data users
        return view('admin/profile', $data);
    }

    public function edit($id)
    {
        // Mendapatkan data user berdasarkan ID
        $model = new UserModel();

        $data = [
            'title' => 'Home | Dashboard Admin',
            'user' => $model->find($id),
        ];


        // Tampilkan form edit dengan data pengguna
        return view('admin/profile', $data);
    }

    public function update($id)
    {
        // Mendapatkan data user berdasarkan ID
        $model = new UserModel();
        $user = $model->find($id);
        // Validasi input
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'The {field} already exists.',
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'The {field} already exists.',
                ],
            ],
            'fav' => [
                'label' => 'fav',
                'rules' => 'required',
            ],
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['user'] = $user;
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'fav' => $this->request->getPost('fav'),
        ];

        $model->update($id, $data);
        session()->setFlashdata('pesan', ' Data Berhasil Di Update');
        return redirect()->to('/admin/dataBuku/listBuku');
    }
}
