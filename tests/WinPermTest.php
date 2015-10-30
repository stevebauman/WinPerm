<?php

namespace Stevebauman\WinPerm\Tests;

use Stevebauman\WinPerm\Permission;

class WinPermTestCase extends \PHPUnit_Framework_TestCase
{
    public function testConstructWithoutPath()
    {
        $permission = new Permission();

        $this->assertInstanceOf(Permission::class, $permission);
    }

    public function testConstructWithValidPath()
    {
        new Permission(__DIR__);

        $passes = true;

        $this->assertTrue($passes);
    }

    public function testConstructWithoutValidPath()
    {
        $this->setExpectedException('Stevebauman\WinPerm\Exceptions\FileNotFoundException');

        new Permission('invalid path');
    }
}
