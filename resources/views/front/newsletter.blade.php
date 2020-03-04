<section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h1 class="big">@lang('newsletter.title')</h1>
                    <h2>@lang('newsletter.sub_title')</h2>
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col-md-8">
                            <form action="{{ route('newsletter.save') }}" method="post" class="subscribe-form">
                                @csrf
                                <div class="form-group d-flex">
                                    <label for="email"></label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                                           class="form-control" placeholder="@lang('newsletter.placeholder')">
                                    <input type="submit" value="Subscribe" class="submit px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
