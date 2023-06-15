<?php

namespace App\Repositories;

use App\Contracts\UserContract;
use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Hash;
/**
 * Class UserRepository
 *
 * @package \App\Repositories
 */
class UserRepository extends BaseRepository implements UserContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listUser(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findUserById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }
    public function findUserByEmail(string $email)
    {
        try {
            return User::where('email', '=', $email)->where('status', '=', '1')->get();

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function createUser(array $params)
    {
        try {
            $collection = collect($params);

            $collection['password']=Hash::make($params['password']);
            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'user');
                $collection['image'] = $image;
            }
            $User = new User($collection->all());

            $User->save();

            return $User;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateUser(array $params)
    {
        $User = $this->findUserById($params['id']);

        $collection = collect($params)->except('_token');
        if($params['newpassword']!= null){
            $collection['password']=Hash::make($params['newpassword']);
        }
        $User->update($collection->all());

        return $User;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteUser($id)
    {
        $User = $this->findUserById($id);

        if ($User->User_pic != null) {
            $this->deleteOne($User->User_pic);
        }

        $User->delete();

        return $User;
    }
}
