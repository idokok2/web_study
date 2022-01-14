<?php
namespace App\Models;

class ReservationModel extends BaseModel
{
    public function insertReservation(array $data)
    {
        return $this->db->table('reservation')->insert($data);
    }

    public function findReservation(string $user_name, string $user_cell, string $answer)
    {
        $builder = $this->builder('reservation');
        $builder->where('f_user_name', $user_name);
        $builder->where('f_user_cell', $user_cell);
        $builder->where('f_answer', $answer);

        return $builder->get();
    }

    public function getCnt()
    {
        $builder = $this->builder('reservation');

        return $builder->selectCount('f_uid', 'cnt')->get();
    }

    public function getList(int $page, int $limit)
    {
        $builder = $this->builder('reservation');
        $builder->orderBy('f_uid', 'desc');

        //return $builder->get($limit, ($page - 1) * $limit);
        return $builder->get();
    }

    public function getInfo(int $uid)
    {
        $builder = $this->builder('reservation');
        $builder->where('f_uid', $uid);

        return $builder->get();
    }

    public function modify(int $uid, array $data)
    {
        return $this->db->table('reservation')->update($data, ['f_uid'  => $uid]);
    }

    public function countReservertion(array $where, array $timeList = [])
    {
        $builder = $this->builder('reservation');
        $builder->where($where);
        if (empty($timeList) === false) {
            $builder->whereIn('f_visit_date', $timeList);
        }

        return $builder->selectCount('f_uid', 'cnt')->get();
    }
}