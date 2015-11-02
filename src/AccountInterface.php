<?php

namespace Stevebauman\WinPerm;

use Stevebauman\WinPerm\Permissions\PermissionInterface;

interface AccountInterface
{
    /**
     * Constructor.
     *
     * @param string $name
     */
    public function __construct($name = '');

    /**
     * Returns the account name.
     *
     * @return string
     */
    public function getName();

    /**
     * Sets the accounts permissions.
     *
     * @param array $permissions
     */
    public function setPermissions(array $permissions = []);

    /**
     * Returns the accounts permission objects.
     *
     * @return array
     */
    public function getPermissions();

    /**
     * Returns the accounts permission names.
     *
     * @return array
     */
    public function getPermissionNames();

    /**
     * Adds a permission to the account.
     *
     * @param PermissionInterface $permission
     */
    public function addPermission(PermissionInterface $permission);

    /**
     * Returns true / false if the current account has the specified permission.
     *
     * @param string|PermissionInterface $permission
     *
     * @return bool
     */
    public function hasPermission($permission);
}
