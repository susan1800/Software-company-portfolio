<?php

namespace App\Http\Controllers\Admin;
use App\Models\Setting;
use App\Contracts\SettingContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class SettingController extends BaseController
{


      /**
     * @var SettingContract
     */
    protected $settingRepository;

    /**
     * ServiceController constructor.
     * @param SettingContract $settingRepository
     */
    public function __construct(SettingContract $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function index(){
        $targetsetting = Setting::first();
        $this->setPageTitle('Setting', 'Edit Settings');
        return view('admin.settings.index',compact('targetsetting'));
    }
    public function update(Request $request){

        $this->validate($request, [
            'page_title'      =>  'required|max:191',
            // 'logo'      =>  'mimes:png,jpg',
            // 'fav_icon' =>'mimes:png,jpg',
            'meta' => 'required',
            'meta_description' => 'required',


        ]);

        $params = $request->except('_token');

        $home = $this->settingRepository->updateSetting($params);

        if (!$home) {
            return $this->responseRedirectBack('Error occurred while updating home.', 'error', true, true);
        }
        return $this->responseRedirectBack('Home updated successfully' ,'success',false, false);



    }
}
