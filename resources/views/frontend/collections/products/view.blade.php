@extends ('layouts.app')

@section('title')
{{$product->productName}} 
@endsection

@section('content')


<div>
    <livewire:frontend.product.view :category="$category" :product="$product"/>
</div>

@endsection