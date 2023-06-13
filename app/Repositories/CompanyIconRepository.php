<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:52 PM
 */

namespace App\Repositories;

use App\CompanyIcon;
use App\Contracts\CompanyIconContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CompanyIconRepository
 *
 * @package \App\Repositories
 */
class CompanyIconRepository extends BaseRepository implements CompanyIconContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * CompanyIconRepository constructor.
     * @param CompanyIcon $model
     */
    public function __construct(CompanyIcon $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listCompanyIcon(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findCompanyIconById(int $id)
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
    public function createCompanyIcon(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('icon') && ($params['icon'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['icon'], 'CompanyIcon');
                $collection['icon'] = $image;
            }

            $CompanyIcon = new CompanyIcon($collection->all());

            $CompanyIcon->save();

            return $CompanyIcon;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCompanyIcon(array $params)
    {
        $CompanyIcon = $this->findCompanyIconById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('icon') && ($params['icon'] instanceof  UploadedFile)) {

            if ($CompanyIcon->icon != null) {
                $this->deleteOne($CompanyIcon->icon);
            }

            $icon = $this->uploadOne($params['icon'], 'CompanyIcon');
            $collection['icon'] = $icon;
        }

        $CompanyIcon->update($collection->all());

        return $CompanyIcon;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteCompanyIcon($id)
    {
        $CompanyIcon = $this->findCompanyIconById($id);

        $CompanyIcon['status']='0';
        $CompanyIcon->save();

        return $CompanyIcon;
    }
}
