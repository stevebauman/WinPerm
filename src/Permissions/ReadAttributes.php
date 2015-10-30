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
    public function __toString()
    {
        return 'Read Attributes';
    }
}
