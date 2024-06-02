<?php

namespace App\Repositories\Admin\Event;

use App\Models\Front\Event;

class EventRepository
{
    protected $eventM;
    public function __construct(Event $event)
    {
        $this->eventM = $event;
    }

    public function getAll()
    {
        return $this->eventM->all();
    }
}
