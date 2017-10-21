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
    public function name()
    {
        return 'Delete Child';
    }
}
