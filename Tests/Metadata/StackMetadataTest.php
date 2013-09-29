<?php

namespace Ladybug\Tests\Plugin\Extra\Metadata;

use Ladybug\Plugin\Extra\Metadata\StackMetadata;
use Ladybug\Model\VariableWrapper;
use \Mockery as m;

class StackMetadataTest extends \PHPUnit_Framework_TestCase
{

    /** @var StackMetadata */
    protected $metadata;

    public function setUp()
    {
        $this->metadata = new StackMetadata();
    }

    public function testMetadataForValidValues()
    {
        $className = 'Stack\Builder';
        $data = new VariableWrapper($className, m::mock($className));

        $this->assertTrue($this->metadata->supports($data));

        $metadata = $this->metadata->get($data);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertEquals('stack', $metadata['icon']);
    }

    public function testMetadataForInvalidValues()
    {
        $data = new VariableWrapper('\stdClass', new \stdClass());

        $this->assertFalse($this->metadata->supports($data));

        $metadata = $this->metadata->get($data);
        $this->assertEmpty($metadata);
    }

}
