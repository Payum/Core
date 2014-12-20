<?php
namespace Payum\Core\Exception\Http;

use Buzz\Message\Response;
use Buzz\Message\Request;
use Payum\Core\Exception\RuntimeException;

class HttpException extends RuntimeException implements HttpExceptionInterface
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * {@inheritDoc}
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * {@inheritDoc}
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    /**
     * {@inheritDoc}
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return HttpException
     */
    public static function factory(Request $request, Response $response)
    {
        if ($response->isClientError()) {
            $label = 'Client error response';
        } elseif ($response->isServerError()) {
            $label = 'Server error response';
        } else {
            $label = 'Unsuccessful response';
        }

        $message = implode(PHP_EOL, array(
            $label,
            '[status code] '.$response->getStatusCode(),
            '[reason phrase] '.$response->getReasonPhrase(),
            '[url] '.$request->getUrl(),
        ));

        $e = new static($message, $response->getStatusCode());
        $e->setResponse($response);
        $e->setRequest($request);

        return $e;
    }
}
