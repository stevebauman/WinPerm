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
    public function name()
    {
        return 'Inherit Only';
    }
}
