<?php
namespace Pwnraid\Bnet\Test;

use Pwnraid\Bnet\Region;

class RegionTest extends \PHPUnit_Framework_TestCase
{
    public function testRegion()
    {
        $region = new Region(Region::EUROPE);
        $this->assertSame('en_GB', $region->getLocale());
        $this->assertSame('https://eu.api.battle.net/wow/', $region->getHost('wow'));
    }
}
