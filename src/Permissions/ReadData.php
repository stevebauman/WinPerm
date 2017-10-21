<?php

namespace Stevebauman\WinPerm\Permissions;

class ReadData implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'RD';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Read Data / List Directory';
    }
}
