<?php

namespace Stevebauman\WinPerm\Permissions;

interface PermissionInterface
{
    /**
     * The permission definition name.
     *
     * @return string
     */
    public function definition();

    /**
     * The permissions full name.
     *
     * @return string
     */
    public function name();
}
