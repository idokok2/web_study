<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\MemberService;
use Exception;

class Member extends BaseController
{
    public function index()
    {
        $this->adminInit();
        if ($this->checkAdmin() === true) {
            return redirect()->route('admin/reservation');
        }

        return view('admin/main/login');
    }

    public function loginProc()
    {
        $adminId = $this->request->getPost('f_id');
        $adminPw = $this->request->getPost('f_password');

        $memberService = new MemberService();
        try {
            $memberService->loginProcess($adminId, $adminPw);
            return $this->response->setJSON([
                'result'    => true,
                'reason'    => '',
            ]);
        } catch (Exception $exception) {
            return $this->response->setJSON([
                'result'    => false,
                'reason'    => $exception->getMessage(),
            ]);
        }
    }
}