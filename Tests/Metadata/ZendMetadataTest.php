<?php

namespace Ladybug\Tests\Plugin\Extra\Metadata;

use Ladybug\Plugin\Extra\Metadata\ZendMetadata;

class ZendMetadataTest extends \PHPUnit_Framework_TestCase
{

    /** @var ZendMetadata */
    protected $metadata;

    public function setUp()
    {
        $this->metadata = new ZendMetadata();
    }

    public function testMetadataForValidValues()
    {
        $className = 'Zend\Authentication\Adapter\Http\Exception';

        $this->assertTrue($this->metadata->hasMetadata($className));

        $metadata = $this->metadata->getMetadata($className);
        $this->assertArrayHasKey('help_link', $metadata);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertEquals('zend', $metadata['icon']);
    }

    public function testMetadataForInvalidValues()
    {
        $className = 'Test\Test';

        $this->assertFalse($this->metadata->hasMetadata($className));

        $metadata = $this->metadata->getMetadata($className);
        $this->assertEmpty($metadata);
    }

}
