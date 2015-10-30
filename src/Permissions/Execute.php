<?php

namespace Stevebauman\WinPerm\Permissions;

class Execute implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'X';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Execute';
    }
}
