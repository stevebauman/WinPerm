<?php

namespace Stevebauman\WinPerm\Tests;

use Stevebauman\WinPerm\Scanner;

class ScannerTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function can_be_constructed_without_path()
    {
        $scanner = new Scanner('C:\Windows');

        $this->assertInstanceOf(Scanner::class, $scanner);
    }

    /** @test */
    public function valid_path_does_not_throw_exception()
    {
        new Scanner(__DIR__);

        $passes = true;

        $this->assertTrue($passes);
    }

    /**
     * @test
     * @expectedException \Stevebauman\WinPerm\Exceptions\InvalidPathException
     */
    public function invalid_path_throws_exception()
    {
        new Scanner('invalid path');
    }
}
