<?php
namespace App\Services;

use App\Models\MemberModel;
use \Exception;

class MemberService extends BaseService
{
    private $memberModel;

    public function __construct()
    {
        parent::__construct();

        $this->memberModel = new MemberModel();
    }

    public function loginProcess(string $adminId, string $adminPw)
    {
        $info = $this->memberModel->getAdminInfo($adminId)->getRowArray();

        if (is_null($info) === true) {
            throw new Exception('아이디 또는 패스워드가 일치하지 않습니다.');
        }

        if (password_verify($adminPw, $info['f_admin_pw']) === false) {
            throw new Exception('패스워드가 일치하지 않습니다.');
        }

        if ($info['f_status'] === '0') {
            throw new Exception('탈퇴한 회원입니다 (동일 ID로 재가입 불가)');
        }

        if ($info['f_status'] === '9') {
            throw new Exception('휴면 회원입니다 (휴면 해제 후 로그인 가능)');
        }

        $data = [
            'f_admin_id'    => $info['f_admin_id'],
            'f_admin_name'  => $info['f_admin_name'],
            'f_admin_email' => $info['f_admin_email'],
        ];

        $session = \Config\Services::session();
        $session->set($data);

        return true;
    }
}