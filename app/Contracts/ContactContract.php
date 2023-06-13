<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:51 PM
 */
namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface ContactContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listContact(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findContactById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createContact(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateContact(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteContact($id);
}
