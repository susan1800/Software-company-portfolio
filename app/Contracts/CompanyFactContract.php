<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface CompanyFactContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCompanyFact(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCompanyFactById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCompanyFact(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCompanyFact(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteCompanyFact($id);
}
