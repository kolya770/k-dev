<div class="popup" id="popup">
    <div class="popup-wrapper">
        
            
            <form action="{{action('MessageController@store')}}" method="POST">
            <span class="close close-popup" onclick="document.getElementById('popup').style.display='none'">&times;</span>
            <div class="row">
                <div class="col-md-6">
                    <label for="name">NAME</label>
                    <input type="text" class="form-control" name="name"  required>
                </div>
                <div class="col-md-6">
                    <label for="email">EMAIL</label>
                    <input type="email" class="form-control" name="email"  required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="txt-area-wrap">
                        <label for="message">MESSAGE</label>
                        <textarea class="form-control" name="message" rows="5" required></textarea>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" class="send-message-popup" value="SEND MESSAGE">
                    
                </div>
            </div>

        </form>
    </div>
</div>