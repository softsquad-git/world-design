<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ HomePage::getIMGAbout() }});">

            </div>
            <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section-bold mb-5 mt-md-5">
                    <div class="ml-md-0">
                        <h2 class="mb-4">{!! HomePage::getTitleAbout() !!}</h2>
                    </div>
                </div>
                <div class="pb-md-5">
                    {!! HomePage::getDescriptionAbout() !!}
                </div>

                <a class="btn btn-outline-secondary" href="{{ route('page', ['alias' => 'about-us']) }}">Więcej</a>
            </div>
        </div>
    </div>
</section>
