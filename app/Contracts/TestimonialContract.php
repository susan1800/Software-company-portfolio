<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:51 PM
 */
namespace App\Contracts;

/**
 * Interface TestimonialContract
 * @package App\Contracts
 */
interface TestimonialContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listTestimonial(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findTestimonialById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createTestimonial(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateTestimonial(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteTestimonial($id);
}
