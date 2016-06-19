<?php
namespace Pwnraid\Bnet\Test;

use Pwnraid\Bnet\Region;

class RegionTest extends \PHPUnit_Framework_TestCase
{
    protected $region;

    public function setUp()
    {
        parent::setUp();

        $this->region = new Region(Region::EUROPE, 'fr_FR');
    }

    /**
     * @test
     */
    public function it_can_transform_the_region_url()
    {
        $this->assertSame('fr_FR', $this->region->getLocale());
        $this->assertSame('https://eu.api.battle.net/wow/', $this->region->getApiHost('wow'));
        $this->assertSame('https://eu.battle.net/', $this->region->getOAuthHost('wow'));
    }

    /**
     * @test
     */
    public function it_can_have_a_default_locale()
    {
        $region = new Region(Region::EUROPE);
        $this->assertSame('en_GB', $region->getLocale());
        $this->assertSame('https://eu.api.battle.net/wow/', $region->getApiHost('wow'));
        $this->assertSame('https://eu.battle.net/', $region->getOAuthHost('wow'));
    }

    /**
     * @test
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage invalid is not a valid region
     */
    public function it_throws_exception_if_invalid_region_is_provided()
    {
        new Region('invalid');
    }

    /**
     * @test
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage invalid is not a valid locale
     */
    public function it_throws_exception_if_invalid_locale_is_provided()
    {
        new Region(Region::EUROPE, 'invalid');
    }

    /**
     * @test
     */
    public function it_can_give_all_available_regions()
    {
        $this->assertInternalType('array', Region::all());
        $this->assertSame('https://eu.api.battle.net/%s/', Region::all()[Region::EUROPE]['hosts']['api']);
    }
}
