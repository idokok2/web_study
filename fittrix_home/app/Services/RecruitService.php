<?php
namespace App\Services;

use App\Models\RecruitModel;

class RecruitService extends BaseService
{
    private $recruitModel;

    public function __construct()
    {
        parent::__construct();

        $this->recruitModel = new RecruitModel();
    }

    public function getRecruitInfo()
    {
        return [
            'list'  => $this->recruitModel->getRecruitList()->getResultArray(),
            'cnt'   => $this->recruitModel->getRecruitCnt()->getRowArray()
        ];
    }

    public function getRecruitContent(int $no)
    {
        return $this->recruitModel->getRecruitInfo($no);
    }
}