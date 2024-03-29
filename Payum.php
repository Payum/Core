<?php

namespace Payum\Core;

use Payum\Core\Registry\RegistryInterface;
use Payum\Core\Security\GenericTokenFactoryInterface;
use Payum\Core\Security\HttpRequestVerifierInterface;
use Payum\Core\Storage\StorageInterface;

class Payum implements RegistryInterface
{
    /**
     * @var RegistryInterface
     */
    protected $registry;

    /**
     * @var HttpRequestVerifierInterface
     */
    protected $httpRequestVerifier;

    /**
     * @var GenericTokenFactoryInterface
     */
    protected $tokenFactory;

    /**
     * @var StorageInterface
     */
    protected $tokenStorage;

    public function __construct(
        RegistryInterface $registry,
        HttpRequestVerifierInterface $httpRequestVerifier,
        GenericTokenFactoryInterface $tokenFactory,
        StorageInterface $tokenStorage
    ) {
        $this->registry = $registry;
        $this->httpRequestVerifier = $httpRequestVerifier;
        $this->tokenFactory = $tokenFactory;
        $this->tokenStorage = $tokenStorage;
    }

    public function getGatewayFactory($name)
    {
        return $this->registry->getGatewayFactory($name);
    }

    public function getGatewayFactories()
    {
        return $this->registry->getGatewayFactories();
    }

    public function getGateway($name)
    {
        return $this->registry->getGateway($name);
    }

    public function getGateways()
    {
        return $this->registry->getGateways();
    }

    public function getStorage($class)
    {
        return $this->registry->getStorage($class);
    }

    public function getStorages()
    {
        return $this->registry->getStorages();
    }

    /**
     * @return HttpRequestVerifierInterface
     */
    public function getHttpRequestVerifier()
    {
        return $this->httpRequestVerifier;
    }

    /**
     * @return GenericTokenFactoryInterface
     */
    public function getTokenFactory()
    {
        return $this->tokenFactory;
    }

    /**
     * @return StorageInterface
     */
    public function getTokenStorage()
    {
        return $this->tokenStorage;
    }
}
