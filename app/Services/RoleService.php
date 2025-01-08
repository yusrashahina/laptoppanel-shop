<?php
namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService
{
    public function getRoleNamesWithIds()
    {
        return Role::all(['id', 'name']);
    }
}
