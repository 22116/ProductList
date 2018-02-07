@extends('layouts.app')

@section('styles')
    <style>
        tr {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('producer.create')  }}" class="btn text-white mt-4 float-right btn-info">Create</a>
        <table class="table float-left table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Header</th>
                </tr>
            </thead>
            <tbody>
                @foreach($producers as $producer)
                    <tr>
                        <td>{{ $producer->id }}</td>
                        <td>{{ $producer->name }}</td>
                        <td>{{ $producer->header }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $('table tbody tr').click(function (elem) {
        	var id = $(this).find('td').first().text();
            location.href = '{{ route('producer.index') }}/' + id;
        });
    </script>
@endsection