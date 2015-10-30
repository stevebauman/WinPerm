<?php

namespace Stevebauman\WinPerm\Permissions;

interface PermissionInterface
{
    /**
     * The permission definition string.
     *
     * @return string
     */
    public function definition();

    /**
     * Displays the string representation of the permission.
     *
     * @return string
     */
    public function __toString();
}
