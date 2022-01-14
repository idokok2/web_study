<?php
namespace App\Controllers;

use App\Services\ContactService;
use \Exception;

class Contact extends BaseController
{
    public function index()
    {
        return view($this->lang . '/contact/index');
    }

    public function register()
    {
        $params = [
            'contact_type'  => strtoupper(substr($this->request->getPost('cont_category'), 0, 1)),
            'company'       => $this->request->getPost('cont_name'),
            'location'      => $this->request->getPost('cont_location'),
            'name'          => $this->request->getPost('cont_author'),
            'email'         => $this->request->getPost('cont_mail'),
            'phone'         => $this->request->getPost('cont_phone'),
            'content'       => $this->request->getPost('cont_contents'),
        ];

        $contactService = new ContactService;
        try {
            $contactService->insertContact($params);
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
}