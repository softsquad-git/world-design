<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Accounts\ChangePasswordRequest;
use App\Http\Requests\Admin\Accounts\SettingRequest;
use App\Repositories\Admin\Accounts\AccountRepository;
use App\Services\Admin\Accounts\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * @var AccountService
     * @var AccountRepository
     */
    private $service;
    private $repository;

    public function __construct(AccountRepository $repository, AccountService $service)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function account()
    {
        $item = $this->repository->item();

        return view('admin.accounts.form', [
            'item' => $item
        ]);
    }

    public function update(SettingRequest $request)
    {
        $item = $this->repository->find();
        $user = $request->only(['name', 'email']);
        $contact = $request->only(['post_code', 'city', 'street', 'address', 'country', 'phone']);
        $this->service->update($user, $contact, $item);

        return redirect()->back();
    }

    public function changePass()
    {
        return view('admin.accounts.password');
    }

    public function newPass(ChangePasswordRequest $request)
    {
        $user = $this->repository->find();
        if (isset($user->id) && $user->id > 0) {
            $item = $this->service->newPass($request->all(), $user);

            if ($item == true) {
                return redirect()->back()
                    ->with('message', trans('softsquad.item.saved'));
            }

            return redirect()->back()
                ->with('message', trans('softsquad.item.404'));
        }

        return redirect()->back()
            ->with('message', trans('softsquad.item.404'));
    }
}
