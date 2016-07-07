<section class="what-people-say wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>What people say</h1>
            </div>
        </div>
        @foreach($reviews as $review)
            <div class="col-md-4">
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
        @endforeach

    </div>
</section>
