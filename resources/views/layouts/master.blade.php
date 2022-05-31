        @include('inc.header')
        <!-- Responsive navbar-->
        @include('inc.navbar')
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    @include('admin.posts.messages')
                    @yield('content')
                  
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">

                </div>
            </div>
        </div>
       @include('inc.footer')

