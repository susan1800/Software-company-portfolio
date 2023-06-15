<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface ServiceContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listService(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findServiceById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createService(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateService(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteService($id);
}
