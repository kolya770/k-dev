@if (Session::has('flash_message'))
    <div class="modal fade" id="popup-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h3>{{ session('flash_message') }}</h3>
                </div>
            </div>
        </div>
    </div>
{{--<div class="popup-success" id="popup-success">--}}
    {{--<div class="popup-wrapper">--}}
        {{----}}
            {{--<div class="text-box">--}}
            {{--<span class="close closesuccess" style="font-size: 36px;">&times;</span>--}}
           {{--<h3>{{ session('flash_message') }}</h3>--}}
           {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endif