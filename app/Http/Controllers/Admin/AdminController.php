<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Status;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\CheckOuts\CheckOutRepository;
use App\Repositories\Admin\Newsletters\NewsletterRepository;
use App\Repositories\Admin\Products\ProductRepository;
use App\Repositories\Admin\References\ReferenceRepository;
use App\Repositories\Admin\Users\UserRepository;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @var ProductRepository
     * @var NewsletterRepository
     * @var UserRepository
     * @var ReferenceRepository
     * @var CheckOutRepository
     */
    private $productRepo;
    private $newsletterRepo;
    private $userRepo;
    private $referenceRepo;
    private $checkoutRepo;

    public function __construct(ProductRepository $productRepo, NewsletterRepository $newsletterRepo,
    UserRepository $userRepo, ReferenceRepository $referenceRepo, CheckOutRepository $checkoutRepo)
    {
        $this->productRepo = $productRepo;
        $this->newsletterRepo = $newsletterRepo;
        $this->userRepo = $userRepo;
        $this->referenceRepo = $referenceRepo;
        $this->checkoutRepo = $checkoutRepo;
    }

    public function index()
    {
        $_product = $this->productRepo->items()->count();
        $_newsletter = $this->newsletterRepo->items()->count();
        $_user = $this->userRepo->items()->count();
        $_reference_accept = $this->referenceRepo->items()->where('status', Status::REFERENCE_STATUS_ACCEPT)->count();
        $_reference_wait = $this->referenceRepo->items()->where('status', Status::REFERENCE_STATUS_MODIFY)->count();
        $_checkout = $this->checkoutRepo->items()->count();

        return view('admin.index', [
            'c_product' => $_product,
            'c_newsletter' => $_newsletter,
            'c_user' => $_user,
            'c_ref_accept' => $_reference_accept,
            'c_ref_wait' => $_reference_wait,
            'c_checkout' => $_checkout
        ]);
    }
}
