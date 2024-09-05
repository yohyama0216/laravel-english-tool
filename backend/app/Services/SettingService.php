<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\User;

class SettingService
{
    public function getSettingByUser(User $user): Setting
    {
        return Setting::findByUser($user);
    }
}
