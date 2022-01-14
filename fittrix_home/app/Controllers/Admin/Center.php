<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\CenterService;

class Center extends BaseController
{
    public function list()
    {
        $this->adminInit();
        if ($this->checkAdmin() === false) {
            historyBack('If you are an administrator, please log in.');
            return;
        }

        $centerService = new CenterService();

        $page = $this->request->getGet('page') ?? 1;
        $limit = $this->request->getGet('limit') ?? 20;
        //$totalCnt = $centerService->getCnt('kor');
        $list = $centerService->getCenterList('kor');

        $data = [
            //'totalCnt'  => $totalCnt,
            'list'      => $list,
            'page'      => $page,
            'limit'     => $limit,
            'pageCode1' => '02',
            'pageCode2' => '0201',
            'title1'    => "피트릭스 스팟 관리",
            'title2'    => "",
            'title3'    => "",
            'type'      => 'kor',
        ];

        return view('admin/center/list', $data);
    }

    public function listEng()
    {
        $this->adminInit();
        if ($this->checkAdmin() === false) {
            historyBack('If you are an administrator, please log in.');
            return;
        }

        $centerService = new CenterService();

        $page = $this->request->getGet('page') ?? 1;
        $limit = $this->request->getGet('limit') ?? 20;
        //$totalCnt = $centerService->getCnt('kor');
        $list = $centerService->getCenterList('eng');

        $data = [
            //'totalCnt'  => $totalCnt,
            'list'      => $list,
            'page'      => $page,
            'limit'     => $limit,
            'pageCode1' => '02',
            'pageCode2' => '0202',
            'title1'    => "피트릭스 스팟 관리 (ENG)",
            'title2'    => "",
            'title3'    => "",
            'type'      => 'eng',
        ];

        return view('admin/center/list', $data);
    }
}