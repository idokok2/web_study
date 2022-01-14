<?php
namespace App\Controllers;

use App\Services\CenterService;
use App\Services\ReservationService;
use \Exception;

class Reservation extends BaseController
{
    public function index()
    {
        $centerService = new CenterService();

        $data = [
            'centerList'    => $centerService->getCenterList(),
        ];

        return view($this->lang . '/reservation/index', $data);
    }

    public function process()
    {
        $center_no = $this->request->getPost('center_no');
        $center = $this->request->getPost('f_center');
        $date = $this->request->getPost('date');
        $user_name = trim($this->request->getPost('f_user_name'));
        $user_cell = trim($this->request->getPost('f_user_cell'));
        $answer = trim($this->request->getPost('f_answer'));

        $reservationService = new ReservationService();
        if ($reservationService->checkValid($center_no, $date) === false) {
            return $this->response->setJSON([
                'result'    => false,
                'reason'    => '선택하신 날짜와 센터는 예약이 불가합니다.',
            ]);
        }

        try {
            $reservationService->insertReservation([
                'center_no'     => $center_no,
                'f_center'      => $center,
                'f_visit_date'  => $date,
                'f_user_name'   => $user_name,
                'f_user_cell'   => $user_cell,
                'f_answer'      => $answer,
                'f_date'        => time(),
                'f_status'      => '0',
            ]);
            return $this->response->setJSON([
                'result'    => true,
                'reason'    => '',
            ]);
        } catch (Exception $e) {
            return $this->response->setJSON([
                'result'    => false,
                'reason'    => '정보를 저장하는데 실패하였습니다. 다시 시도하여 주세요.',
            ]);
        }
    }

    public function confirm()
    {
        return view($this->lang . '/reservation/confirm');
    }

    public function findReservation()
    {
        $user_name = $this->request->getPost('f_user_name');
        $user_cell = $this->request->getPost('f_user_cell');
        $answer = $this->request->getPost('f_answer');

        $reservationService = new ReservationService;
        $info = $reservationService->findReservation($user_name, $user_cell, $answer)->getResultArray();
        if (is_null($info) === true) {
            historyBack('예약내역이 조회되지 않습니다.');
            return;
        }

        $data = [
            'list'  => $info,
        ];

        return view($this->lang . '/reservation/view', $data);
    }

    public function checkValid()
    {
        $center_no = $this->request->getPost('center_no');
        $date  = $this->request->getPost('date');

        $reservationService = new ReservationService;
        $result = $reservationService->checkValid($center_no, $date);

        return $this->response->setJSON([
            'result'    => $result,
        ]);
    }
}