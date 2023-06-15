<?php

namespace App\Http\Controllers\Admin;
use App\Contracts\GeneralInformationContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class GeneralInformationController extends BaseController
{
      /**
     * @var GeneralInformationContract
     */
    protected $generalInformationRepository;

    /**
     * GeneralInformationController constructor.
     * @param GeneralInformationContract $generalInformationRepository
     */
    public function __construct(GeneralInformationContract $generalInformationRepository)
    {
        $this->GeneralInformationRepository = $generalInformationRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $generalInformations = $this->GeneralInformationRepository->listGeneralInformation();

        $this->setPageTitle('GeneralInformation', 'GeneralInformation');
        return view('admin.generalinformations.index', compact('generalInformations'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $generalInformations = $this->GeneralInformationRepository->listGeneralInformation('id', 'asc');

        $this->setPageTitle('GeneralInformation', 'Create GeneralInformation');
        return view('admin.generalinformations.create', compact('generalInformations'));
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
            'subtitle' => 'required',
            'image' => 'required',
        ]);

        $params = $request->except('_token');

        $generalInformation = $this->GeneralInformationRepository->createGeneralInformation($params);

        if (!$generalInformation) {
            return $this->responseRedirectBack('Error occurred while creating GeneralInformation.', 'error', true, true);
        }
        return $this->responseRedirect('admin.generalinformations.index', 'GeneralInformation added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetGeneralInformation = $this->GeneralInformationRepository->findGeneralInformationById($id);
        $generalInformations = $this->GeneralInformationRepository->listGeneralInformation();

        $this->setPageTitle('GeneralInformation', 'Edit GeneralInformation : '.$targetGeneralInformation->name);
        return view('admin.generalinformations.edit', compact('generalInformations', 'targetGeneralInformation'));
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
            'subtitle' =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:2000',

        ]);

        $params = $request->except('_token');

        $generalInformation = $this->GeneralInformationRepository->updateGeneralInformation($params);

        if (!$generalInformation) {
            return $this->responseRedirectBack('Error occurred while updating GeneralInformation.', 'error', true, true);
        }
        return $this->responseRedirectBack('GeneralInformation updated successfully' ,'success',false, false);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $generalInformation = $this->GeneralInformationRepository->deleteGeneralInformation($id);

        if (!$generalInformation) {
            return $this->responseRedirectBack('Error occurred while updating GeneralInformation.', 'error', true, true);
        }
        return $this->responseRedirect('admin.generalinformations.index', 'GeneralInformation updated successfully' ,'success',false, false);
    }
}
