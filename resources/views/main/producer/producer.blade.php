@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">{{ $producer->id }}. {{ strtoupper($producer->name) }}</div>
            <div class="card-body">
                <p>Header: {{ $producer->header }}</p>
            </div>
            <div class="row p-3">
                <div class="col-1">
                    <a href="{{ route('producer.edit', [ $producer ])  }}" class="btn text-white mt-4 float-left btn-secondary">Edit</a>
                </div>
                <div class="col-1">
                    <form action="{{ route('producer.destroy', [ $producer ]) }}" method="POST" class="float-left">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn text-white mt-4 float-right btn-danger" onclick="return deleteConfirm()" @if($producer->products->count() > 0) disabled @endif >Delete</button>
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
        	return confirm('Are you sure, you want delete \'{{ $producer->name }}\'?');
        }
    </script>
@endsection