<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface AboutContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAbout(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findAboutById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createAbout(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAbout(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteAbout($id);
}
