@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">{{ $type->id }}. {{ strtoupper($type->name) }}</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('type.update', [ $type ]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input id="name" name="name" class="form-control" type="text" value="{{ $type->name }}">

                        @if ($errors->has('name'))
                            <p class="alert-danger w-100">
                                <strong>{{ $errors->first('name') }}</strong>
                            </p>
                        @endif
                    </div>
                    <button class="btn text-white m-3 float-left btn-success">Save</button>
                    <a href="{{ route('type.show', [ $type ]) }}" class="btn text-white m-3 float-left btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection