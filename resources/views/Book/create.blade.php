@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Book</div>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'book.store','files'=>true)) }}
                    <div class="form-group{{ $errors->has('book_fl') ? ' has-error' : '' }}">
                        {{ Form::label('Book',null,array('class' => ' control-label')) }} {{ Form::file('book_fl', null, array('class' => 'form-control','accept'=>'application/pdf,chm,djvu,epub')) }} @if ($errors->has('book_fl'))
                        <span class="help-block">
                                <strong>{{ $errors->first('book_fl') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('Name',null,array('class' => ' control-label')) }} {{ Form::text('name', null, array('class' => 'form-control')) }} @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {{ Form::label('Description',null,array('class' => ' control-label')) }} {{ Form::textarea('description', null, array('class' => 'form-control')) }} @if ($errors->has('description'))
                        <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        {{ Form::label('Image',null,array('class' => ' control-label')) }} {{ Form::file('image', null, array('class' => 'form-control')) }} @if ($errors->has('image'))
                        <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
                        {{ Form::label('Publisher',null,array('class' => ' control-label')) }} {{ Form::text('publisher', null, array('class' => 'form-control')) }} @if ($errors->has('publisher'))
                        <span class="help-block">
                                <strong>{{ $errors->first('publisher') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                        {{ Form::label('Author',null,array('class' => ' control-label')) }} {{ Form::text('author', null, array('class' => 'form-control')) }} @if ($errors->has('author'))
                        <span class="help-block">
                                <strong>{{ $errors->first('author') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('edition') ? ' has-error' : '' }}">
                        {{ Form::label('Edition',null,array('class' => ' control-label')) }} {{ Form::text('edition', null, array('class' => 'form-control')) }} @if ($errors->has('edition'))
                        <span class="help-block">
                                <strong>{{ $errors->first('edition') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('pages') ? ' has-error' : '' }}">
                        {{ Form::label('Pages',null,array('class' => ' control-label')) }} {{ Form::text('pages', null, array('class' => 'form-control')) }} @if ($errors->has('pages'))
                        <span class="help-block">
                                <strong>{{ $errors->first('pages') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('published') ? ' has-error' : '' }}">
                        {{ Form::label('Published',null,array('class' => ' control-label')) }} {{ Form::text('published', null, array('class' => 'form-control','class'=>'datepicker')) }} @if ($errors->has('published'))
                        <span class="help-block">
                                <strong>{{ $errors->first('published') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('posted') ? ' has-error' : '' }}">
                        {{ Form::label('Posted',null,array('class' => ' control-label')) }} {{ Form::text('posted', null, array('class' => 'form-control','class'=>'datepicker')) }} @if ($errors->has('posted'))
                        <span class="help-block">
                                <strong>{{ $errors->first('posted') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                        {{ Form::label('Language',null,array('class' => ' control-label')) }} {{ Form::text('language', null, array('class' => 'form-control')) }} @if ($errors->has('language'))
                        <span class="help-block">
                                <strong>{{ $errors->first('language') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('bookformat') ? ' has-error' : '' }}">
                        {{ Form::label('Bookformat',null,array('class' => ' control-label')) }} {{ Form::text('bookformat', null, array('class' => 'form-control')) }} @if ($errors->has('bookformat'))
                        <span class="help-block">
                                <strong>{{ $errors->first('bookformat') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('booksize') ? ' has-error' : '' }}">
                        {{ Form::label('Booksize',null,array('class' => ' control-label')) }} {{ Form::text('booksize', null, array('class' => 'form-control')) }} @if ($errors->has('booksize'))
                        <span class="help-block">
                                <strong>{{ $errors->first('booksize') }}</strong>
                            </span> @endif
                    </div>
                    {{ Form::token() }} {{ Form::submit(null, array('class' => 'btn btn-success')) }} {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
</script>
@endsection
