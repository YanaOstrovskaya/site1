@if($config['type']=='list')
<ul class="list-group">
@forelse($productCategories as $category)
<li>
	<a href="{{url('category/'.$category->slug)}}">{{$category->name}}</a>
</li>
@empty
<h4 class="list-group-item-heading">Not category</h4>
@endforelse
</ul>
@else
@foreach($productCategories as $category)
<div class="col-md-3">
	<div class="thumbnail">
        <a href="{{url('category/'.$category->slug)}}">
          <img src="{{url($category->imagePath)}}" alt="{{$category->name}}">
          <div class="caption">
            <p>{{$category->name}}</p>
          </div>
        </a>
      </div>
</div>
@endforeach
@endif



