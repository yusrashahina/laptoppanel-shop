<?php
namespace App\Services;

use App\Models\UserPreference;

class UserPreferenceService
{

    protected static array $cachedPreferences = [];

    public function getPreference(int $userId, string $module, string $key, $default = null): ?string
    {
        $cacheKey = "{$userId}.{$module}.{$key}";

        if (!isset(self::$cachedPreferences[$cacheKey])) {
            self::$cachedPreferences[$cacheKey] = UserPreference::where([
                'user_id' => $userId,
                'module' => $module,
                'key' => $key
            ])->value('value') ?? $default;
        }

        return self::$cachedPreferences[$cacheKey];
    }

    public function savePreference(int $userId, string $module, string $key, string $value): void
    {
        UserPreference::updateOrCreate(
            ['user_id' => $userId, 'module' => $module, 'key' => $key],
            ['value' => $value]
        );
    }
}
