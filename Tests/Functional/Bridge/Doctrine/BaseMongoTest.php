<?php
namespace Payum\Core\Tests\Functional\Bridge\Doctrine;

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Persistence\Mapping\Driver\MappingDriver;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Types\Type;

abstract class BaseMongoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DocumentManager
     */
    protected $dm;

    public function setUp()
    {
        Type::hasType('object') ?
            Type::overrideType('object', 'Payum\Core\Bridge\Doctrine\Types\ObjectType') :
            Type::addType('object', 'Payum\Core\Bridge\Doctrine\Types\ObjectType')
        ;

        $config = new Configuration();
        $config->setProxyDir(\sys_get_temp_dir());
        $config->setProxyNamespace('PayumTestsProxies');
        $config->setHydratorDir(\sys_get_temp_dir());
        $config->setHydratorNamespace('PayumTestsHydrators');
        $config->setMetadataDriverImpl($this->getMetadataDriverImpl($config));
        $config->setMetadataCacheImpl(new ArrayCache());
        $config->setDefaultDB('payum_tests');

        $connection = new Connection(null, array(), $config);

        $this->dm = DocumentManager::create($connection, $config);

        foreach ($this->dm->getConnection()->selectDatabase('payum_tests')->listCollections() as $collection) {
            $collection->drop();
        }
    }

    /**
     * @param Configuration $config
     *
     * @return MappingDriver
     */
    abstract protected function getMetadataDriverImpl();
}
