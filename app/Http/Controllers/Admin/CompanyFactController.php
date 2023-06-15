<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CompanyFactContract;
use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;


class CompanyFactController extends BaseController
{
    /**
     * @var companyFactContract
     */
    protected $companyFactRepository;
    protected $categoryRepository;


    public function __construct(CompanyFactContract $companyFactRepository , CategoryContract $categoryRepository)
    {
        $this->companyFactRepository = $companyFactRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $companyFacts = $this->companyFactRepository->listcompanyFact();

        $this->setPageTitle('companyFact', 'companyFacts');
        return view('admin.companyfacts.index', compact('companyFacts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $companyFacts = $this->companyFactRepository->listcompanyFact('id', 'asc');
        $categories = $this->categoryRepository->listCategories('id', 'asc');

        $this->setPageTitle('companyFact Us', 'Create companyFact');
        return view('admin.companyfacts.create', compact('companyFacts' , 'categories'));
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
            'cat_id'  =>'required',
            'number'     =>  'required|int'
        ]);

        $params = $request->except('_token');

        $companyFact = $this->companyFactRepository->createcompanyFact($params);

        if (!$companyFact) {
            return $this->responseRedirectBack('Error occurred while creating companyFact.', 'error', true, true);
        }
        return $this->responseRedirect('admin.companyfacts.index', 'companyFact added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetcompanyFact = $this->companyFactRepository->findcompanyFactById($id);
        $companyFacts = $this->companyFactRepository->listcompanyFact();
        $categories = $this->categoryRepository->listCategories('id', 'asc');
        $this->setPageTitle('companyFact Us', 'Edit companyFact : '.$targetcompanyFact->name);
        return view('admin.companyfacts.edit', compact('companyFacts', 'targetcompanyFact' , 'categories'));
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
            'cat_id'  =>'required',
             'number'     =>  'required|int'
        ]);


        $params = $request->except('_token');

        $companyFact = $this->companyFactRepository->updatecompanyFact($params);

        if (!$companyFact) {
            return $this->responseRedirectBack('Error occurred while updating companyFact.', 'error', true, true);
        }
        return $this->responseRedirectBack('companyFact updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $companyFact = $this->companyFactRepository->deletecompanyFact($id);

        if (!$companyFact) {
            return $this->responseRedirectBack('Error occurred while updating companyFact.', 'error', true, true);
        }
        return $this->responseRedirect('admin.companyfacts.index', 'companyFact updated successfully' ,'success',false, false);
    }
}
