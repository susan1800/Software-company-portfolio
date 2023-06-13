<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BlogContract;
use App\Contracts\CategoryContract;
use App\Contracts\UserContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    /**
     * @var BlogContract
     */
    protected $blogRepository, $categoriesRepository;

    /**
     * BlogController constructor.
     * @param BlogContract $blogRepository
     */
    public function __construct(BlogContract $blogRepository, CategoryContract $categoriesRepository  , UserContract $usersRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->categoriesRepository = $categoriesRepository;
        $this->usersRepository = $usersRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blogs = $this->blogRepository->listBlog();

        $this->setPageTitle('Blogs', 'List Of All Blogs.');
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $blogs = $this->blogRepository->listBlog('id', 'asc');
        $categories = $this->categoriesRepository->listCategories('id', 'asc');
        $users = $this->usersRepository->listUser('id', 'asc');

        $this->setPageTitle('Blogs', 'Create Blog');
        return view('admin.blogs.create', compact('blogs', 'categories' ,'users'));
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
            'details'      =>  'required',
            'cat_id'      =>  'required',
            'subtitle' =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:2000',

            'message_from_author' => 'required',
            'status'   =>   'required',
        ]);

        $params = $request->except('_token');

        $blog = $this->blogRepository->createBlog($params);

        if (!$blog) {
            return $this->responseRedirectBack('Error occurred while creating blog.', 'error', true, true);
        }
        return $this->responseRedirect('admin.blogs.index', 'Blog added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetBlog = $this->blogRepository->findBlogById($id);
        $categories = $this->categoriesRepository->listCategories('id', 'asc');
        $users = $this->usersRepository->listUser('id', 'asc');
        $blogs = $this->blogRepository->listBlog();

        $this->setPageTitle('Blog Us', 'Edit Blog : '.$targetBlog->name);
        return view('admin.blogs.edit', compact('blogs', 'targetBlog', 'categories','users'));
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
            'details'      =>  'required',
            'cat_id'      =>  'required',
            'subtitle' =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:2000',

        ]);

        $params = $request->except('_token');

        $blog = $this->blogRepository->updateBlog($params);

        if (!$blog) {
            return $this->responseRedirectBack('Error occurred while updating blog.', 'error', true, true);
        }
        return $this->responseRedirectBack('Blog updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $blog = $this->blogRepository->deleteBlog($id);

        if (!$blog) {
            return $this->responseRedirectBack('Error occurred while deleting blog.', 'error', true, true);
        }
        return $this->responseRedirect('admin.blogs.index', 'Blog deleted successfully' ,'success',false, false);
    }

}
