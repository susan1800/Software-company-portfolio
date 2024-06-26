<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface SubscriptionContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSubscription(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findSubscriptionById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createSubscription(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSubscription(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteSubscription($id);
}
