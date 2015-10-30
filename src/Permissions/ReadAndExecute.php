<?php

namespace Stevebauman\WinPerm\Permissions;

class ReadAndExecute implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'RX';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Read and Execute Access';
    }
}
