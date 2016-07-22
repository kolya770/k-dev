<div class="first-bg"></div>
<div class="main-screen-bg"></div>
<section class="portfolio wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>{{ $project->title }}</h1>
            </div>
        </div>
        <div class="row block-center">
            <div class="col-xs-12 position-portfolio">
                <div class="top-block">
                    <img src="{{ $mainImage->path }}">
                </div>
                <div class="bot-block">
                    <h2>{{ $project->title }}</h2>
                    <p>
                        {{ $project->description }}
                    </p>
                </div>
                <div id="lightgallery" class="row gallery-block">
                    
                    @foreach ($project->images as $image) 
                        
                        <a href="{{$image->path}}" class="col-xs-4">
                            <img class="image-item" src="{{$image->path}}" alt="{{$image->description}}">
                        </a>
                    
                    @endforeach    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>