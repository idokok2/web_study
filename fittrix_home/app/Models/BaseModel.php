<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class BaseModel extends Model
{
    protected $postfix;
    protected $localeMap = [
        'kor'   => '',
        'eng'   => '_en',
    ];

    public function transStart()
    {
        $this->db->transBegin();
    }

    public function commit()
    {
        $this->db->transCommit();
    }

    public function rollback()
    {
        $this->db->transRollback();
    }

    public function getTransStatus()
    {
        return $this->db->transStatus();
    }

    public function getLastID()
    {
        return $this->db->insertID();
    }

    protected function makeWhere(BaseBuilder $builder, array $where)
    {
        foreach ($where as $type => $conditions) {
            $builder->$type($conditions);
        }

        return $builder;
    }

    protected function setPostfix()
    {
        $this->locale = get_cookie('fittrix_locale');
        $locale = get_cookie('fittrix_locale');
        if (empty($locale) === true) {
            $locale = 'kor';
        }
        $this->postfix = $this->localeMap[$locale];
    }
}
