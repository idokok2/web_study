<?php

namespace App\Controllers;

use App\Services\CenterService;
use App\Services\FaqService;
use App\Services\TeamService;

class Main extends BaseController
{
    public function index()
    {
        return view($this->lang .  '/main/index');
    }

    public function about()
    {
        return view($this->lang .  '/main/about');
    }

    public function team()
    {
        $teamService = new TeamService();

        $data = [
            'list'  => $teamService->getList(),
        ];
        return view($this->lang .  '/main/team', $data);
    }

    public function services()
    {
        $centerService = new CenterService();
        $faqService = new FaqService();

        $data = [
            'centerList'    => $centerService->getCenterList(),
            'faqList'       => $faqService->getFaqList(),
        ];

        return view($this->lang .  '/main/services', $data);
    }

    public function product()
    {
        return view($this->lang .  '/main/product');
    }

    public function application()
    {
        return view($this->lang .  '/main/application');
    }

    public function setLocale()
    {
        $locale = $this->request->getPost('locale');
        set_cookie('fittrix_locale', $locale);
        return $this->response->setJSON([
            'result'    => true,
            'reason'    => '',
        ]);
    }

    public function employers()
    {
        return view($this->lang .  '/main/employers');
    }

    public function individuals()
    {
        return view($this->lang .  '/main/individuals');
    }
    public function media()
    {
        return view($this->lang .  '/main/media');
    }
    public function videoplayer()
    {
        return view($this->lang .  '/main/videoplayer');
    }
}