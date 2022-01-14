<?php
namespace App\Services;

use App\Models\EventModel;

class EventService extends BaseService
{
    private $eventModel;

    public function __construct()
    {
        parent::__construct();

        $this->eventModel = new EventModel();
    }

    public function getList()
    {
        return $this->eventModel->getList();
    }

    public function getInfo(int $no)
    {
        return $this->eventModel->getEventInfo($no);
    }
}