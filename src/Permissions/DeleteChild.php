<?php

namespace Stevebauman\WinPerm\Permissions;

class DeleteChild implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'DC';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Delete Child';
    }
}
