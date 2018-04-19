@extends('layouts.full-width')

@section('content')
<div class="h2 text-center">Categories</div>
 @widget('productCategories', ['type' => 'block'])
 <div class="row">
 <div class="h2 text-center text-danger">Sale</div>
 <div class="slide">
 @forelse($productsSale as $product)
<div class="col-md-4 sale panel">
@include('category.product')
</div>
@empty
<h4>Not Sale</h4>
@endforelse
</div>
</div>
<div class="row">
<div class="h2 text-center text-info">Recommended</div>
<div class="slide">
 @forelse($productsRecommended as $product)
<div class="col-md-4 sale panel">
@include('category.product')
</div>
@empty
<h4>Not Recommended</h4>
@endforelse
</div>
</div>

@endsection

@section('script')
<script src="{{ asset('slick/slick.min.js') }}"></script>
<script>
	  (function($, undefined){
	$(function(){
      $('.slide').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3
});
      	})
})(jQuery)
</script>
@endsection


