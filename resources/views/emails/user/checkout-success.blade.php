@foreach($item->products as $product)
    {{ $product->id }}
    |
    {{ $product->title }}
@endforeach
