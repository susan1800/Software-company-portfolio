<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CompanyIconContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class CompanyIconController extends BaseController
{
    /**
     * @var companyIconContract
     */
    protected $companyIconRepository;


    public function __construct(CompanyIconContract $companyIconRepository)
    {
        $this->companyIconRepository = $companyIconRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $companyIcons = $this->companyIconRepository->listcompanyIcon();

        $this->setPageTitle('companyIcon', 'companyIcons');
        return view('admin.companyicons.index', compact('companyIcons'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $companyIcons = $this->companyIconRepository->listcompanyIcon('id', 'asc');

        $this->setPageTitle('companyIcon Us', 'Create companyIcon');
        return view('admin.companyicons.create', compact('companyIcons'));
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

            'icon'     =>  'mimes:jpg,jpeg,png|max:2000'
        ]);

        $params = $request->except('_token');

        $companyIcon = $this->companyIconRepository->createcompanyIcon($params);

        if (!$companyIcon) {
            return $this->responseRedirectBack('Error occurred while creating companyIcon.', 'error', true, true);
        }
        return $this->responseRedirect('admin.companyicons.index', 'companyIcon added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetcompanyIcon = $this->companyIconRepository->findcompanyIconById($id);
        $companyIcons = $this->companyIconRepository->listcompanyIcon();

        $this->setPageTitle('companyIcon Us', 'Edit companyIcon : '.$targetcompanyIcon->name);
        return view('admin.companyicons.edit', compact('companyIcons', 'targetcompanyIcon'));
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
             'icon'     =>  'mimes:jpg,jpeg,png|max:2000'
        ]);


        $params = $request->except('_token');

        $companyIcon = $this->companyIconRepository->updatecompanyIcon($params);

        if (!$companyIcon) {
            return $this->responseRedirectBack('Error occurred while updating companyIcon.', 'error', true, true);
        }
        return $this->responseRedirectBack('companyIcon updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $companyIcon = $this->companyIconRepository->deletecompanyIcon($id);

        if (!$companyIcon) {
            return $this->responseRedirectBack('Error occurred while updating companyIcon.', 'error', true, true);
        }
        return $this->responseRedirect('admin.companyicons.index', 'companyIcon updated successfully' ,'success',false, false);
    }
}
