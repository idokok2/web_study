<?php
namespace App\Models;

class ContactModel extends BaseModel
{
    public function insertContact(array $data)
    {
        $this->db->setDatabase('fittrix');
        $this->db->table('tb_contact')->insert($data);

        $this->db->setDatabase('fittrix_homepage');
        return $this->db->table('t_contact')->insert($data);
    }
}