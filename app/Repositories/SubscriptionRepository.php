<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:52 PM
 */

namespace App\Repositories;

use App\Models\Subscription;
use App\Contracts\SubscriptionContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class SubscriptionRepository
 *
 * @package \App\Repositories
 */
class SubscriptionRepository extends BaseRepository implements SubscriptionContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * SubscriptionRepository constructor.
     * @param Subscription $model
     */
    public function __construct(Subscription $model)
    { 
        parent::__construct($model);
        $this->model = $model;
    }


    public function listSubscription(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findSubscriptionById(int $id)
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
    public function createSubscription(array $params)
    {
        try {
            $collection = collect($params);
            $subscription = new Subscription($collection->all());

            $subscription->save();

            return $subscription;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSubscription(array $params)
    {
        $subscription = $this->findSubscriptionById($params['id']);

        $collection = collect($params)->except('_token');

        $subscription->update($collection->all());

        return $subscription;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteSubscription($id)
    {
        $subscription = $this->findSubscriptionById($id);

        $subscription['status'] = '0';

        $subscription->save();

        return $subscription;

    }
}
