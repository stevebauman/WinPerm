<?php

namespace Stevebauman\WinPerm\Permissions;

class Full implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'F';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Full Access';
    }
}
