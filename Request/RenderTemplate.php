<?php

namespace Payum\Core\Request;

use InvalidArgumentException;

class RenderTemplate
{
    /**
     * @var string
     */
    protected $templateName;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var string
     */
    protected $result = '';

    /**
     * @param string $templateName
     */
    public function __construct($templateName, array $parameters = [])
    {
        $this->templateName = $templateName;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function setParameter($name, $value): void
    {
        $this->parameters[$name] = $value;
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function addParameter($name, $value): void
    {
        if (array_key_exists($name, $this->parameters)) {
            throw new InvalidArgumentException(sprintf('Parameter with given name "%s" already exists', $name));
        }

        $this->parameters[$name] = $value;
    }
}
