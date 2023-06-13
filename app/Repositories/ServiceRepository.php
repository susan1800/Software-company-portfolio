<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:52 PM
 */

namespace App\Repositories;

use App\Contracts\ServiceContract;
use App\Models\Service;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ServiceRepository
 *
 * @package \App\Repositories
 */
class ServiceRepository extends BaseRepository implements ServiceContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * ServiceRepository constructor.
     * @param Service $model
     */
    public function __construct(Service $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listService(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findServiceById(int $id)
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
    public function createService(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('icon') && ($params['icon'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['icon'], 'service');
                $collection['icon'] = $image;
            }

            $service = new Service($collection->all());

            $service->save();

            return $service;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateService(array $params)
    {
        $service = $this->findServiceById($params['id']);
        // echo $service;

        $collection = collect($params)->except('_token');

        if ($collection->has('icon') && ($params['icon'] instanceof  UploadedFile)) {

            if ($service->image != null) {
                $this->deleteOne($service->icon);
            }

            $image = $this->uploadOne($params['icon'], 'service');
            $collection['icon'] = $image;
        }

        $service->update($collection->all());

        return $service;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteService($id)
    {
        

        
        $service = $this->findServiceById($id);

        $service['status'] = '0';

        $service->save();

        return $service;
    }
}
