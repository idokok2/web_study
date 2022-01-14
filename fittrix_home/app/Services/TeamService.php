<?php
namespace App\Services;

use App\Models\TeamModel;

class TeamService extends BaseService
{
    private $teamModel;

    public function __construct()
    {
        parent::__construct();

        $this->teamModel = new TeamModel();
    }

    public function getList()
    {
        return $this->teamModel->getList()->getResultArray();
    }
}