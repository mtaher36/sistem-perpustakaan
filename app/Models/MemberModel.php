<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    protected $useTimestamps = true;
    protected $primaryKey     = 'id';
    protected $allowedFields = ['nama', 'nis', 'kelas', 'jurusan'];


    public function getMember($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function getMemberName($id)
    {
        $member = $this->find($id);

        if ($member) {
            return $member['nama'];
        } else {
            return null;
        }
    }
}
