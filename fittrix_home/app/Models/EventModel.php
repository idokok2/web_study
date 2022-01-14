<?php
namespace App\Models;

class EventModel extends BaseModel
{
    public function getList()
    {
        $this->setPostfix();

        $builder = $this->builder('ht_event' . $this->postfix);
        $builder->where('f_show', '1');
        $builder->orderBy('f_sort', 'asc');

        return $builder->get();
    }

    public function getEventInfo(int $no)
    {
        $this->setPostfix();

        $builder = $this->builder('ht_event' . $this->postfix);
        $builder->where('f_uid', $no);

        return $builder->get();
    }
}