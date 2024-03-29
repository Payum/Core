<?php

namespace Payum\Core\Storage;

use Payum\Core\Exception\InvalidArgumentException;

interface StorageInterface
{
    /**
     * @return object
     */
    public function create();

    /**
     * @param object $model
     *
     * @return boolean
     */
    public function support($model);

    /**
     * @param object $model
     *
     * @throws InvalidArgumentException if not supported model given.
     */
    public function update($model);

    /**
     * @param object $model
     *
     * @throws InvalidArgumentException if not supported model given.
     */
    public function delete($model);

    /**
     * @param mixed|IdentityInterface $id
     *
     * @return object|null
     */
    public function find($id);

    /**
     * @return object[]
     */
    public function findBy(array $criteria);

    /**
     * @param object $model
     *
     * @throws InvalidArgumentException if not supported model given.
     *
     * @return IdentityInterface
     */
    public function identify($model);
}
