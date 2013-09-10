<?php

namespace Ladybug\Tests\Plugin\Extra\Metadata;

use Ladybug\Plugin\Extra\Metadata\DoctrineMetadata;

class DoctrineMetadataTest extends \PHPUnit_Framework_TestCase
{

    /** @var DoctrineMetadata */
    protected $metadata;

    public function setUp()
    {
        $this->metadata = new DoctrineMetadata();
    }

    public function testMetadataForDoctrineOrm()
    {
        $className = 'Doctrine\ORM\EntityManager';

        $this->assertTrue($this->metadata->hasMetadata($className));

        $metadata = $this->metadata->getMetadata($className);
        $this->assertArrayHasKey('help_link', $metadata);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertArrayHasKey('version', $metadata);
        $this->assertEquals('doctrine', $metadata['icon']);
    }

    public function testMetadataForDoctrineDbal()
    {
        $className = 'Doctrine\DBAL\Driver\Connection';

        $this->assertTrue($this->metadata->hasMetadata($className));

        $metadata = $this->metadata->getMetadata($className);
        $this->assertArrayHasKey('help_link', $metadata);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertArrayHasKey('version', $metadata);
        $this->assertEquals('doctrine', $metadata['icon']);
    }

    public function testMetadataForDoctrineOdm()
    {
        $className = 'Doctrine\ODM\MongoDB';

        $this->assertTrue($this->metadata->hasMetadata($className));

        $metadata = $this->metadata->getMetadata($className);
        $this->assertArrayHasKey('help_link', $metadata);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertArrayHasKey('version', $metadata);
        $this->assertEquals('doctrine', $metadata['icon']);
    }

    public function testMetadataForDoctrineCommon()
    {
        $className = 'Doctrine\Common\Collections\ArrayCollection';

        $this->assertTrue($this->metadata->hasMetadata($className));

        $metadata = $this->metadata->getMetadata($className);
        $this->assertArrayHasKey('help_link', $metadata);
        $this->assertArrayHasKey('icon', $metadata);
        $this->assertArrayHasKey('version', $metadata);
        $this->assertEquals('doctrine', $metadata['icon']);
    }

    public function testMetadataForInvalidValues()
    {
        $className = 'Test\Test';

        $this->assertFalse($this->metadata->hasMetadata($className));

        $metadata = $this->metadata->getMetadata($className);
        $this->assertEmpty($metadata);
    }

}
