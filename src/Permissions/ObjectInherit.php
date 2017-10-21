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
    public function name()
    {
        return 'Object Inherit';
    }
}
