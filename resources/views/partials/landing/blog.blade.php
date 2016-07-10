<section class="blog wrap">
    <div class="container">
        <div class="row">
            <div class="blog-heading col-xs-12">
                <h1>Blog</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-0 col-xs-offset-1 col-xs-10">
                <div class="row">
                    <div class="blog-text">
                        <h3>{{$post->title}}</h3>
                        <p>
                            {{$post->content}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-ms-12 col-xs-12">
                        <a href="{{action('HomeController@show',['id'=>$post->id])}}">
                        <button class="btn border-btn">READ MORE</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="blog-image col-sm-6 col-sm-offset-0 col-xs-offset-1 col-xs-10">
                <img class="img-responsive img-wrap" src="/img/blog.png" alt="Blog">
            </div>
        </div>  
    </div>
</section>