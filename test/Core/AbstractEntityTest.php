<?php
namespace Pwnraid\Bnet\Test\Core;

use Mockery;
use Pwnraid\Bnet\Core\AbstractEntity;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Core\AbstractEntity
 */
class AbstractEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testAbstractEntity()
    {
        $entity = (new Mockery)->mock('Pwnraid\Bnet\Core\AbstractEntity', [['foo' => 'bar']])->shouldDeferMissing();
        $this->assertSame('bar', $entity->foo);
        $this->assertSame('bar', $entity['foo']);
        $this->assertFalse(isset($entity->baz));
        $this->assertNull($entity->baz);
        $entity->baz = 'qux';
        $this->assertSame('qux', $entity->baz);
        $this->assertTrue(isset($entity->baz));
        unset($entity->baz);
        $this->assertFalse(isset($entity['baz']));
        $this->assertNull($entity['baz']);
        $entity['baz'] = 'qux';
        $this->assertSame('qux', $entity['baz']);
        $this->assertTrue(isset($entity['baz']));
        unset($entity['baz']);
        $this->assertNull($entity->baz);
        $this->assertSame('{"foo":"bar"}', json_encode($entity));
    }
}
