<?php

namespace App\Repositories;

use App\Models\CompanyFact;
use App\Contracts\CompanyFactContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CompanyFactRepository
 *
 * @package \App\Repositories
 */
class CompanyFactRepository extends BaseRepository implements CompanyFactContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * CompanyFactRepository constructor.
     * @param CompanyFact $model
     */
    public function __construct(CompanyFact $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listCompanyFact(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findCompanyFactById(int $id)
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
    public function createCompanyFact(array $params)
    {
        try {
            $collection = collect($params);

            $CompanyFact = new CompanyFact($collection->all());

            $CompanyFact->save();

            return $CompanyFact;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCompanyFact(array $params)
    {
        $CompanyFact = $this->findCompanyFactById($params['id']);

        $collection = collect($params)->except('_token');

        $CompanyFact->update($collection->all());

        return $CompanyFact;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteCompanyFact($id)
    {
        $CompanyFact = $this->findCompanyFactById($id);

        if($CompanyFact->status == '0'){
            $CompanyFact['status']='1';
        }else{
            $CompanyFact['status']='0';
        }
        $CompanyFact->save();

        return $CompanyFact;
    }
}
