<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\ReservationService;
use Exception;

class Reservation extends BaseController
{
    public function list()
    {
        $this->adminInit();
        if ($this->checkAdmin() === false) {
            historyBack('If you are an administrator, please log in.');
            return;
        }

        $reservationService = new ReservationService();

        $page = $this->request->getGet('page') ?? 1;
        $limit = $this->request->getGet('limit') ?? 20;
        $totalCnt = $reservationService->getCnt();
        $list = $reservationService->getList($page, $limit)->getResultArray();

        $data = [
            'totalCnt'  => $totalCnt,
            'list'      => $list,
            'page'      => $page,
            'limit'     => $limit,
            'pageCode1' => '01',
            'pageCode2' => '0101',
            'title1'    => "예약현황",
            'title2'    => "",
            'title3'    => "",
            'status'    => $this->reservationStatus,
        ];

        return view('admin/reservation/list', $data);
    }

    private $reservationStatus = [
        '0' => '이용전',
        '1' => '취소',
        '2' => 'No Show',
        '9' => '이용완료',
    ];

    public function view()
    {
        $this->adminInit();
        if ($this->checkAdmin() === false) {
            historyBack('If you are an administrator, please log in.');
            return;
        }

        $uid = $this->request->getGet('uid');
        $reservationService = new ReservationService();

        $info = $reservationService->getInfo($uid)->getRowArray();
        if (is_null($info) === true) {
            historyBack('예약 정보를 찾을 수 없습니다.');
            return;
        }

        $data = [
            'info'      => $info,
            'pageCode1' => '01',
            'pageCode2' => '0101',
            'title1'    => "예약현황",
            'title2'    => "",
            'title3'    => "",
            'status'    => $this->reservationStatus,
        ];

        return view('admin/reservation/view', $data);
    }

    public function modify()
    {
        $this->adminInit();
        if ($this->checkAdmin() === false) {
            return $this->response->setJSON([
                'result'    => false,
                'reason'    => 'If you are an administrator, please log in.'
            ]);
        }

        $reservationService = new ReservationService();
        try {
            $reservationService->modify([
                'uid'       => $this->request->getPost('uid'),
                'status'    => $this->request->getPost('status'),
                'memo'      => $this->request->getPost('memo'),
            ]);

            return $this->response->setJSON([
                'result'    => true,
                'reason'    => '',
            ]);
        } catch (Exception $exception) {
            return $this->response->setJSON([
                'result'    => false,
                'reason'    => $exception->getMessage()
            ]);
        }
    }
}