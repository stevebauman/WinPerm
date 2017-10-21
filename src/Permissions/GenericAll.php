<?php

namespace Stevebauman\WinPerm\Permissions;

class GenericAll implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'GA';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Generic All';
    }
}
