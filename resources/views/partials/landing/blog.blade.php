<section class="blog wrap" id="blog">
<div class="bg-holder"></div>
    <div class="container">
    <div class="visible-xs">
        <div class="row">
            <div class="blog-heading col-xs-12">
            
                <h1 class="title">Blog</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-0 col-xs-offset-1 col-xs-10 blog-text">
            <h3>
            <a href="{{action('HomeController@show',['id'=>$post->id])}}">
                {{$post->title}}
            </a>
            </h3>
            </div>  
            <div class="blog-image col-sm-5 col-sm-offset-1 col-xs-offset-1 col-xs-10">
                <a href="{{action('HomeController@show',['id'=>$post->id])}}">
                <img class="img-responsive img-wrap" src="{{'/'.$post->preview}}" alt="Blog">
                </a>
            </div>
        </div>  
                <div class="row">
                    <div class="blog-text col-sm-6 col-xs-12">
                        
                        <p style="text-align: center; padding-top: 20px;">
                        {!! $post->content !!}
                        </p>
                        <div class="row" style="text-align:center;">
                        
                        <a href="{{action('HomeController@show',['id'=>$post->id])}}">
                        <button class="btn border-btn">READ MORE</button>
                        </a>
                        
                        </div>
                    </div>
                </div>
            </div>
    <div class="hidden-xs">
        <div class="row">
            <div class="blog-heading col-xs-12">
            
                <h1 class="title">Blog</h1>
        
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-0 col-xs-offset-1 col-xs-10">
                <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="blog-text">

                        <h3><a href="{{action('HomeController@show',['id'=>$post->id])}}">{{$post->title}}</a></h3>
                        <p>
                            {!!$post->content!!}
                        </p>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <a href="{{action('HomeController@show',['id'=>$post->id])}}">
                        <button class="btn border-btn">READ MORE</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="blog-image col-sm-5 col-sm-offset-1 col-xs-offset-1 col-xs-10">
            <a href="{{action('HomeController@show',['id'=>$post->id])}}">
                <img class="img-responsive img-wrap" src="{{'/'.$post->preview}}" alt="Blog">
            </a>
            </div>
        </div>  
    </div>
    </div>
</section>