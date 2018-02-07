@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">{{ $product->id }}. {{ strtoupper($product->name) }}</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('product.update', [ $product ]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input id="name" name="name" class="form-control" type="text" value="{{ $product->name }}">

                        @if ($errors->has('name'))
                            <p class="alert-danger w-100">
                                <strong>{{ $errors->first('name') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <input id="description" name="description" type="text" class="form-control" value="{{ $product->description }}">

                        @if ($errors->has('description'))
                            <p class="alert-danger w-100">
                                <strong>{{ $errors->first('description') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="type" class="control-label">Category</label>
                        <select id="type" name="type_id" class="form-control">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" @if($product->type == $type) selected @endif>{{ $type->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('type_id'))
                            <p class="alert-danger w-100">
                                <strong>{{ $errors->first('type_id') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="producer" class="control-label">Producer</label>
                        <select id="producer" name="producer_id" class="form-control">
                            @foreach($producers as $producer)
                                <option value="{{ $producer->id }}" @if($product->producer == $producer) selected @endif>{{ $producer->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('producer_id'))
                            <p class="alert-danger w-100">
                                <strong>{{ $errors->first('producer_id') }}</strong>
                            </p>
                        @endif
                    </div>
                    <button class="btn text-white m-3 float-left btn-success">Save</button>
                    <a href="{{ route('product.show', [ $product ]) }}" class="btn text-white m-3 float-left btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection