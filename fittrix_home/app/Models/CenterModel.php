<?php
namespace App\Models;

class CenterModel extends BaseModel
{
    public function getCenterList(string $locale = '')
    {
        if (empty($locale) === true) {
            $this->setPostfix();
            $builder = $this->builder('fit_center' . $this->postfix);
        } else {
            $postfix = [
                'kor'   => '',
                'eng'   => '_en',
            ];
            $builder = $this->builder('fit_center' . $postfix[$locale]);
        }

        $builder->where('f_show', 'Y');
        $builder->orderBy('f_sort', 'asc');

        return $builder->get();
    }
}