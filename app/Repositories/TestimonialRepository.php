<?php

namespace App\Repositories;

use App\Models\Testimonial;
use App\Contracts\TestimonialContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class testimonialRepository
 *
 * @package \App\Repositories
 */
class TestimonialRepository extends BaseRepository implements TestimonialContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * testimonialRepository constructor.
     * @param testimonial $model
     */
    public function __construct(Testimonial $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listTestimonial(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findTestimonialById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function createtestimonial(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'testimonial');
                $collection['image'] = $image;
            }

            $testimonial = new testimonial($collection->all());

            $testimonial->save();

            return $testimonial;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateTestimonial(array $params)
    {
        $testimonial = $this->findtestimonialById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($testimonial->image != null) {
                $this->deleteOne($testimonial->image);
            }

            $image = $this->uploadOne($params['image'], 'testimonial');
            $collection['image'] = $image;
        }

        $testimonial->update($collection->all());

        return $testimonial;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteTestimonial($id)
    {
        $testimonial = $this->findtestimonialById($id);

        if($testimonial->status == '0'){
            $testimonial['status']='1';
        }else{
            $testimonial['status']='0';
        }

        $testimonial->save();

        return $testimonial;
    }
}
