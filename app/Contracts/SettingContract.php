<?php

namespace App\Contracts;

/**
 * Interface SettingContract
 * @package App\Contracts
 */
interface SettingContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSetting(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findSettingById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createSetting(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSetting(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteSetting($id);
}
