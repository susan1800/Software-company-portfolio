<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:52 PM
 */

namespace App\Repositories;

use App\Models\GeneralInformation;
use App\Contracts\GeneralInformationContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/** 
 * Class GeneralInformationRepository
 *
 * @package \App\Repositories
 */
class GeneralInformationRepository extends BaseRepository implements GeneralInformationContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * GeneralInformationRepository constructor.
     * @param GeneralInformation $model
     */
    public function __construct(GeneralInformation $model)
    { 
        parent::__construct($model);
        $this->model = $model;
    }


    public function listGeneralInformation(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findGeneralInformationById(int $id)
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
    public function createGeneralInformation(array $params)
    {
        try {
            $collection = collect($params);
            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'GeneralInformation');
                $collection['image'] = $image;
            }
            $GeneralInformation = new GeneralInformation($collection->all());

            $GeneralInformation->save();

            return $GeneralInformation;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateGeneralInformation(array $params)
    {
        $GeneralInformation = $this->findGeneralInformationById($params['id']);


        $collection = collect($params)->except('_token');
        
        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($GeneralInformation->image != null) {
                $this->deleteOne($GeneralInformation->image);
            }

            $image = $this->uploadOne($params['image'], 'GeneralInformation');
            $collection['image'] = $image;
        } 
        $collection['admins_id'] = auth()->id();


        $GeneralInformation->update($collection->all());

        return $GeneralInformation;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteGeneralInformation($id)
    {
        $GeneralInformation = $this->findGeneralInformationById($id);

        $GeneralInformation['status'] = '0';

        $GeneralInformation->save();

        return $GeneralInformation;

    }
}
