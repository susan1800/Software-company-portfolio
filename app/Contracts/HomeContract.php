<?php

namespace App\Contracts;

/**
 * Interface HomeContract
 * @package App\Contracts
 */
interface HomeContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listHome(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findHomeById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createHome(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateHome(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteHome($id);
}
