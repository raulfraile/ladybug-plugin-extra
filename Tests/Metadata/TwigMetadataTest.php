<?php

namespace Ladybug\Tests\Plugin\Extra\Metadata;

use Ladybug\Plugin\Extra\Metadata\TwigMetadata;

class TwigMetadataTest extends \PHPUnit_Framework_TestCase
{

    /** @var TwigMetadata */
    protected $metadata;

    public function setUp()
    {
        $this->metadata = new TwigMetadata();
    }

    public function testMetadataForValidValues()
    {
        $className = 'Twig_Environment';

        $this->assertTrue($this->metadata->supports($className));

        $metadata = $this->metadata->get($className);
        $this->assertArrayHasKey('help_link', $metadata);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertEquals('twig', $metadata['icon']);
    }

    public function testMetadataForInvalidValues()
    {
        $className = 'Test\Test';

        $this->assertFalse($this->metadata->supports($className));

        $metadata = $this->metadata->get($className);
        $this->assertEmpty($metadata);
    }

}
