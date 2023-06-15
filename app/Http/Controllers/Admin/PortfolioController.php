<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\PortfolioContract;
use App\Contracts\CategoryContract;
use App\Contracts\UserContract;
use App\Models\Category;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class PortfolioController extends BaseController
{
    /**
     * @var PortfolioContract
     */
    protected $portfolioRepository, $categoriesRepository;

    /**
     * BlogController constructor.
     * @param PortfolioContract $portfolioRepository
     */
    public function __construct(PortfolioContract $portfolioRepository, CategoryContract $categoriesRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
        $this->categoriesRepository = $categoriesRepository;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $portfolios = $this->portfolioRepository->listPortfolio();

        $this->setPageTitle('portfolio', 'List Of All portfolio.');
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $portfolios = $this->portfolioRepository->listPortfolio('id', 'asc');
        $categories = Category::where('cat','project')->where('status',1)->get();
        // $categories = $this->categoriesRepository->listCategories('id', 'asc');

        $this->setPageTitle('Portfolios', 'Create Portfolio');
        return view('admin.portfolios.create', compact('portfolios', 'categories'));
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
            'link'      =>  'required',
            'cat_id'      =>  'required',
            'image'     =>  'mimes:jpg,jpeg,png|max:2000',
            'status'   =>   'required',
        ]);

        $params = $request->except('_token');

        $portfolio = $this->portfolioRepository->createPortfolio($params);

        if (!$portfolio) {
            return $this->responseRedirectBack('Error occurred while creating portfolio.', 'error', true, true);
        }
        return $this->responseRedirect('admin.portfolio.index', 'portfolio added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetPortfolio = $this->portfolioRepository->findPortfolioById($id);
        // $categories = $this->categoriesRepository->listCategories('id', 'asc');
        $categories = Category::where('cat','project')->where('status',1)->get();
        $portfolios = $this->portfolioRepository->listPortfolio();

        $this->setPageTitle('Portfolios', 'Edit Portfolio : '.$targetPortfolio->name);
        return view('admin.portfolios.edit', compact('portfolios', 'targetPortfolio', 'categories'));
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
            'link'      =>  'required',
            'cat_id'      =>  'required',
            'image'     =>  'mimes:jpg,jpeg,png|max:2000',

        ]);

        $params = $request->except('_token');

        $portfolio = $this->portfolioRepository->updatePortfolio($params);

        if (!$portfolio) {
            return $this->responseRedirectBack('Error occurred while updating portfolio.', 'error', true, true);
        }
        return $this->responseRedirectBack('portfolio updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $portfolio = $this->portfolioRepository->deletePortfolio($id);

        if (!$portfolio) {
            return $this->responseRedirectBack('Error occurred while updating portfolio.', 'error', true, true);
        }
        return $this->responseRedirect('admin.portfolio.index', 'portfolio updated successfully' ,'success',false, false);
    }

}
