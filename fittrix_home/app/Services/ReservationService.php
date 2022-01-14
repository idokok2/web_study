<?php
namespace App\Services;

use App\Models\ReservationModel;
use Exception;

class ReservationService extends BaseService
{
    private $reservationModel;
    private $client;

    public function __construct()
    {
        parent::__construct();

        $this->reservationModel = new ReservationModel();

        // 슬랙 발송을 위한 초기화
        $settings = [
            'username'      => '예약알림',
            'channel'       => '#홈페이지예약정보',
            'like_names'    => true,
        ];
        $this->client = new \Maknz\Slack\Client('https://hooks.slack.com/services/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', $settings);
    }

    public function insertReservation(array $data)
    {
        $map = [
            'f_center'      => '방문센터',
            'f_visit_date'  => '예약일시',
            'f_user_name'   => '예약자명',
            'f_user_cell'   => '연락처',
            'f_answer'      => '가장 좋아하는 운동'
        ];
        $result = $this->reservationModel->insertReservation($data);
        $field = [];
        foreach ($data as $key => $value) {
            if (isset($map[$key]) === false) {
                continue;
            }
            $field[] = [
                'title' => $map[$key],
                'value' => $value,
                'short' => true,
            ];
        }

        $this->client->attach([
            'fallback'  => '홈페이지 예약정보',
            'text'      => '홈페이지 예약정보',
            'color'     => '#5F9EA0',
            'fields'    => $field
        ])->send('홈페이지 예약 정보');

        return $result;
    }

    public function checkValid(int $centerNo, string $date)
    {
        $where = [
            'center_no'     => $centerNo,
            'f_status !='   => '1',
        ];

        $date = str_replace('.', '-', $date);
        $timeList = [
            $date,  // 방문 시간
            date('Y-m-d H:i', strtotime($date) + 1800), // 방문시간 + 30분
            date('Y-m-d H:i', strtotime($date) - 1800), // 방문시간 - 30분
        ];

        $cnt = $this->reservationModel->countReservertion($where, $timeList)->getRowArray();
        if ($cnt['cnt'] > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function findReservation(string $user_name, string $user_cell, string $answer)
    {
        return $this->reservationModel->findReservation($user_name, $user_cell, $answer);
    }

    public function getList(int $page, int $limit)
    {
        return $this->reservationModel->getList($page, $limit);
    }

    public function getCnt()
    {
        return $this->reservationModel->getCnt()->getRowArray()['cnt'];
    }

    public function getInfo(int $uid)
    {
        return $this->reservationModel->getInfo($uid);
    }

    public function modify(array $params)
    {
        $data = [
            'f_status'  => $params['status'] ?? '0',
            'f_memo'    => $params['memo'] ?? '',
        ];
        $uid = $params['uid'] ?? 0;

        return $this->reservationModel->modify($uid, $data);
    }
}