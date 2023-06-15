<?php

namespace App\Repositories;

use App\Models\Home;
use App\Contracts\HomeContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class HomeRepository
 *
 * @package \App\Repositories
 */
class HomeRepository extends BaseRepository implements HomeContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * HomeRepository constructor.
     * @param Home $model
     */
    public function __construct(Home $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listHome(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findHomeById(int $id)
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
    public function createHome(array $params)
    {
        try {
            $collection = collect($params);
            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'home');
                $collection['image'] = $image;
            }
            $home = new Home($collection->all());

            $home->save();

            return $home;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateHome(array $params)
    {
        $Home = Home::find($params['id']);
        // $Home = $this->findHomeById($params['id']);


        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
            $image = $this->uploadOne($params['image'], 'home');
            $collection['image'] = $image;
        }

        $Home->update($collection->all());
        return $Home;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteHome($id)
    {
        $home = $this->findHomeById($id);

        if($home->status == '0'){
            $home['status']='1';
        }else{
            $home['status']='0';
        }

        $home->save();

        return $home;

    }
}
