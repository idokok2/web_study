<?php
namespace App\Controllers;

class Policy extends BaseController
{
    public function agreement()
    {
        return view($this->lang . '/policy/agreement');
    }

    public function privacy()
    {
        return view($this->lang . '/policy/privacy');
    }

    public function refund()
    {
        return view($this->lang . '/policy/refund');
    }
}