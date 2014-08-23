<?php
namespace Pwnraid\Bnet\Test;

use Pwnraid\Bnet\Region;

class RegionTest extends \PHPUnit_Framework_TestCase
{
    public function testSomething()
    {
        var_dump(Region::$hosts);
        var_dump(Region::$locales);
    }
}
