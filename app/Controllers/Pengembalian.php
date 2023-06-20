<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;

class Pengembalian extends BaseController
{
    protected $peminjamanModel;
    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
    }

    public function listPengembalian()
    {
        $data = [
            'title' => 'Data Pengembalian | Dashboard Admin',
            'peminjaman' => $this->peminjamanModel->getPeminjaman(),
            'pengembalian' => $this->peminjamanModel->getStatus(),


        ];
        return view('admin/pengembalian/listPengembalian', $data);
    }
}
