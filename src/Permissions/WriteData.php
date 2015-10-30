<?php

namespace Stevebauman\WinPerm\Permissions;

class WriteData implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'WD';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Write Data / Add File';
    }
}
