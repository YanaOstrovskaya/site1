@include('layouts.header')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-4">
                    @yield('content')
                </div>
                    <div class="col-md-4 col-md-pull-8">
                        @section('sidebar')
                    @widget('productCategories')
                    @show
                </div>

            </div>
        </div>

   

@include('layouts.footer')
