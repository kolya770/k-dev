@if (Session::has('flash_message'))
<div class="popup-success" id="popup-success">
    <div class="popup-wrapper">
        
            <div class="text-box">
            <span class="close closesuccess" onclick="document.getElementById('popup-success').style.display='none'">&times;</span>
           {{ session('flash_message') }}
           </div>
    </div>
</div>
@endif