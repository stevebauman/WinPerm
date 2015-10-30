<?php

namespace Stevebauman\WinPerm\Permissions;

class Synchronize implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'S';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Synchronize';
    }
}
