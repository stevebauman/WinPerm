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
    public function name()
    {
        return 'Write Attributes';
    }
}
