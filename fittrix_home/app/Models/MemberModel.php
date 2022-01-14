<?php
namespace App\Models;

class MemberModel extends BaseModel
{
    public function getAdminInfo(string $adminId)
    {
        $builder = $this->builder('admin');
        $builder->where('f_admin_id', $adminId);

        return $builder->get();
    }
}