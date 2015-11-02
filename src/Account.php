<?php

namespace Stevebauman\WinPerm;

use Stevebauman\WinPerm\Permissions\PermissionInterface;

class Account implements AccountInterface
{
    /**
     * The account name.
     *
     * @var string
     */
    protected $name = '';

    /**
     * The accounts permissions.
     *
     * @var array
     */
    protected $permissions = [];

    /**
     * {@inheritdoc}
     */
    public function __construct($name = '')
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setPermissions(array $permissions = [])
    {
        foreach ($permissions as $permission) {
            if ($permission instanceof PermissionInterface) {
                $this->addPermission($permission);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * {@inheritdoc}
     */
    public function addPermission(PermissionInterface $permission)
    {
        $this->permissions[$permission->definition()] = $permission;
    }

    /**
     * {@inheritdoc}
     */
    public function hasPermission($permission)
    {
        if ($permission instanceof PermissionInterface) {
            $permission = $permission->definition();
        }

        return array_key_exists($permission, $this->permissions);
    }
}
