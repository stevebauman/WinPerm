<?php

namespace Stevebauman\WinPerm\Permissions;

class ObjectInherit implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'OI';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Object Inherit';
    }
}
