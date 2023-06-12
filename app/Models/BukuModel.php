<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slugh', 'pengarang', 'penerbit', 'sampul', 'tahun', 'jumlah', 'rak'];


    public function getBuku($slugh = false)
    {
        if ($slugh == false) {
            return $this->findAll();
        }

        return $this->where(['slugh' => $slugh])->first();
    }
}
