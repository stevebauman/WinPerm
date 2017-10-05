<?php

namespace Stevebauman\WinPerm\Tests;

use Stevebauman\WinPerm\Permission;

class WinPermTestCase extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function can_be_constructed_without_path()
    {
        $permission = new Permission();

        $this->assertInstanceOf(Permission::class, $permission);
    }

    /** @test */
    public function valid_path_does_not_throw_exception()
    {
        new Permission(__DIR__);

        $passes = true;

        $this->assertTrue($passes);
    }

    /**
     * @test
     * @expectedException \Stevebauman\WinPerm\Exceptions\InvalidPathException
     */
    public function invalid_path_throws_exception()
    {
        new Permission('invalid path');
    }
}
