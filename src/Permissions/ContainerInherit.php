<?php

namespace Stevebauman\WinPerm\Permissions;

class ContainerInherit implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'CI';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Container Inherit';
    }
}
