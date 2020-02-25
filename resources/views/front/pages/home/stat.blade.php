<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url({{ asset('assets/front/images/bg_4.jpg') }});">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="{{ HomePage::getInfoVOne() }}">0</strong>
                                <span>{!! HomePage::getInfoTOne() !!}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="{{ HomePage::getInfoVTwo() }}">0</strong>
                                <span>{!! HomePage::getInfoTTwo() !!}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="{{ HomePage::getInfoVThree() }}">0</strong>
                                <span>{!! HomePage::getInfoTThree() !!}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="{{ HomePage::getInfoVFour() }}">0</strong>
                                <span>{!! HomePage::getInfoTFour() !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
