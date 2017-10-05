<?php

namespace Stevebauman\WinPerm\Tests;

use Stevebauman\WinPerm\WinPerm;

class WinPermTestCase extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function can_be_constructed_without_path()
    {
        $permission = new WinPerm();

        $this->assertInstanceOf(WinPerm::class, $permission);
    }

    /** @test */
    public function valid_path_does_not_throw_exception()
    {
        new WinPerm(__DIR__);

        $passes = true;

        $this->assertTrue($passes);
    }

    /**
     * @test
     * @expectedException \Stevebauman\WinPerm\Exceptions\InvalidPathException
     */
    public function invalid_path_throws_exception()
    {
        new WinPerm('invalid path');
    }
}
