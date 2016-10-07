{{--<div class="popup" id="popup">--}}
    {{--<div class="popup-wrapper">--}}


            {{--<form action="{{action('MessageController@store')}}" method="POST">--}}

            {{--<div class="row">--}}
            {{--<span class="close close-popup" onclick="document.getElementById('popup').style.display='none'" style="margin-right:15px; font-size: 36px;">&times;</span>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}
                    {{--<label for="name">NAME</label>--}}
                    {{--<input type="text" class="form-control" name="name"  required>--}}
                {{--</div>--}}
                {{--<div class="col-md-1">--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<label for="email">EMAIL</label>--}}
                    {{--<input type="email" class="form-control" name="email"  required>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="txt-area-wrap">--}}
                        {{--<label for="message">MESSAGE</label>--}}
                        {{--<textarea class="form-control" name="message" rows="5" required></textarea>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--{{csrf_field()}}--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<input type="submit" class="send-message-popup" value="SEND MESSAGE">--}}

                {{--</div>--}}
            {{--</div>--}}

        {{--</form>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="modal fade" id="popup1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{action('MessageController@store')}}" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">NAME</label>
                            <input type="text" class="form-control" id="name"  required>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-6">
                            <label for="email">EMAIL</label>
                            <input type="email" class="form-control" id="email"  required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="txt-area-wrap">
                                <label for="message">MESSAGE</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
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
    </div>
</div>