<?php

namespace App\Http\Controllers\Front\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\Page;
use App\Repositories\Front\Pages\PageRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var PageRepository
     */
    private $repository;

    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function page($alias)
    {
        $page = $this->repository->find($alias);

        if (empty($page)) {
            return redirect()->action('Front\Pages\PageController@notFound');
        }

        return view('front.pages.page', ['page' => $page]);
    }

    public function notFound()
    {
        return view('front.pages.404');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }
}
