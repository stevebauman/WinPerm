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
    public function name()
    {
        return 'Access System Security';
    }
}
