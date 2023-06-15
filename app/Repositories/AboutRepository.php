<?php

namespace App\Repositories;

use App\About;
use App\Contracts\AboutContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class AboutRepository
 *
 * @package \App\Repositories
 */
class AboutRepository extends BaseRepository implements AboutContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * AboutRepository constructor.
     * @param About $model
     */
    public function __construct(About $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listAbout(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findAboutById(int $id)
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
    public function createAbout(array $params)
    {
        try {
            $collection = collect($params);
            echo $collection['title'];
            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'about');
                $collection['image'] = $image;
            }

            $about = new About();
            $about['title']=$collection['title'];
            $about['details']=$collection['details'];
            $about['facebook']=$collection['facebook'];
            $about['linkedin']=$collection['linkedin'];
            $about['twitter']=$collection['twitter'];
            $about['github']=$collection['github'];
            $about['image']=$collection['image'];
            $about['status']=$collection['status'];



            $about->save();

            return $about;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAbout(array $params)
    {
        $about = $this->findAboutById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($about->image != null) {
                $this->deleteOne($about->image);
            }

            $image = $this->uploadOne($params['image'], 'about');
            $collection['image'] = $image;
        }
        else{
            $collection['image'] =$about->image;
        }
        $about['title']=$collection['title'];
        $about['details']=$collection['details'];
        $about['facebook']=$collection['facebook'];
        $about['linkedin']=$collection['linkedin'];
        $about['twitter']=$collection['twitter'];
        $about['github']=$collection['github'];
        $about['image']=$collection['image'];
        $about->update();

        return $about;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteAbout($id)
    {
        $about = $this->findAboutById($id);
        if($about->status == '0'){
            $about['status']='1';
        }else{
            $about['status']='0';
        }


        $about->save();

        return $about;
    }
}
