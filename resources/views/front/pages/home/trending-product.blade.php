<section class="ftco-section ftco-product">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h1 class="big">Trending</h1>
                <h2 class="mb-4">Trending</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-slider owl-carousel ftco-animate">
                    @foreach($data as $row)
                        <div class="item">
                            <div class="product">
                                <a href="{{ route('product', ['id' => $row->id]) }}" class="img-prod"><img class="img-fluid" src="{{ $row->getImage() }}" alt="{{ $row->title }}">
                                    @if($row->status == Status::PRODUCT_STATUS_PROMO)
                                        <span class="status">PROMOCJA</span>
                                    @elseif($row->status == Status::PRODUCT_STATUS_NEWS)
                                        <span class="status">NOWOŚĆ</span>
                                    @endif
                                </a>
                                <div class="text pt-3 px-3">
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
