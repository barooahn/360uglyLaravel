@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/downloads') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('item_id') ? ' has-error' : '' }}">
                            <label for="item_id" class="col-md-4 control-label">Item_id</label>

                            <div class="col-md-6">
                                <input id="item_id" type="text" class="form-control" name="item_id" value="{{ old('item_id') }}" required autofocus>

                                @if ($errors->has('item_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('item_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('frames') ? ' has-error' : '' }}">
                            <label for="frames" class="col-md-4 control-label">Frames</label>

                            <div class="col-md-6">
                                <input id="frames" type="text" class="form-control" name="frames" required>

                                @if ($errors->has('frames'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('frames') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('digits') ? ' has-error' : '' }}">
                            <label for="digits" class="col-md-4 control-label">Digits</label>

                            <div class="col-md-6">
                                <input id="digits" type="text" class="form-control" name="digits" required>

                                @if ($errors->has('digits'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('digits') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('digits') ? ' has-error' : '' }}">
                            <label for="files" class="col-md-4 control-label">Upload Files</label>

                            <div class="col-md-6">
                                <input type="file" name="files[]" multiple required/>

                                @if ($errors->has('digits'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('digits') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
