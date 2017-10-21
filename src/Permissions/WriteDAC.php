<?php

namespace Stevebauman\WinPerm\Permissions;

class WriteDAC implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'WDAC';
    }

    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return 'Write DAC';
    }
}
