<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * @var CategoryContract
     */
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryContract $categoryRepository
     */
    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepository->listCategories();

        $this->setPageTitle('Categories', 'List of all categories');
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->categoryRepository->listCategories('id', 'asc');

        $this->setPageTitle('Categories', 'Create Category');
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            // 'subtitle' =>  'required|max:191',
            // 'status'     =>  'required',
        ]);

        $params = $request->except('_token');

        $category = $this->categoryRepository->createCategory($params);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.categories.index', 'Category added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetCategory = $this->categoryRepository->findCategoryById($id);
        $categories = $this->categoryRepository->listCategories();

        $this->setPageTitle('Categories', 'Edit Category : '.$targetCategory->name);
        return view('admin.categories.edit', compact('categories', 'targetCategory'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            // 'subtitle' =>  'required|max:191',

        ]);
        $request['status'] = '1';

        $params = $request->except('_token');

        $category = $this->categoryRepository->updateCategory($params);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while updating category.', 'error', true, true);
        }
        return $this->responseRedirectBack('Category updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disable($id)
    {
        $category = $this->categoryRepository->disableCategory($id);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.categories.index', 'Category deleted successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $category = $this->categoryRepository->deleteCategory($id);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while updating category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.categories.index', 'Category updated successfully' ,'success',false, false);
    }
}
