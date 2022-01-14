<?php
namespace App\Controllers;

use App\Services\RecruitService;

class Recruit extends BaseController
{
    public function index()
    {
        $recruitService = new RecruitService();

        $info = $recruitService->getRecruitInfo();
        $data = [
            'list'  => $info['list'],
            'cnt'   => $info['cnt'],
        ];

        return view($this->lang .  '/recruit/index', $data);
    }

    public function view(int $no)
    {
        $recruitService = new RecruitService();

        $info = $recruitService->getRecruitContent($no)->getRowArray();
        if (is_null($info) === true) {
            historyBack('데이터를 찾을 수 없습니다');
            return;
        }

        $data = [
            'info'  => $info,
        ];
        return view($this->lang . '/recruit/view', $data);
    }
}