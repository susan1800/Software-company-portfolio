<?php
/**
 * Created by PhpStorm.
 * User: Bishal
 * Date: 8/27/2020
 * Time: 1:52 PM
 */

namespace App\Repositories;

use App\Models\Team;
use App\Contracts\TeamContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class TeamRepository
 *
 * @package \App\Repositories
 */
class TeamRepository extends BaseRepository implements TeamContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * TeamRepository constructor.
     * @param Team $model
     */
    public function __construct(Team $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listTeam(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findTeamById(int $id)
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
    public function createTeam(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'Team');
                $collection['image'] = $image;
            }

            $team = new Team($collection->all());

            $team->save();

            return $team;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateTeam(array $params)
    {
        $team = $this->findTeamById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($team->image != null) {
                $this->deleteOne($team->image);
            }

            $image = $this->uploadOne($params['image'], 'Team');
            $collection['image'] = $image;
        }

        $team->update($collection->all());

        return $team;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteTeam($id)
    {
        $team = $this->findTeamById($id);

        $team['status'] = '0';

        $team->save();

        return $team;
    }
}
