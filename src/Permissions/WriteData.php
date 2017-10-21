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
    public function name()
    {
        return 'Write Data / Add File';
    }
}
