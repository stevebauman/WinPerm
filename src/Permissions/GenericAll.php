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
    public function __toString()
    {
        return 'Generic All';
    }
}
