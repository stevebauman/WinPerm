<?php

namespace Stevebauman\WinPerm\Permissions;

class GenericExecute implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'GE';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Generic Execute';
    }
}
