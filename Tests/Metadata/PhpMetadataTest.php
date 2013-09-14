<?php

namespace Ladybug\Tests\Plugin\Extra\Metadata;

use Ladybug\Plugin\Extra\Metadata\PhpMetadata;

class PhpMetadataTest extends \PHPUnit_Framework_TestCase
{

    /** @var PhpMetadata */
    protected $metadata;

    public function setUp()
    {
        $this->metadata = new PhpMetadata();
    }

    public function testMetadataForValidValues()
    {
        $className = 'DateTime';

        $this->assertTrue($this->metadata->supports($className));

        $metadata = $this->metadata->get($className);
        $this->assertArrayHasKey('help_link', $metadata);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertArrayHasKey('version', $metadata);
        $this->assertEquals(phpversion(), $this->metadata->getVersion());
        $this->assertEquals('php', $metadata['icon']);
    }

    public function testMetadataForInvalidValues()
    {
        $className = 'Test\Test';

        $this->assertFalse($this->metadata->supports($className));

        $metadata = $this->metadata->get($className);
        $this->assertEmpty($metadata);
    }

}
