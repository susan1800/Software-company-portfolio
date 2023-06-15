<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface CompanyIconContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCompanyIcon(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCompanyIconById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCompanyIcon(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCompanyIcon(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteCompanyIcon($id);
}
