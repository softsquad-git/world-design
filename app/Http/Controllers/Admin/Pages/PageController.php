<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\PageRequest;
use App\Repositories\Admin\Pages\PageRepository;
use App\Services\Admin\Pages\PageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var PageService
     * @var PageRepository
     */
    private $repository;
    private $service;
    private $toMethod;

    public function __construct(PageRepository $repository, PageService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Admin\Pages\PageController@items';
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('admin.pages.list', [
            'items' => $items
        ]);
    }

    public function item($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item))
            return view('admin.pages.show', ['item' => $item]);

        return Redirections::redirectToError($this->toMethod);
    }

    public function create()
    {
        $item = $this->service->page();
        return view('admin.pages.form', [
            'item' => $item
        ]);
    }

    public function store(PageRequest $request){
        $this->service->store($request->all());

        return Redirections::redirectToSuccess($this->toMethod);
    }

    public function edit($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item))
        {
            return view('admin.pages.form', ['item' => $item]);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function update(PageRequest $request, $id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)){
            $this->service->update($request->all(), $item);

            return Redirections::redirectToSuccess($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function delete($id)
    {
        $item = $this->repository->find($id);
        if(!empty($item)){
            $this->service->delete($item);

            return Redirections::redirectToRemoved($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function uploadFileContent(Request $request)
    {
        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message  = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            if ($file->isValid()) {
                $filename =rand(1000,9999).$file->getClientOriginalName();
                $file->move(public_path().'/wysiwyg/', $filename);
                $url = url('wysiwyg/' . $filename);
            } else {
                $message = 'An error occurred while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }
        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }

}
