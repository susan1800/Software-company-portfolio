<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ServiceContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    /**
     * @var ServiceContract
     */
    protected $serviceRepository;

    /**
     * ServiceController constructor.
     * @param ServiceContract $serviceRepository
     */
    public function __construct(ServiceContract $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $services = $this->serviceRepository->listService();

        $this->setPageTitle('Services', 'List of all services');
        return view('admin.services.index', compact('services'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $services = $this->serviceRepository->listService('id', 'asc');

        $this->setPageTitle('Services', 'Create Service');
        return view('admin.services.create', compact('services'));
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
            'details' =>  'required|not_in:0',
            'icon'     =>  'mimes:jpg,jpeg,png|max:1000',
            'status'   =>  'required',
        ]);

        $params = $request->except('_token');

        $service = $this->serviceRepository->createService($params);

        if (!$service) {
            return $this->responseRedirectBack('Error occurred while creating service.', 'error', true, true);
        }
        return $this->responseRedirect('admin.services.index', 'Service added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetService = $this->serviceRepository->findServiceById($id);
        $services = $this->serviceRepository->listService();

        $this->setPageTitle('Services', 'Edit Service : '.$targetService->name);
        return view('admin.services.edit', compact('services', 'targetService'));
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
            'details' =>  'required|not_in:0',
            'icon'     =>  'mimes:jpg,jpeg,png|max:1000',
        ]);

        $params = $request->except('_token');
      
        $service = $this->serviceRepository->updateService($params);

        if (!$service) {
            return $this->responseRedirectBack('Error occurred while updating service.', 'error', true, true);
        }
        return $this->responseRedirectBack('Service updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $service = $this->serviceRepository->deleteService($id);

        if (!$service) {
            return $this->responseRedirectBack('Error occurred while deleting service.', 'error', true, true);
        }
        return $this->responseRedirect('admin.services.index', 'Service deleted successfully' ,'success',false, false);
    }
}
