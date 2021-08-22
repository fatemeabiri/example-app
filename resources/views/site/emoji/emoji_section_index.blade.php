<section class=" bg-content-header rounded " id="portfolio">
    <h2  class="page-section-heading text-center text-uppercase
                 mb-0  header" >سالن های حس وحال </h2>
</section>
<!-- Portfolio Grid Items-->
<div class="row justify-content-start  padding-class ">
    @foreach($emojies as $emoji)
        <div class="col-md-4 col-lg-3 mb-5  ">
            <div class="portfolio-item mx-auto  shadow-lg p-3 mb-5 bg-body rounded  " >
                <a href="/emotions/{{$emoji->emoji_key}}">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-dark">
                            <p> {{$emoji->emoji_name}}</p>
                        </div>
                    </div>
                    <div class=" align-items-center">
                        <div class="icon icon-shape icon-shape-secondary organic-radius">
                            <span class="{{$emoji->emoji_shape}}"></span>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
