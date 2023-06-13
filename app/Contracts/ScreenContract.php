<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:51 PM
 */
namespace App\Contracts;

/**
 * Interface ScreenContract
 * @package App\Contracts
 */
interface ScreenContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listScreen(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findScreenById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createScreen(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateScreen(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteScreen($id);
}
