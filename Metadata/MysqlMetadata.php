<?php
/*
 * Ladybug: Simple and Extensible PHP Dumper
 *
 * Processor / AuraMetadata
 *
 * (c) Raúl Fraile Beneyto <raulfraile@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ladybug\Plugin\Extra\Metadata;

use Ladybug\Metadata\MetadataInterface;
use Ladybug\Metadata\AbstractMetadata;

class MysqlMetadata extends AbstractMetadata
{

    const ICON = 'mysql';
    //const URL = 'http://auraphp.github.io/Aura.%component%/version/%version%/api/classes/%class%.html';

    protected $resources = array(

    );

    public function __construct()
    {
        $this->version = '1.1.0';
    }

    public function supports($id, $type = MetadataInterface::TYPE_CLASS)
    {
        return 'mysql' === substr($id, 0, 5) && MetadataInterface::TYPE_RESOURCE === $type;
    }

    public function get($id, $type = MetadataInterface::TYPE_CLASS)
    {
        if ($this->supports($id, $type)) {
            return array(
                'icon' => self::ICON,
                'version' => $this->version
            );
        }

        return array();
    }

}
