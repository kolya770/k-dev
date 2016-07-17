@if (Session::has('flash_message'))
<div class="popup-success" id="popup-success">
    <div class="popup-wrapper">
        
            <div class="text-box">
            <span class="close closesuccess" style="font-size: 36px;">&times;</span>
           <h3>{{ session('flash_message') }}</h3>
           </div>
    </div>
</div>
@endif