<div class="first-bg"></div>
<div class="main-screen-bg"></div>
<section class="portfolio wrap">
    <div class="container">
    <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
        <div class="row">
            <div class="col-xs-12">
                <h1>{{ $project->title }}</h1>
            </div>
        </div>
        <div class="row block-center">
            <div class="col-xs-12 position-portfolio">
                <div class="top-block">
                    <img src="{{ $project->images[0]->path }}">
                </div>
                <div class="bot-block">
                    <h2>{{ $project->title }}</h2>
                    <p>
                        {{ $project->description }}
                    </p>
                </div>
                <div class='gallery-block'>
                    <div class='row slider images multiple-items'>
                    @foreach ($project->images as $image)
                        
                            
                            <div class="image">
                                <img class="image-item img-responsive" src="{{$image->path}}" alt="{{$image->description}}">
                            </div>
                            
                        
                    @endforeach    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>