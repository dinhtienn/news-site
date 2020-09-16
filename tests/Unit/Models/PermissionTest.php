<?php

namespace Tests\Unit\Models;

use App\Models\Permission;
use App\Models\Role;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    protected $permission;

    protected function setUp(): void
    {
        parent::setUp();
        $this->permission = new Permission();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->permission);
    }

    public function test_table_name()
    {
        $this->assertEquals('permissions', $this->permission->getTable());
    }

    public function test_roles_relation()
    {
        $this->test_belongsToMany_relation(
            Role::class,
            'permission_id',
            $this->permission->roles(),
            'role_id'
        );
    }
}
