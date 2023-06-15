<?php

namespace App\Contracts;

/**
 * Interface GeneralInformationContract
 * @package App\Contracts
 */
interface GeneralInformationContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listGeneralInformation(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findGeneralInformationById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createGeneralInformation(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateGeneralInformation(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteGeneralInformation($id);
}
