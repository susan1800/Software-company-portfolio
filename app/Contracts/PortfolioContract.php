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
interface PortfolioContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listPortfolio(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findPortfolioById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createPortfolio(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updatePortfolio(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deletePortfolio($id);
}
