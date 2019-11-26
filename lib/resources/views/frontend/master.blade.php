
@include('frontend.layout.header')

    <!-- =====  HEADER END  ===== -->
  <div class="container">
    <div class="row ">
      <!-- Left -->
      <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
        @include('frontend.layout.left')
      </div>
      <!-- End Left -->
      <!-- Product-Detail -->
      @yield('content')
      <!-- End Product-Detail -->
    </div>
  </div>
  </div>
    <!-- =====  FOOTER START  ===== -->
    
  @include('frontend.layout.footer')
  