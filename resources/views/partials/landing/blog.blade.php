<section class="blog wrap" id="blog">
<div class="bg-holder"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="title">Blog</h1>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="blog-image">
                    <a class="visible-xs" href="{{action('HomeController@show',['id'=>$post->id])}}">
                        {{$post->title}}
                    </a>
                    <a href="{{action('HomeController@show',['id'=>$post->id])}}">
                        <img class="img-responsive img-wrap" src="{{'/'.$post->preview}}" alt="Blog">
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div class="blog-text">
                    <a class="hidden-xs" href="{{action('HomeController@show',['id'=>$post->id])}}">
                        {{$post->title}}
                    </a>
                    <p>{!! $post->content !!}</p>
                    <a href="{{action('HomeController@show',['id'=>$post->id])}}">
                        <button class="btn border-btn">READ MORE</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


