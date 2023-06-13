<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:52 PM
 */

namespace App\Repositories;

use App\Models\Screen;
use App\Contracts\ScreenContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/** 
 * Class ScreenRepository
 *
 * @package \App\Repositories
 */
class ScreenRepository extends BaseRepository implements ScreenContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * ScreenRepository constructor.
     * @param Screen $model
     */
    public function __construct(Screen $model)
    { 
        parent::__construct($model);
        $this->model = $model;
    }


    public function listScreen(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findScreenById(int $id)
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
    public function createScreen(array $params)
    {
        try {
            $collection = collect($params);
            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'screen');
                $collection['image'] = $image;
            }
            $Screen = new Screen($collection->all());

            $Screen->save();

            return $Screen;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateScreen(array $params)
    {
        $Screen = $this->findScreenById($params['id']);


        $collection = collect($params)->except('_token');
        
        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($Screen->image != null) {
                $this->deleteOne($Screen->image);
            }

            $image = $this->uploadOne($params['image'], 'screen');
            $collection['image'] = $image;
        } 
        $collection['admins_id'] = auth()->id();


        $Screen->update($collection->all());

        return $Screen;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteScreen($id)
    {
        $Screen = $this->findScreenById($id);

        $Screen['status'] = '0';

        $Screen->save();

        return $Screen;

    }
}
