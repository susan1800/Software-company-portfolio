<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\SubscriptionContract;

class SubscriptionController extends BaseController
{
     /**
     * @var SubscriptionContract
     */
    protected $SubscriptionRepository;

    /**
     * SubscriptionController constructor.
     * @param SubscriptionContract $SubscriptionRepository
     */
    public function __construct(SubscriptionContract $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $subscriptions = $this->subscriptionRepository->listSubscription();

        $this->setPageTitle('Subscription ', 'Subscription ');
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $subscriptions = $this->subscriptionRepository->listSubscription('id', 'asc');

        $this->setPageTitle('Subscription ', 'Create Subscription');
        return view('admin.subscriptions.create', compact('subscriptions'));
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
            'price' =>  'numeric:min:1',
            'status'     =>  'required',
            'plan' => 'required|max:100',

        ]);

        $params = $request->except('_token');

        $subscription = $this->subscriptionRepository->createSubscription($params);

        if (!$subscription) {
            return $this->responseRedirectBack('Error occurred while creating Subscription.', 'error', true, true);
        }
        return $this->responseRedirect('admin.subscription.index', 'Subscription added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetsubscription = $this->subscriptionRepository->findSubscriptionById($id);
        $subscriptions = $this->subscriptionRepository->listSubscription();

        $this->setPageTitle('Subscription ', 'Edit Subscription : '.$targetsubscription->name);
        return view('admin.subscriptions.edit', compact('subscriptions', 'targetsubscription'));
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
            'price' =>  'numeric:min:1',
            'plan' => 'required|max:100',

        ]);

        $params = $request->except('_token');

        $subscription = $this->subscriptionRepository->updateSubscription($params);

        if (!$subscription) {
            return $this->responseRedirectBack('Error occurred while updating Subscription.', 'error', true, true);
        }
        return $this->responseRedirectBack('Subscription updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $subscription = $this->subscriptionRepository->deleteSubscription($id);

        if (!$subscription) {
            return $this->responseRedirectBack('Error occurred while updating Subscription.', 'error', true, true);
        }
        return $this->responseRedirect('admin.subscription.index', 'Subscription updated successfully' ,'success',false, false);
    }
}
