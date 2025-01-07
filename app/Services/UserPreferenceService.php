<?php
namespace App\Services;

use App\Models\UserPreference;

class UserPreferenceService
{

    public function getPreference(int $userId, string $module, string $key, $default = null): ?string
    {
        $preference = UserPreference::where('user_id', $userId)
            ->where('module', $module)
            ->where('key', $key)
            ->first();

        return $preference ? $preference->value : $default;
    }

    public function savePreference(int $userId, string $module, string $key, string $value): void
    {
        UserPreference::updateOrCreate(
            ['user_id' => $userId, 'module' => $module, 'key' => $key],
            ['value' => $value]
        );
    }
}
