<?php

namespace Payum\Core\Bridge\Symfony\Builder;

use Payum\Core\Bridge\Symfony\Security\HttpRequestVerifier;
use Payum\Core\Security\HttpRequestVerifierInterface;
use Payum\Core\Storage\StorageInterface;

class HttpRequestVerifierBuilder
{
    public function __invoke()
    {
        return call_user_func_array([$this, 'build'], func_get_args());
    }

    /**
     * @return HttpRequestVerifierInterface
     */
    public function build(StorageInterface $tokenStorage)
    {
        return new HttpRequestVerifier($tokenStorage);
    }
}
