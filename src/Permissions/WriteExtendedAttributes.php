<?php

namespace Stevebauman\WinPerm\Permissions;

class WriteExtendedAttributes implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'WEA';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Write Extended Attributes';
    }
}
