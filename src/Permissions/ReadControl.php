<?php

namespace Stevebauman\WinPerm\Permissions;

class ReadControl implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'RC';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Read Control';
    }
}
