<?php
namespace App\Http\Controllers\Admin;

use App\Contracts\TestimonialContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Faker\Provider\Base;
use Illuminate\Http\Request;
class TestimonialController extends BaseController
{
       /**
     * @var TestimonialContract
     */
    protected $testimonialRepository;

    /**
     * testimonialController constructor.
     * @param testimonialContract $testimonialRepository
     */
    public function __construct(TestimonialContract $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $testimonials = $this->testimonialRepository->listTestimonial();

        $this->setPageTitle('testimonial ', 'testimonial ');
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $testimonials = $this->testimonialRepository->listTestimonial('id', 'asc');

        $this->setPageTitle('testimonial ', 'Create testimonial');
        return view('admin.testimonials.create', compact('testimonials'));
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
            'name'      =>  'required|max:191',
            'details' =>  'required|not_in:0',
            'image'     =>  'mimes:jpg,jpeg,png|max:2000',

            'status'   =>   'required',

        ]);

        $params = $request->except('_token');

        $testimonial = $this->testimonialRepository->createTestimonial($params);

        if (!$testimonial) {
            return $this->responseRedirectBack('Error occurred while creating testimonial.', 'error', true, true);
        }
        return $this->responseRedirect('admin.testimonial.index', 'testimonial added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targettestimonial = $this->testimonialRepository->findTestimonialById($id);
        $testimonials = $this->testimonialRepository->listTestimonial();

        $this->setPageTitle('testimonial ', 'Edit testimonial : '.$targettestimonial->name);
        return view('admin.testimonials.edit', compact('testimonials', 'targettestimonial'));
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
            'name'      =>  'required|max:191',
            'details' =>  'required|not_in:0',
            'image'     =>  'mimes:jpg,jpeg,png|max:2000',
        ]);

        $params = $request->except('_token');

        $testimonial = $this->testimonialRepository->updateTestimonial($params);

        if (!$testimonial) {
            return $this->responseRedirectBack('Error occurred while updating testimonial.', 'error', true, true);
        }
        return $this->responseRedirectBack('testimonial updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $testimonial = $this->testimonialRepository->deleteTestimonial($id);

        if (!$testimonial) {
            return $this->responseRedirectBack('Error occurred while deleting testimonial.', 'error', true, true);
        }
        return $this->responseRedirect('admin.testimonial.index', 'testimonial deleted successfully' ,'success',false, false);
    }
}
