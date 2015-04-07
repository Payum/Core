<?php
namespace Payum\Core\Tests\Bridge\Symfony\Form\Type;

use Payum\Core\Bridge\Symfony\Form\Type\GatewayFactoriesChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GatewayFactoriesChoiceTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldBeSubClassOfAbstractType()
    {
        $rc = new \ReflectionClass('Payum\Core\Bridge\Symfony\Form\Type\GatewayFactoriesChoiceType');

        $this->assertTrue($rc->isSubclassOf('Symfony\Component\Form\AbstractType'));
    }

    /**
     * @test
     */
    public function couldBeConstructedWithDefaultFactoriesAsFirstArgument()
    {
        new GatewayFactoriesChoiceType(array('foo' => 'Foo Factory'));
    }

    /**
     * @test
     */
    public function shouldExtendChoice()
    {
        $type = new GatewayFactoriesChoiceType(array());

        $this->assertEquals('choice', $type->getParent());
    }

    /**
     * @test
     */
    public function shouldReturnExpectedName()
    {
        $type = new GatewayFactoriesChoiceType(array());

        $this->assertEquals('payum_gateway_factories_choice', $type->getName());
    }

    /**
     * @test
     */
    public function shouldAllowResolveOptions()
    {
        $expectedChoices = array(
            'foo' => 'Foo Factory',
            'bar' => 'Bar Factory',
        );

        $type = new GatewayFactoriesChoiceType($expectedChoices);

        $resolver = new OptionsResolver();

        $type->setDefaultOptions($resolver);

        $options = $resolver->resolve();

        $this->assertArrayHasKey('choices', $options);
        $this->assertEquals($expectedChoices, $options['choices']);
    }
}
