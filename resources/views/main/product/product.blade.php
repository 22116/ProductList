@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">{{ $product->id }}. {{ strtoupper($product->name) }}</div>
            <div class="card-body">
                <p>Description: {{ $product->description }}</p>
                <p>Category: <a href="{{ route('type.show', [ $product->type ]) }}">{{ $product->type->name }}</a></p>
                <p>Producer: <a href="{{ route('producer.show', [ $product->producer ]) }}">{{ $product->producer->name }}</a></p>
            </div>
            <div class="row p-3">
                <div class="col-1">
                    <a href="{{ route('product.edit', [ $product ])  }}" class="btn text-white mt-4 float-left btn-secondary">Edit</a>
                </div>
                <div class="col-1">
                    <form action="{{ route('product.destroy', [ $product ]) }}" method="POST" class="float-left">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn text-white mt-4 float-right btn-danger" onclick="return deleteConfirm()">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function deleteConfirm()
        {
        	return confirm('Are you sure, you want delete \'{{ $product->name }}\'?');
        }
    </script>
@endsection