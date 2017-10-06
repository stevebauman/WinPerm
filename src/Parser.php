<?php

namespace Stevebauman\WinPerm;

class Parser
{
    /**
     * The permissions definition for parsing.
     *
     * @var array
     */
    public static $definitions = [
        'F'     => Permissions\Full::class,
        'M'     => Permissions\Modify::class,
        'RX'    => Permissions\ReadAndExecute::class,
        'R'     => Permissions\Read::class,
        'W'     => Permissions\Write::class,
        'D'     => Permissions\Delete::class,
        'RC'    => Permissions\ReadControl::class,
        'WDAC'  => Permissions\WriteDAC::class,
        'WO'    => Permissions\WriteOwner::class,
        'S'     => Permissions\Synchronize::class,
        'AS'    => Permissions\AccessSystemSecurity::class,
        'MA'    => Permissions\MaximumAllowed::class,
        'GR'    => Permissions\GenericRead::class,
        'GW'    => Permissions\GenericWrite::class,
        'GE'    => Permissions\GenericExecute::class,
        'GA'    => Permissions\GenericAll::class,
        'RD'    => Permissions\ReadData::class,
        'WD'    => Permissions\WriteData::class,
        'AD'    => Permissions\AppendData::class,
        'REA'   => Permissions\ReadExtendedAttributes::class,
        'WEA'   => Permissions\WriteExtendedAttributes::class,
        'X'     => Permissions\Execute::class,
        'DC'    => Permissions\DeleteChild::class,
        'RA'    => Permissions\ReadAttributes::class,
        'WA'    => Permissions\WriteAttributes::class,
        'OI'    => Permissions\ObjectInherit::class,
        'CI'    => Permissions\ContainerInherit::class,
        'IO'    => Permissions\InheritOnly::class,
        'NP'    => Permissions\NoPropagation::class,
    ];

    /**
     * The output of the resulting permission command.
     *
     * @var array
     */
    protected $output = [];

    /**
     * Constructor.
     *
     * @param array $output
     */
    public function __construct(array $output)
    {
        $this->output = $output;
    }

    /**
     * Parses the output array into an access control list
     * with accounts and their permission objects.
     *
     * @return array
     */
    public function parse()
    {
        $results = [];

        foreach ($this->output as $account) {
            if ($account = $this->parseAccount($account)) {
                $results[] = $account;
            }
        }

        return $results;
    }

    /**
     * Parses an account string with permissions
     * into individual components.
     *
     * @param string $account
     *
     * @return null|Account
     */
    protected function parseAccount($account)
    {
        // Separate the account by it's account and permission list.
        $parts = explode(':', trim($account));

        // We should receive exactly two parts of a permission
        // listing, otherwise we'll return null.
        if (count($parts) === 2) {
            $account = new Account($parts[0]);

            $acl = $this->parseAccessControlList($parts[1]);

            $account->setPermissions($acl);

            return $account;
        }

        return null;
    }

    /**
     * Parses an access control list string into
     * an array of Permission objects.
     *
     * @param string $list
     *
     * @return array
     */
    protected function parseAccessControlList($list)
    {
        $permissions = [];

        // Matches between two parenthesis.
        preg_match_all('/\((.*?)\)/', $list, $matches);

        // Make sure we have resulting matches.
        if (is_array($matches) && count($matches) > 0) {
            // Matches inside the first key will have parenthesis
            // already removed, so we need to verify it exists.
            if (array_key_exists(1, $matches) && is_array($matches[1])) {
                // We'll go through each match and see if the ACE
                // exists inside the permissions definition list.
                foreach ($matches[1] as $definition) {
                    // We'll merge the permissions list so we have a flat array
                    // of all of the rights for the current account.
                    $permissions = array_merge($permissions, $this->parseDefinitionRights($definition));
                }
            }
        }

        return $permissions;
    }

    /**
     * Parses a ACE definition list into an array of permission objects.
     *
     * @param string $definition
     *
     * @return array
     */
    protected function parseDefinitionRights($definition)
    {
        $permissions = [];

        // We need to explode the definition in case it contains
        // multiple rights, for example: (GR,GE).
        $rights = explode(',', $definition);

        foreach ($rights as $right) {
            // We'll make sure the right exists inside the definitions
            // array before we try to instantiate it.
            if (array_key_exists($right, static::$definitions)) {
                $permissions[] =  new static::$definitions[$right];
            }
        }

        return $permissions;
    }
}
