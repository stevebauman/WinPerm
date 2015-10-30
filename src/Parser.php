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

    public function generate()
    {
        $results = [];

        foreach ($this->output as $account) {
            $results[] = $this->parseAccount($account);
        }

        return $results;
    }

    protected function parseAccount($account)
    {
        $users = [];

        // Separate the account by it's account and permission list, for example:
        // BUILTIN\Administrators:(OI)(CI)(F)
        $parts = explode(':', trim($account));

        // We should receive exactly two parts of a permission
        // listing, otherwise we'll return null.
        if (count($parts) === 2) {
            $users[$parts[0]] = $this->parseAccessControlList($parts[1]);
        }

        return $users;
    }

    protected function parseAccessControlList($list)
    {
        $permissions = [];

        preg_match_all('/\((.*?)\)/', $list, $matches);

        if (is_array($matches) && count($matches) > 0) {
            if (array_key_exists(1, $matches) && is_array($matches[1])) {
                foreach ($matches[1] as $definition) {
                    if (array_key_exists($definition, $this->definitions)) {
                        $permissions[] =  new $this->definitions[$definition];
                    }
                }
            }
        }

        return $permissions;
    }
}
