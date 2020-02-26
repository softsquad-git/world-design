<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h1 class="big">{{ HomePage::getTitleSecond() }}</h1>
                <h2 class="mb-4">{{ HomePage::getTitleSecond() }}</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach($data as $row)
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="{{ route('product', ['id' => $row->id]) }}" class="img-prod"><img class="img-fluid" src="{{ $row->getImage() }}" alt="{{ $row->title }}">
                            @if($row->status == Status::PRODUCT_STATUS_PROMO)
                                <span class="status">PROMOCJA</span>
                            @elseif($row->status == Status::PRODUCT_STATUS_NEWS)
                                <span class="status">NOWOŚĆ</span>
                            @endif
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="{{ route('product', ['id' => $row->id]) }}">{{ $row->title }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    @if($row->status == Status::PRODUCT_STATUS_PROMO)
                                        <p class="price"><span class="mr-2 price-dc">${{ $row->old_price }}</span><span class="price-sale">${{ $row->price }}</span></p>
                                    @else
                                        <p class="price"><span class="price-sale">${{ $row->price }}</span></p>
                                    @endif
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <span class="fa fa-eye"> {{ $row->views }}</span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
