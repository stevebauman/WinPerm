<?php

namespace Stevebauman\WinPerm\Permissions;

class InheritOnly implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'IO';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Inherit Only';
    }
}
