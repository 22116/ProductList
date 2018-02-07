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
        <div class="row">
            <div class="col">
                <form class="form-horizontal mt-4 float-left">
                    <label for="filter" class="control-label">Filter</label>
                    <select id="filter" name="filter">
                        <option value="id">Id</option>
                        <option value="name">Name</option>
                        <option value="type">Category</option>
                        <option value="producer">Company</option>
                        <option value="description">Description</option>
                    </select>
                    <label for="filter-val" class="control-label">Value</label>
                    <input id="filter-val" type="text" name="value">
                    <button class="btn btn-warning ml-2">Filter</button>
                </form>
            </div>
            <div>
                <a href="{{ route('product.create')  }}" class="btn text-white mt-4 float-right btn-info">Create</a>
            </div>
        </div>

        <table class="table float-left table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Company</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td><a href="{{ route('type.show', [ $product->type ]) }}">{{ $product->type->name }}</a></td>
                        <td><a href="{{ route('producer.show', [ $product->producer ]) }}">{{ $product->producer->name }}</a></td>
                        <td>{{ $product->description }}</td>
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
            location.href = '{{ route('product.index') }}/' + id;
        });
    </script>
@endsection