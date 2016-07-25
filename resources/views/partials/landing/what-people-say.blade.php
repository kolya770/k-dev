
<section class="what-people-say wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>What people say</h1>
            </div>
        </div>
        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach($reviews->all() as $review)
                <div class="swiper-slide"> 
                    <div class="col-md-12">
                        <div class="row">
                            <p>
                               &ldquo;   {!! $review->review !!} &rdquo;    
                            </p>
                        </div>
                        <div class="row">
                            <div class="ivan-ivanov">
                                <img class="img-circle" height="74" width="74" src="{{ $review->preview }}" alt="review-author"/>
                                <p><span>{{ $review-> author_name}}</span><br/>
                                    {{ $review->author_job }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
            
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            
        </div>
        
    </div>
</section>