<footer class="ftco-footer bg-light ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ Setting::getTitlePage() }}</h2>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="{{ Setting::getFbUrl() }}"><span class="icon-facebook"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        @foreach(Page::getPagesTop()->slice(0, 4) as $page)
                            <li><a href="{{ route('page', ['alias' => $page->alias]) }}" class="py-2 d-block">{{ $page->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">@lang('footer.shop')</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="{{ route('shops') }}" class="py-2 d-block">@lang('footer.shop')</a></li>
                            <li><a href="{{ route('basket') }}" class="py-2 d-block">@lang('footer.basket') ({{ Basket::countProductsInBasket() }})</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            @foreach(Page::getPagesFooter() as $page)
                                <li><a href="{{ route('page', ['alias' => $page->alias]) }}" class="py-2 d-block">{{ $page->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">@lang('footer.questions')</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{ Setting::getLocation() }}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{ Setting::getPhone() }}</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ Setting::getEmail() }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 text-left">
                <span class="txt-footer-bottom">
                    {{ config('app.name') }} &copy; {{ date('Y') }}
                </span>
            </div>
            <div class="col-lg-6 text-right">
                <span class="txt-footer-bottom">
                    @lang('footer.created'): <a href="{{ config('app.author.url') }}" target="_blank">{{ config('app.author.name') }}</a>
                </span>
            </div>
        </div>
    </div>
</footer>
