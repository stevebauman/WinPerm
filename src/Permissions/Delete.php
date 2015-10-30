<?php

namespace Stevebauman\WinPerm\Permissions;

class Delete implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'D';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Delete';
    }
}
