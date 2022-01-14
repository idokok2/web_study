<?php
namespace App\Models;

class FaqModel extends BaseModel
{
    public function getList()
    {
        $this->setPostfix();

        $builder = $this->builder('ht_faq' . $this->postfix);
        $builder->where('f_show', '1');
        $builder->orderBy('f_sort');

        return $builder->get();
    }
}