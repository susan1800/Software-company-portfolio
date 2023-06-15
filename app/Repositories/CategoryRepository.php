<?php

namespace App\Repositories;

use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Str;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryContract
{
    use UploadAble;

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findCategoryById(int $id)
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
    public function createCategory(array $params)
    {

        try {
            $collection = collect($params);
            $splits = explode(' ', $collection['title']);

            $createslug ='';

            foreach($splits as $split){

                $createslug = $createslug.$split;
            }


            $find = Category::where('slug',$createslug)->first();
            if($find){
                $slug = $createslug.Str::random(5);
            }else{
                $slug = $createslug;
            }
            // dd($slug);
            $collection['slug'] = $slug;
            $category = new Category($collection->all());



// dd($category);
            $category->save();

            return $category;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');

        $category->update($collection->all());

        return $category;
    }

    /**
     * @param $id
     * @return bool
     */
    public function disableCategory($id)
    {


        $category = $this->findCategoryById($id);
        if($category['status'] == '1'){
            $category['status'] = '0';
        }else{
            $category['status'] = '1';
        }



        $category->save();

        return $category;
    }

    public function deleteCategory($id)
    {


        $category = $this->findCategoryById($id);

        if($category->status == '0'){
            $category['status']='1';
        }else{
            $category['status']='0';
        }

        $category->save();

        return $category;
    }
}
