<div class="modal fade" id="popup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div id="thanks-message" class="thanks-message">
                    <h2>Ваше сообщение отправлено</h2>
                </div>
                {{ Form::open(array('method'=>'post','url' => '/messages/', 'id'=>'form-message')) }}
                <div class="row">
                    <div class="col-md-6">
                        {{Form::label('name', 'NAME')}}
                        {{Form::text('name', null, array('class'=>'form-control', 'id'=>'name', 'required' => 'required'))}}
                    </div>
                    <div class="col-md-6">
                        {{Form::label('email', 'EMAIL')}}
                        {{Form::email('email', null, array('class'=>'form-control', 'id'=>'email', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="txt-area-wrap">
                            {{Form::label('message', 'MESSAGE')}}
                            {{Form::textarea('message', null, array('class'=>'form-control', 'id'=>'message', 'rows'=>'5', 'required' => 'required'))}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{Form::submit('SEND MESSAGE', array('name'=>'submit', 'class'=>'btn btn-orange send-message-popup'))}}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>