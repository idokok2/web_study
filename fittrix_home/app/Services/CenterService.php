<?php
namespace App\Services;

use App\Models\CenterModel;

class CenterService extends BaseService
{
    private $centerModel;

    public function __construct()
    {
        parent::__construct();

        $this->centerModel = new CenterModel();
    }

    public function getCenterList(string $locale = '')
    {
        return $this->centerModel->getCenterList($locale)->getResultArray();
    }
}