<?php

namespace App\Http\Controllers\Front\Newsletters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Newsletters\NewsletterRequest;
use App\Repositories\Front\Newsletters\NewsletterRepository;
use App\Services\Front\Newsletters\NewsletterService;

class NewsletterController extends Controller
{
    /**
     * @var NewsletterRepository
     * @var NewsletterService
     */
    private $repository;
    private $service;

    public function __construct(NewsletterService $service, NewsletterRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function store(NewsletterRequest $request)
    {
        $this->service->store($request->all());

        return redirect()->back()->with('message', trans('front.newsletter.save'));
    }

    public function delete($email)
    {
        $item = $this->repository->find($email);
        if (!empty($item))
        {
            $this->service->delete($item);

            return redirect()->back()->with('message', trans('front.newsletter.remove'));
        }

        return redirect()->back()->with('message', trans('front.newsletter.not_found'));
    }
}
