<?php

namespace Stevebauman\WinPerm;

use Stevebauman\WinPerm\Permissions\PermissionInterface;

class Account
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
     * Constructor.
     *
     * @param string $name
     */
    public function __construct($name = '')
    {
        $this->name = $name;
    }

    /**
     * Returns the account name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the accounts permissions.
     *
     * @param array $permissions
     */
    public function setPermissions(array $permissions)
    {
        foreach ($permissions as $permission) {
            if ($permission instanceof PermissionInterface) {
                $this->addPermission($permission);
            }
        }
    }

    /**
     * Returns the accounts permissions.
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Adds a permission to the account.
     *
     * @param PermissionInterface $permission
     */
    public function addPermission(PermissionInterface $permission)
    {
        $this->permissions[$permission->definition()] = $permission;
    }

    /**
     * Returns true / false if the current account has the specified permission.
     *
     * @param string|PermissionInterface $permission
     *
     * @return bool
     */
    public function hasPermission($permission)
    {
        if ($permission instanceof PermissionInterface) {
            $permission = $permission->definition();
        }

        return array_key_exists($permission, $this->permissions);
    }
}
