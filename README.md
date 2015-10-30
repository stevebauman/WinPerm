# WinPerm
A Windows File / Folder Permission Parser.

## Description

WinPerm allows you to view the permissions on 

## Requirements

- PHP 5.5 or greater
- `exec()` permissions
- Access to the `icacls` command
- A Windows hosted server

## Installation

Install WinPerm through composer. Insert this into your `composer.json` dependencies:

    "stevebauman/winperm": "1.0.*"

Then run `composer update`.

## Usage

Create a new `Stevebauman\WinPerm\Permission` instance with the folder / file path you'd like to verify:

```php
$permission = new \Stevebauman\WinPerm\Permission();

try {
    $path = 'C:\\Windows\System32';
    
    $permission->setPath($path);
    
    $results = $permission->check();
    
    foreach ($results as $account) {
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
    
    var_dump($results[0]); // Will return instance of \Stevebauman\WinPerm\Account
    
} catch (\Stevebauman\WinPerm\Exceptions\FileNotFoundException $e) {
    //
}
```
