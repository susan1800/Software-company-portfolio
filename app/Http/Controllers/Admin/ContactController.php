<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ContactContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $contactRepository;

    public function __construct(ContactContract $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contacts = $this->contactRepository->listContact();

        $this->setPageTitle('Enquiries', 'Contact Us');
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $contacts = $this->contactRepository->listContact('id', 'asc');

        $this->setPageTitle('Enquiry', 'Create Contact');
        return view('admin.contacts.create', compact('contacts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:255',
            'details'      =>  'required|min:1',
            'location'      =>  'required|max:255',
            'email'      =>  'required|email|max:299',
            'phone'      =>  'required',
            'lat'      =>  'required',
            'long'     =>   'required',
            'status'   =>  'required',
        ]);
 
        $params = $request->except('_token');

        $about = $this->contactRepository->createContact($params);

        if (!$about) {
            return $this->responseRedirectBack('Error occurred while creating contacts.', 'error', true, true);
        }
        return $this->responseRedirect('admin.contacts.index', 'Contact added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetContact = $this->contactRepository->findContactById($id);
        $contacts = $this->contactRepository->listContact();

        $this->setPageTitle('Contact Us', 'Edit Contact : '.$targetContact->name);
        return view('admin.contacts.edit', compact('contacts', 'targetContact'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:255',
            'details'      =>  'required|min:1',
            'location'      =>  'required|max:255',
            'email'      =>  'required|max:299',
            'phone'      =>  'digits:10',
            'lat'      =>  'required',
            'long'     =>   'required',
        ]);

        $params = $request->except('_token');

        $contact = $this->contactRepository->updateContact($params);

        if (!$contact) {
            return $this->responseRedirectBack('Error occurred while updating contacts.', 'error', true, true);
        }
        return $this->responseRedirectBack('Contact updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $contact = $this->contactRepository->deleteContact($id);

        if (!$contact) {
            return $this->responseRedirectBack('Error occurred while deleting contacts.', 'error', true, true);
        }
        return $this->responseRedirect('admin.contacts.index', 'Contact deleted successfully' ,'success',false, false);
    }
}
