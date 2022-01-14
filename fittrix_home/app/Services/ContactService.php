<?php
namespace App\Services;

use App\Models\ContactModel;

class ContactService extends BaseService
{
    private $contactModel;
    private $client;

    public function __construct()
    {
        parent::__construct();

        $this->contactModel = new ContactModel();

        // 슬랙 발송을 위한 초기화
        $settings = [
            'username'      => '예약알림',
            'channel'       => '#홈페이지문의접수',
            'like_names'    => true,
        ];
        $this->client = new \Maknz\Slack\Client('https://hooks.slack.com/services/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', $settings);
    }

    public function insertContact(array $data)
    {
        $map = [
            'company'   => '회사명',
            'location'  => '위치',
            'name'      => '담당자',
            'email'     => 'Email',
            'phone'     => '전화번호'
        ];
        $result = $this->contactModel->insertContact($data);
        $field = [];
        $type = [
            'B' => '구매문의',
            'C' => '협업문의',
            'E' => '기타문의',
        ];
        $field[] = [
            'title' => '환경',
            'value' => ENVIRONMENT,
            'short' => true,
        ];
        $field[] = [
            'title' => '문의타입',
            'value' => $type[$data['contact_type']],
            'short' => true,
        ];
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
        $field[] = [
            'title' => '문의내용',
            'value' => $data['content'],
            'short' => false,
        ];

        $this->client->attach([
            'fallback'  => '홈페이지문의접수',
            'text'      => '홈페이지문의접수',
            'color'     => '#5F9EA0',
            'fields'    => $field
        ])->send('홈페이지 문의접수');

        return $result;
    }
}