<?php

namespace Stevebauman\WinPerm\Permissions;

class MaximumAllowed implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'MA';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Maximum Allowed';
    }
}
