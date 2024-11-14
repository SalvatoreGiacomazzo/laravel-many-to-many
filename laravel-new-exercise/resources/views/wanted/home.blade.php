@extends('layouts.layout')

@section('main-content')

<a href="{{ route('admin.wanted.create') }}">Add New</a>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Nationality</th>
            <th scope="col">Felony</th>
            <th scope="col">Used Device</th>
            <th scope="col">Show</th>
        </tr>
    </thead>
    <tbody>
        @foreach($wantedList as $wanted)
            <tr>
                <th scope="row">{{ $wanted->id }}</th>
                <td>{{ $wanted->name }}</td>
                <td>{{ $wanted->last_name }}</td>
                <td>{{ $wanted->date_of_birth }}</td>
                <td>{{ $wanted->nationality }}</td>
                <td>{{ $wanted->felony }}</td>
                <td>{{$wanted->device->device_type}}</td>
                <td><a href="{{ route('admin.wanted.show', $wanted->id) }}"><button>Show</button></a></td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $wantedList->links() }}
@endsection
