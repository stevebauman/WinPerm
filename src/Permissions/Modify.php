<?php

namespace Stevebauman\WinPerm\Permissions;

class Modify implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'M';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Modify Access';
    }
}
