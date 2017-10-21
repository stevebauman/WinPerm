<?php

namespace Stevebauman\WinPerm\Permissions;

class Read implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'R';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Read Only Access';
    }
}
