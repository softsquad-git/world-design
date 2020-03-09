<?php

namespace App\Http\Controllers\Admin\Users;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UserRequest;
use App\Repositories\Admin\Users\UserRepository;
use App\Services\Admin\Users\UserService;

class UserController extends Controller
{
    /**
     * @var UserService
     * @var UserRepository
     */
    private $repository;
    private $service;
    private $toMethod;

    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Admin\Users\UserController@items';
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('admin.users.list', [
            'items' => $items
        ]);
    }

    public function item($id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0) {
            return view('admin.users.item', [
                'item' => $item
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function create()
    {
        $item = $this->service->user();

        return view('admin.users.form', [
            'item' => $item
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = $request->only([
            'name',
            'email'
        ]);
        $contact = $request->only([
            'city',
            'address',
            'post_code',
            'phone',
            'country'
        ]);
        $this->service->store($user, $contact);

        return Redirections::redirectToSuccess($this->toMethod);
    }

    public function update(UserRequest $request, $id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0) {
            $user = $request->only([
                'name',
                'email',
                'password'
            ]);
            $contact = $request->only([
                'city',
                'address',
                'post_code',
                'phone',
                'country'
            ]);
            $this->service->update($user, $contact, $item);

            return Redirections::redirectToSuccess($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function delete($id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0) {
            $this->service->delete($item);

            return Redirections::redirectToRemoved($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function locked(){
        $items = $this->repository->locked();

        return view('admin.users.locked', [
            'items' => $items
        ]);
    }

    public function news()
    {
        $items = $this->repository->news();

        return view('admin.users.news', [
            'items' => $items
        ]);
    }

    public function lock($id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0)
        {
            $this->service->lock($item);

            return Redirections::redirectToSuccess($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function edit($id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0)
        {
            return view('admin.users.form', [
                'item' => $item
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }
}
