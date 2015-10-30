<?php

namespace Stevebauman\WinPerm\Permissions;

class AccessSystemSecurity implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'AS';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Access System Security';
    }
}
