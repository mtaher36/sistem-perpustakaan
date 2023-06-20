<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey  = 'id_booking';
    protected $allowedFields = ['id_booking', 'id_member', 'judul_buku', 'sampul', 'tgl_pinjam', 'tgl_kembali', 'tgl_dikembalikan', 'status'];


    public function getPeminjaman($id_booking = false)
    {
        if ($id_booking == false) {
            return $this->findAll();
        }

        return $this->where(['id_booking' => $id_booking])->first();
    }

    public function getStatus()
    {
        return $this->where('status', 'Kembali')->findAll();
    }
}
