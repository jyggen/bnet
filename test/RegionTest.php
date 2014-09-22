<?php
namespace Pwnraid\Bnet\Test;

use Pwnraid\Bnet\Region;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Region
 */
class RegionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getApiHost
     * @covers ::getLocale
     * @covers ::getOAuthHost
     */
    public function testRegion()
    {
        $region = new Region(Region::EUROPE, 'fr_FR');
        $this->assertSame('fr_FR', $region->getLocale());
        $this->assertSame('https://eu.api.battle.net/wow/', $region->getApiHost('wow'));
        $this->assertSame('https://eu.battle.net/', $region->getOAuthHost('wow'));
    }

    /**
     * @covers ::__construct
     * @covers ::getApiHost
     * @covers ::getLocale
     * @covers ::getOAuthHost
     */
    public function testDefaultLocale()
    {
        $region = new Region(Region::EUROPE);
        $this->assertSame('en_GB', $region->getLocale());
        $this->assertSame('https://eu.api.battle.net/wow/', $region->getApiHost('wow'));
        $this->assertSame('https://eu.battle.net/', $region->getOAuthHost('wow'));
    }

    /**
     * @covers                   ::__construct
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage invalid is not a valid region
     */
    public function testInvalidRegion()
    {
        new Region('invalid');
    }

    /**
     * @covers                   ::__construct
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage invalid is not a valid locale
     */
    public function testInvalidLocale()
    {
        new Region(Region::EUROPE, 'invalid');
    }
}
