<?php
namespace App\Models;

class RecruitModel extends BaseModel
{
    public function getRecruitList()
    {
        $this->setPostfix();

        $builder = $this->builder('recruit' . $this->postfix);
        $builder->where('f_show', '1');
        $builder->orderBy('f_sort', 'asc');

        return $builder->get();
    }

    public function getRecruitCnt()
    {
        $this->setPostfix();

        $builder = $this->builder('recruit'. $this->postfix);
        $builder->where('f_show', '1');
        $builder->selectCount('f_uid');

        return $builder->get();
    }

    public function getRecruitInfo(int $no)
    {
        $this->setPostfix();

        $builder = $this->builder('recruit'. $this->postfix);
        $builder->where('f_uid', $no);

        return $builder->get();
    }
}