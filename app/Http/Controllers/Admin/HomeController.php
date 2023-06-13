<?php

namespace App\Http\Controllers\Admin;
use App\Contracts\HomeContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Home;
class HomeController extends BaseController
{
     /**
     * @var HomeContract
     */
    protected $homeRepository;

    /**
     * HomeController constructor.
     * @param HomeContract $HomeRepository
     */
    public function __construct(HomeContract $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->setPageTitle('home', 'home');
        $targetHome = Home::first();
        return view('admin.homes.index', compact('targetHome'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $homes = $this->homeRepository->listHome('id', 'asc');

        $this->setPageTitle('home', 'Create home');
        return view('admin.homes.create', compact('homes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required',
            'details' =>  'required|not_in:0',
            'image' =>'mimes:png,jpg',
        ]);

        $params = $request->except('_token');

        $home = $this->homeRepository->createHome($params);

        if (!$home) {
            return $this->responseRedirectBack('Error occurred while creating Home.', 'error', true, true);
        }
        return $this->responseRedirect('admin.homes.index', 'Home added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetHome = $this->homeRepository->findHomeById($id);
        $homes = $this->homeRepository->listHome();

        $this->setPageTitle('Home', 'Edit Home : '.$targetHome->name);
        return view('admin.homes.edit', compact('homes', 'targetHome'));
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
            'image' =>'mimes:png,jpg',


        ]);

        $params = $request->except('_token');

        $home = $this->homeRepository->updateHome($params);

        if (!$home) {
            return $this->responseRedirectBack('Error occurred while updating home.', 'error', true, true);
        }
        return $this->responseRedirectBack('Home updated successfully' ,'success',false, false);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $home = $this->homeRepository->deleteHome($id);

        if (!$home) {
            return $this->responseRedirectBack('Error occurred while deleting Home.', 'error', true, true);
        }
        return $this->responseRedirect('admin.homes.index', 'Home deleted successfully' ,'success',false, false);
    }
}
