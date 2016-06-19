<?php

namespace Pwnraid\Bnet\Test;

use Mockery;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        if(class_exists('Mockery')) {
            Mockery::close();
        }
    }
}