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
    public function __toString()
    {
        return 'Read Data / List Directory';
    }
}
