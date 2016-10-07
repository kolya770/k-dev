<div id="intro" class="visible-xs">
    <div class="first-bg"></div>
    <div class="main-screen-bg"></div>
    <section class="intro wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>{{ $header }}</h1>
                    <h3>WEB DEVELOPMENT / CONSULTING</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-ms-12 col-xs-12">
                    <button class="btn contact-me" data-toggle="modal" data-target="#popup1">HIRE ME</button>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="intro-1" class="hidden-xs">
  <div id="video-wrap">
    @if ($image == 'none')
    <video id="cover-video" preload="metadata" autoplay loop>
        <source src="cover/landing/Hello-World.mp4" type="video/mp4">Your browser does not support the video tag. I suggest you upgrade your browser.
        <source src="cover/landing/Hello-World.ogg" type="video/ogg">Your browser does not support the video tag. I suggest you upgrade your browser.
    </video>
    @else 
    <div class="img-bg-wrap">
    <img class ="img-bg" src="{{ $image }}">
    </div>
    @endif
    <section class="intro wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>{{ $header }}</h1>
                    <h3>WEB DEVELOPMENT / CONSULTING</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-ms-12 col-xs-12">
                    <button class="btn contact-me" data-toggle="modal" data-target="#popup1">HIRE ME</button>
                </div>
            </div>
        </div>
    </section>
  </div>
</div>
