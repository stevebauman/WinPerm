<?php

namespace Stevebauman\WinPerm\Permissions;

class ReadExtendedAttributes implements PermissionInterface
{
    /**
     * {@inheritdoc}
     */
    public function definition()
    {
        return 'REA';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'Read Extended Attributes';
    }
}
