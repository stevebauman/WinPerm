<?php

namespace Stevebauman\WinPerm\Permissions;

class AppendData implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'AD';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Append Data / Add Subdirectory';
    }
}
