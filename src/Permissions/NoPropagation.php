<?php

namespace Stevebauman\WinPerm\Permissions;

class NoPropagation implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'NP';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Do Not Propagate Inherit';
    }
}
