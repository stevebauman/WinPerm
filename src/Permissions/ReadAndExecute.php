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
    public function name()
    {
        return 'Read and Execute Access';
    }
}
