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
    public function __toString()
    {
        return 'Generic Execute';
    }
}
