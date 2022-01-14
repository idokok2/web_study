<?php
namespace App\Controllers;

use App\Services\EventService;

class Event extends BaseController
{
    public function index()
    {
        $eventService = new EventService();
        $data = [
            'list' => $eventService->getList()->getResultArray(),
        ];

        return view($this->lang . '/event/list', $data);
    }

    public function view(int $no)
    {
        $eventService = new EventService();
        $info = $eventService->getInfo($no)->getRowArray($no);

        if (is_null($info) === true) {
            historyBack('데이터를 찾을 수 없습니다');
            return;
        }

        $data = [
            'info' => $info,
        ];
        return view($this->lang . '/event/view', $data);
    }
}