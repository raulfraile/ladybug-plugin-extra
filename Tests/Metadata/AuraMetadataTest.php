<?php

namespace Ladybug\Tests\Plugin\Extra\Metadata;

use Ladybug\Plugin\Extra\Metadata\AuraMetadata;

class AuraMetadataTest extends \PHPUnit_Framework_TestCase
{

    /** @var AuraMetadata */
    protected $metadata;

    public function setUp()
    {
        $this->metadata = new AuraMetadata();
    }

    public function testMetadataForValidValues()
    {
        $className = 'Aura\DI';

        $this->assertTrue($this->metadata->supports($className));

        $metadata = $this->metadata->get($className);
        $this->assertArrayHasKey('help_link', $metadata);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertArrayHasKey('version', $metadata);
        $this->assertEquals('aura', $metadata['icon']);
    }

    public function testMetadataForInvalidValues()
    {
        $className = 'Test\Test';

        $this->assertFalse($this->metadata->supports($className));

        $metadata = $this->metadata->get($className);
        $this->assertEmpty($metadata);
    }

}
