<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CommentContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
       /**
     * @var commentContract
     */
    protected $commentRepository;


    public function __construct(CommentContract $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comments = $this->commentRepository->listComments();

        $this->setPageTitle('comment', 'comments');
        return view('admin.comments.index', compact('comments'));
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
            'blog_id'     =>  'required',
            'comment'     =>  'required',
            'email'     =>  'required|email',
        ]);

        $params = $request->except('_token');

        $comment = $this->commentRepository->createComment($params);

        if (!$comment) {
            return $this->responseRedirectBack('Error occurred while creating comment.', 'error', true, true);
        }
        return $this->responseRedirectBack('comment added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetcomment = $this->commentRepository->findcommentById($id);
        $comments = $this->commentRepository->listcomment();

        $this->setPageTitle('comment Us', 'Edit comment : '.$targetcomment->name);
        return view('admin.comments.edit', compact('comments', 'targetcomment'));
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
             'Fact'     =>  'mimes:jpg,jpeg,png|max:2000'
        ]);


        $params = $request->except('_token');

        $comment = $this->commentRepository->updatecomment($params);

        if (!$comment) {
            return $this->responseRedirectBack('Error occurred while updating comment.', 'error', true, true);
        }
        return $this->responseRedirectBack('comment updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $comment = $this->commentRepository->deletecomment($id);

        if (!$comment) {
            return $this->responseRedirectBack('Error occurred while deleting comment.', 'error', true, true);
        }
        return $this->responseRedirect('admin.comments.index', 'comment deleted successfully' ,'success',false, false);
    }
}
