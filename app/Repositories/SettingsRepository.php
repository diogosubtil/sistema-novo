<?php

namespace App\Repositories;

use App\Http\Requests\SettingsFormRequest;
use App\Models\Setting;

interface SettingsRepository
{
    //EDITA
    public function edit(SettingsFormRequest $request,Setting $setting);
}
