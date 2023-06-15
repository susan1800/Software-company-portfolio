<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Contracts\CommentContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CommentRepository
 *
 * @package \App\Repositories
 */
class CommentRepository extends BaseRepository implements CommentContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * CommentRepository constructor.
     * @param Comment $model
     */
    public function __construct(Comment $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listComment(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findCommentById(int $id)
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
    public function createComment(array $params)
    {
        try {
            $collection = collect($params);

            $Comment = new Comment($collection->all());

            $Comment->save();

            return $Comment;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateComment(array $params)
    {
        $Comment = $this->findCommentById($params['id']);

        $collection = collect($params)->except('_token');

        $Comment->update($collection->all());

        return $Comment;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteComment($id)
    {
        $comment = $this->findCommentById($id);

        if($comment->status == '0'){
            $comment['status']='1';
        }else{
            $comment['status']='0';
        }
        $comment->save();

        return $comment;
    }
}
