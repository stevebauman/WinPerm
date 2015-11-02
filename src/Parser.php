<?php

namespace Stevebauman\WinPerm;

use Stevebauman\WinPerm\Permissions\Delete;
use Stevebauman\WinPerm\Permissions\Full;
use Stevebauman\WinPerm\Permissions\Modify;
use Stevebauman\WinPerm\Permissions\ReadAndExecute;
use Stevebauman\WinPerm\Permissions\Read;
use Stevebauman\WinPerm\Permissions\ReadControl;
use Stevebauman\WinPerm\Permissions\Write;
use Stevebauman\WinPerm\Permissions\WriteDAC;
use Stevebauman\WinPerm\Permissions\WriteOwner;
use Stevebauman\WinPerm\Permissions\Synchronize;
use Stevebauman\WinPerm\Permissions\AccessSystemSecurity;
use Stevebauman\WinPerm\Permissions\MaximumAllowed;
use Stevebauman\WinPerm\Permissions\GenericRead;
use Stevebauman\WinPerm\Permissions\GenericWrite;
use Stevebauman\WinPerm\Permissions\GenericExecute;
use Stevebauman\WinPerm\Permissions\GenericAll;
use Stevebauman\WinPerm\Permissions\ReadData;
use Stevebauman\WinPerm\Permissions\WriteData;
use Stevebauman\WinPerm\Permissions\AppendData;
use Stevebauman\WinPerm\Permissions\ReadExtendedAttributes;
use Stevebauman\WinPerm\Permissions\WriteExtendedAttributes;
use Stevebauman\WinPerm\Permissions\Execute;
use Stevebauman\WinPerm\Permissions\DeleteChild;
use Stevebauman\WinPerm\Permissions\ReadAttributes;
use Stevebauman\WinPerm\Permissions\WriteAttributes;
use Stevebauman\WinPerm\Permissions\ObjectInherit;
use Stevebauman\WinPerm\Permissions\ContainerInherit;
use Stevebauman\WinPerm\Permissions\InheritOnly;
use Stevebauman\WinPerm\Permissions\NoPropagation;

class Parser
{
    /**
     * The output of the resulting permission command.
     *
     * @var array
     */
    protected $output = [];

    /**
     * The permissions definition for parsing.
     *
     * @var array
     */
    protected $definitions = [
        'F'     => Full::class,
        'M'     => Modify::class,
        'RX'    => ReadAndExecute::class,
        'R'     => Read::class,
        'W'     => Write::class,
        'D'     => Delete::class,
        'RC'    => ReadControl::class,
        'WDAC'  => WriteDAC::class,
        'WO'    => WriteOwner::class,
        'S'     => Synchronize::class,
        'AS'    => AccessSystemSecurity::class,
        'MA'    => MaximumAllowed::class,
        'GR'    => GenericRead::class,
        'GW'    => GenericWrite::class,
        'GE'    => GenericExecute::class,
        'GA'    => GenericAll::class,
        'RD'    => ReadData::class,
        'WD'    => WriteData::class,
        'AD'    => AppendData::class,
        'REA'   => ReadExtendedAttributes::class,
        'WEA'   => WriteExtendedAttributes::class,
        'X'     => Execute::class,
        'DC'    => DeleteChild::class,
        'RA'    => ReadAttributes::class,
        'WA'    => WriteAttributes::class,
        'OI'    => ObjectInherit::class,
        'CI'    => ContainerInherit::class,
        'IO'    => InheritOnly::class,
        'NP'    => NoPropagation::class,
    ];

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
            $account = $this->parseAccount($account);

            if ($account instanceof Account) {
                // We'll double check the resulting account is an
                // instance of the Account object before
                // adding it to the results array.
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

            $account->setPermissions($this->parseAccessControlList($parts[1]));

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
            if (array_key_exists($right, $this->definitions)) {
                $permissions[] =  new $this->definitions[$right];
            }
        }

        return $permissions;
    }
}
