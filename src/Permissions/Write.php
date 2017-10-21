<?php

namespace Stevebauman\WinPerm\Permissions;

class Write implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'W';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Write Only Access';
    }
}
