<?php

namespace Stevebauman\WinPerm\Permissions;

class ReadAttributes implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'RA';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Read Attributes';
    }
}
