<div class="cms_banner mt_10">
    <?php 
    $manufactures = App\Manufacture::take(4)->orderBy('manu_id','desc')->get();
    ?>
    @foreach ($manufactures as $item)
    <div class="col-md-3 mt_10">
      <div id="subbanner1" class="sub-hover" width="50%">
      <div class="sub-img"><a href="{{ url('manufacture')}}/{{$item->manu_id}}"><img src="{{ asset('lib/storage/app/avartar') }}/{{$item->manu_image}}" alt="Sub Banner1" class="img-responsive"></div>
        <div class="bannertext text-center">
          <button class="btn mb_10 cms_btn">Xem Sản Phẩm</button>
          <h2>{{$item->manu_name}}</h2>
          <p class="mt_10">Sản phẩm {{$item->manu_name}}</p>
        </div>
      </a>
      </div>
    </div>
    @endforeach
</div>