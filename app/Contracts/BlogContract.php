<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:51 PM
 */
namespace App\Contracts;

/**
 * Interface BlogContract
 * @package App\Contracts
 */
interface BlogContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listBlog(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findBlogById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createBlog(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBlog(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteBlog($id);
}
