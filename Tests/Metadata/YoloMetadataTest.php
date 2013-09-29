<?php

namespace Ladybug\Tests\Plugin\Extra\Metadata;

use Ladybug\Plugin\Extra\Metadata\YoloMetadata;
use Ladybug\Model\VariableWrapper;
use \Mockery as m;

class YoloMetadataTest extends \PHPUnit_Framework_TestCase
{

    /** @var YoloMetadata */
    protected $metadata;

    public function setUp()
    {
        $this->metadata = new YoloMetadata();
    }

    public function testMetadataForValidValues()
    {
        $className = 'Yolo\Application';
        $data = new VariableWrapper($className, m::mock($className));

        $this->assertTrue($this->metadata->supports($data));

        $metadata = $this->metadata->get($data);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertEquals('yolo', $metadata['icon']);
    }

    public function testMetadataForInvalidValues()
    {
        $data = new VariableWrapper('\stdClass', new \stdClass());

        $this->assertFalse($this->metadata->supports($data));

        $metadata = $this->metadata->get($data);
        $this->assertEmpty($metadata);
    }

}
