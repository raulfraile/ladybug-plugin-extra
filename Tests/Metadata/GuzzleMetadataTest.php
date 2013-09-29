<?php

namespace Ladybug\Tests\Plugin\Extra\Metadata;

use Ladybug\Plugin\Extra\Metadata\GuzzleMetadata;
use Ladybug\Model\VariableWrapper;
use \Mockery as m;

class GuzzleMetadataTest extends \PHPUnit_Framework_TestCase
{

    /** @var GuzzleMetadata */
    protected $metadata;

    public function setUp()
    {
        $this->metadata = new GuzzleMetadata();
    }

    public function testMetadataForValidValues()
    {
        $className = 'Guzzle\Http\Client';
        $data = new VariableWrapper($className, m::mock($className));

        $this->assertTrue($this->metadata->supports($data));

        $metadata = $this->metadata->get($data);
        $this->assertArrayHasKey('help_link', $metadata);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertEquals('http://guzzlephp.org/api/class-Guzzle.Http.Client.html', $metadata['help_link']);
        $this->assertEquals('guzzle', $metadata['icon']);
    }

    public function testMetadataForInvalidValues()
    {
        $data = new VariableWrapper('\stdClass', new \stdClass());

        $this->assertFalse($this->metadata->supports($data));

        $metadata = $this->metadata->get($data);
        $this->assertEmpty($metadata);
    }

}
