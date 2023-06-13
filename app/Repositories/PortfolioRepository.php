<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:52 PM
 */

namespace App\Repositories;

use App\Models\Portfolio;
use App\Models\User;
use App\Contracts\PortfolioContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class PortfolioRepository
 *
 * @package \App\Repositories
 */
class PortfolioRepository extends BaseRepository implements PortfolioContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * PortfolioRepository constructor.
     * @param Portfolio $model
     */
    public function __construct(Portfolio $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listPortfolio(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return Portfolio::where('status','1')->get($columns, $order, $sort);


    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findPortfolioById(int $id)
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
    public function createPortfolio(array $params)
    {

        try {
            $collection = collect($params);


            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'portfolio');
                $collection['image'] = $image;
            }

            $portfolio = new Portfolio($collection->all());


            $portfolio->save();

            return $portfolio;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updatePortfolio(array $params)
    {
        $portfolio = $this->findPortfolioById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($portfolio->image != null) {
                $this->deleteOne($portfolio->image);
            }

            $image = $this->uploadOne($params['image'], 'portfolio');
            $collection['image'] = $image;
        }
        $collection['admins_id'] = auth()->id();

        $portfolio->update($collection->all());

        return $portfolio;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deletePortfolio($id)
    {
        $portfolio = $this->findPortfolioById($id);

        $portfolio['status']='0';
        $portfolio->save();

        return $portfolio;
    }
}
