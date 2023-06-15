<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Contracts\SettingContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class SettingRepository
 *
 * @package \App\Repositories
 */
class SettingRepository extends BaseRepository implements SettingContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * SettingRepository constructor.
     * @param Setting $model
     */
    public function __construct(Setting $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listSetting(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findSettingById(int $id)
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
    public function createSetting(array $params)
    {
        try {
            $collection = collect($params);
            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'Setting');
                $collection['image'] = $image;
            }
            $Setting = new Setting($collection->all());

            $Setting->save();

            return $Setting;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSetting(array $params)
    {

        $Setting = Setting::find($params['id']);
        // $Setting = $this->findSettingById($params['id']);


        $collection = collect($params)->except('_token');
        // dd($collection);

        if ($collection->has('logo') && ($params['logo'] instanceof  UploadedFile)) {
            $logo = $this->uploadOne($params['logo'], 'setting');

            $collection['logo'] = $logo;
        }else{

            $collection['logo'] = $Setting->logo;
        }


        if ($collection->has('fav_icon') && ($params['fav_icon'] instanceof  UploadedFile)) {
            $fav_icon = $this->uploadOne($params['fav_icon'], 'setting');
            $collection['fav_icon'] = $fav_icon;
        }else{
            $collection['fav_icon'] = $Setting->fav_icon;
        }
// dd($collection);

        $Setting->update($collection->all());
        return $Setting;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteSetting($id)
    {
        $Setting = $this->findSettingById($id);

        if($Setting->status == '0'){
            $Setting['status']='1';
        }else{
            $Setting['status']='0';
        }

        $Setting->save();

        return $Setting;

    }
}
