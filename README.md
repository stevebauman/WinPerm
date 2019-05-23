# WinPerm

[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/stevebauman/winperm/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/stevebauman/winperm/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/stevebauman/winperm.svg?style=flat-square)](https://packagist.org/packages/stevebauman/winperm)
[![License](https://img.shields.io/packagist/l/stevebauman/winperm.svg?style=flat-square)](https://packagist.org/packages/stevebauman/winperm)

A Windows File / Folder Permission Parser.

## Description

WinPerm allows you to view the permissions on files and folders on the Windows OS.

## Requirements

- PHP 5.5 or greater
- `exec()` permissions
- Access to the `icacls` command
- A Windows hosted server

## Installation

Install WinPerm through composer. Insert this into your `composer.json` dependencies:

    "stevebauman/winperm": "2.0.*"

Then run `composer update`.

## Usage

Create a new `Stevebauman\WinPerm\Scanner` instance, and then set the path by calling `setPath($path)`:

### Retrieving Accounts

```php
$scanner = new \Stevebauman\WinPerm\Scanner();

try {
    $path = 'C:\\Windows\System32';
    
    $scanner->setPath($path);
    
    $accounts = $scanner->getAccounts();
    
    foreach ($accounts as $account) {
        // Returns the accounts name, ex: 'BUILTIN\Administrators'
        echo $account->getName();
        
        // Get the accounts permissions.
        $permissions = $account->getPermissions();
        
        foreach ($permissions as $permission) {
            // Returns the ACE definition of the permission, ex: 'F'
            echo $permission->getDefinition();
            
            // Echo the object to retrieve the full name, ex: 'Full Access'
            echo $permission;
        }
    }
    
} catch (\Stevebauman\WinPerm\Exceptions\InvalidPathException $e) {
    // Uh oh, it looks like the path doesn't exist!
}
```

### Retrieving ID

Windows utilizes unique identifiers for files and folders that does not change when it is moved or modified.

To retrieve this unique ID, call the `getId()` method:

```php
$scanner = new \Stevebauman\WinPerm\Scanner();

try {
    $path = 'C:\\Windows\System32';
    
    $scanner->setPath($path);
    
    echo $scanner->getId(); // Returns '0x0000000000000000001200000001b1t7'
    
} catch (\Stevebauman\WinPerm\Exceptions\InvalidPathException $e) {
    // Uh oh, it looks like the path doesn't exist!
}
```

## Usage (Network Drive)

To use WinPerm with a network drive, simply mount the drive with a system account before setting your path:

```php
use Stevebauman\WinPerm\Scanner;

$drive = 'Z';
$path = '\\\\server\\folder';
$username = 'ACME\\administrator';
$password = 'Password1';

$command = sprintf('net use %s: %s %s /user:%s /persistent:no', $drive, $path, $password, $username);

system($command);

$scanner = new Scanner('Z:\\HR');

$accounts = $scanner->getAccounts();
```
