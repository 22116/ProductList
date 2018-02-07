@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">Create new product:</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('producer.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input id="name" name="name" class="form-control" type="text">

                        @if ($errors->has('name'))
                            <p class="alert-danger w-100">
                                <strong>{{ $errors->first('name') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="header" class="control-label">Header</label>
                        <input id="header" name="header" type="text" class="form-control">


                        @if ($errors->has('header'))
                            <p class="alert-danger w-100">
                                <strong>{{ $errors->first('header') }}</strong>
                            </p>
                        @endif
                    </div>

                    <button class="btn text-white m-3 float-left btn-success">Create</button>
                    <a href="{{ route('producer.index') }}" class="btn text-white m-3 float-left btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection