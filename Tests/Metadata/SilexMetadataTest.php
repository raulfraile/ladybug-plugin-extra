<?php

namespace Ladybug\Tests\Plugin\Extra\Metadata;

use Ladybug\Plugin\Extra\Metadata\SilexMetadata;

class SilexMetadataTest extends \PHPUnit_Framework_TestCase
{

    /** @var SilexMetadata */
    protected $metadata;

    public function setUp()
    {
        $this->metadata = new SilexMetadata();
    }

    public function testMetadataForValidValues()
    {
        $className = 'Silex\Application';

        $this->assertTrue($this->metadata->supports($className));

        $metadata = $this->metadata->get($className);
        $this->assertArrayHasKey('help_link', $metadata);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertEquals('silex', $metadata['icon']);
    }

    public function testMetadataForInvalidValues()
    {
        $className = 'Test\Test';

        $this->assertFalse($this->metadata->supports($className));

        $metadata = $this->metadata->get($className);
        $this->assertEmpty($metadata);
    }

}
