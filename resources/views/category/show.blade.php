@extends('layouts.app')
@section('content')
<h1>{{$category->name}}</h1>
<div class="row">
	@foreach($products as $product)
	<div class="col-md-4">
		@include('category.product')
	</div>
	@endforeach
</div>
@endsection