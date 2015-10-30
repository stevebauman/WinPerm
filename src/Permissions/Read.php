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
    public function __toString()
    {
        return 'Read Only Access';
    }
}
