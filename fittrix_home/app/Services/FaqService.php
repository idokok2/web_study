<?php
namespace App\Services;

use App\Models\FaqModel;

class FaqService extends BaseService
{
    private $faqModel;

    public function __construct()
    {
        parent::__construct();

        $this->faqModel = new FaqModel();
    }

    public function getFaqList()
    {
        return $this->faqModel->getList()->getResultArray();
    }
}