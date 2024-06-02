<?php


namespace App\Repositories\Admin;

use App\Models\Admin\AdminNotification;

class NotificationRepository
{
    protected $adNotificM;
    public function __construct(AdminNotification $adminNotification)
    {
        $this->adNotificM = $adminNotification;
    }

    public function getAllNoti()
    {
        return $this->adNotificM->all();
    }
}
