<?php

namespace Stevebauman\WinPerm\Permissions;

class WriteAttributes implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'WA';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Write Attributes';
    }
}
