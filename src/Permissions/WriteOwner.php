<?php

namespace Stevebauman\WinPerm\Permissions;

class WriteOwner implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'WO';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Write Owner';
    }
}
