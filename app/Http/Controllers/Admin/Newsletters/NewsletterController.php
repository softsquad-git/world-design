<?php

namespace App\Http\Controllers\Admin\Newsletters;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Newsletters\NewsletterRepository;
use App\Services\Admin\Newsletters\NewsletterService;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * @var NewsletterRepository
     * @var NewsletterService
     */
    private $service;
    private $repository;
    private $toMethod;

    public function __construct(NewsletterService $service, NewsletterRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Admin\Newsletters\NewsletterController@items';
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('admin.newsletters.list', [
            'items' => $items
        ]);
    }
}
