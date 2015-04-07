<?php
namespace Payum\Core\Tests\Bridge\Symfony\Form\Type;

use Payum\Core\Bridge\Symfony\Form\Type\GatewayConfigType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GatewayConfigTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldBeSubClassOfAbstractType()
    {
        $rc = new \ReflectionClass('Payum\Core\Bridge\Symfony\Form\Type\GatewayConfigType');

        $this->assertTrue($rc->isSubclassOf('Symfony\Component\Form\AbstractType'));
    }

    /**
     * @test
     */
    public function couldBeConstructedWithGatewayFactoryRegistryAsFirstArgument()
    {
        new GatewayConfigType($this->getMock('Payum\Core\Registry\GatewayFactoryRegistryInterface'));
    }

    /**
     * @test
     */
    public function shouldExtendFormType()
    {
        $type = new GatewayConfigType($this->getMock('Payum\Core\Registry\GatewayFactoryRegistryInterface'));

        $this->assertEquals('form', $type->getParent());
    }

    /**
     * @test
     */
    public function shouldReturnExpectedName()
    {
        $type = new GatewayConfigType($this->getMock('Payum\Core\Registry\GatewayFactoryRegistryInterface'));

        $this->assertEquals('payum_gateway_config', $type->getName());
    }

    /**
     * @test
     */
    public function shouldAllowResolveOptions()
    {
        $type = new GatewayConfigType($this->getMock('Payum\Core\Registry\GatewayFactoryRegistryInterface'));

        $resolver = new OptionsResolver();

        $type->setDefaultOptions($resolver);

        $options = $resolver->resolve();

        $this->assertArrayHasKey('data_class', $options);
        $this->assertEquals('Payum\Core\Model\GatewayConfig', $options['data_class']);
    }
}
