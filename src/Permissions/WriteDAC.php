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
    public function __toString()
    {
        return 'Write DAC';
    }
}
