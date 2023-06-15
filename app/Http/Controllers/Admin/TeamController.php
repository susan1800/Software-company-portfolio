<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\TeamContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class TeamController extends BaseController
{
    /**
     * @var TeamContract
     */
    protected $teamRepository;

    /**
     * TeamController constructor.
     * @param TeamContract $teamRepository
     */
    public function __construct(TeamContract $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $teams = $this->teamRepository->listTeam();

        $this->setPageTitle('Teams', 'List of all teams');
        return view('admin.team.index', compact('teams'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $team = $this->teamRepository->listTeam('id', 'asc');

        $this->setPageTitle('Teams', 'Create Team');
        return view('admin.team.create', compact('team'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'title'      =>  'required|max:191',
            'facebook' =>  'required',
            'linkedin' =>  'required',
            'github' =>  'required',
            'status' =>  'required',
            'image'     =>  'mimes:jpg,jpeg,png|max:3000'
        ]);

        $params = $request->except('_token');

        $team = $this->teamRepository->createTeam($params);

        if (!$team) {
            return $this->responseRedirectBack('Error occurred while creating team.', 'error', true, true);
        }
        return $this->responseRedirect('admin.team.index', 'Team added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetTeam = $this->teamRepository->findTeamById($id);
        $team = $this->teamRepository->listTeam();

        $this->setPageTitle('Teams', 'Edit Team : '.$targetTeam->name);
        return view('admin.team.edit', compact('team', 'targetTeam'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'title'      =>  'required|max:191',
            'facebook' =>  'required',
            'linkedin' =>  'required',
            'github' =>  'required',
            'image'     =>  'mimes:jpg,jpeg,png|max:3000'
        ]);

        $params = $request->except('_token');

        $team = $this->teamRepository->updateTeam($params);

        if (!$team) {
            return $this->responseRedirectBack('Error occurred while updating team.', 'error', true, true);
        }
        return $this->responseRedirectBack('Team updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $team = $this->teamRepository->deleteTeam($id);

        if (!$team) {
            return $this->responseRedirectBack('Error occurred while updating team.', 'error', true, true);
        }
        return $this->responseRedirect('admin.team.index', 'Team updated successfully' ,'success',false, false);
    }
}
