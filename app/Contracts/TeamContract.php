<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:51 PM
 */
namespace App\Contracts;

/**
 * Interface TeamContract
 * @package App\Contracts
 */
interface TeamContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listTeam(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findTeamById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createTeam(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateTeam(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteTeam($id);
}
