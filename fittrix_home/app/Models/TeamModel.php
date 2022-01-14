<?php
namespace App\Models;

class TeamModel extends BaseModel
{
    public function getList()
    {
        $this->setPostfix();

        $builder = $this->builder('team' . $this->postfix);
        $builder->where('f_show', '1');
        $builder->orderBy('f_sort', 'asc');

        return $builder->get();
    }
}