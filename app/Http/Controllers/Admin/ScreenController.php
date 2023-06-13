<?php

namespace App\Http\Controllers\Admin;
use App\Contracts\ScreenContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class ScreenController extends BaseController
{
     /**
     * @var ScreenContract
     */
    protected $screenRepository;

    /**
     * ScreenController constructor.
     * @param ScreenContract $screenRepository
     */
    public function __construct(ScreenContract $screenRepository)
    {
        $this->screenRepository = $screenRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $screens = $this->screenRepository->listScreen();

        $this->setPageTitle('Screen', 'Screen');
        return view('admin.screens.index', compact('screens'));
    }
 
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $screens = $this->screenRepository->listScreen('id', 'asc');

        $this->setPageTitle('Screen', 'Create Screen');
        return view('admin.screens.create', compact('screens'));
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
            'image' =>  'mimes:jpg,jpeg,png|max:2000',
            
        ]);

        $params = $request->except('_token');
       
        $screen = $this->screenRepository->createScreen($params);

        if (!$screen) {
            return $this->responseRedirectBack('Error occurred while creating Screen.', 'error', true, true);
        }
        return $this->responseRedirect('admin.screens.index', 'Screen added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetscreen = $this->screenRepository->findScreenById($id);
        $screens = $this->screenRepository->listScreen();

        $this->setPageTitle('Screen', 'Edit Screen : '.$targetscreen->name);
        return view('admin.screens.edit', compact('screens', 'targetscreen'));
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
           
            'image'     =>  'mimes:jpg,jpeg,png|max:2000',
           
        ]);

        $params = $request->except('_token');

        $screen = $this->screenRepository->updateScreen($params);

        if (!$screen) {
            return $this->responseRedirectBack('Error occurred while updating Screen.', 'error', true, true);
        }
        return $this->responseRedirectBack('Screen updated successfully' ,'success',false, false);
  
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $screen = $this->screenRepository->deleteScreen($id);

        if (!$screen) {
            return $this->responseRedirectBack('Error occurred while deleting Screen.', 'error', true, true);
        }
        return $this->responseRedirect('admin.screens.index', 'Screen deleted successfully' ,'success',false, false);
    }
}
