<?php

namespace Stevebauman\WinPerm\Permissions;

class GenericRead implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'GR';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Generic Read';
    }
}
