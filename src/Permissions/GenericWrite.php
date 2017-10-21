<?php

namespace Stevebauman\WinPerm\Permissions;

class GenericWrite implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'GW';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Generic Write';
    }
}
