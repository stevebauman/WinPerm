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
    public function __toString()
    {
        return 'Write Owner';
    }
}
