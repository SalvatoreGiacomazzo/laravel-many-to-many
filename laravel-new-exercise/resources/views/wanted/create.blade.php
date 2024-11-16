@extends('layouts.layout')

@section('main-content')
<h1>Create New Wanted</h1>

<form action="{{ route('admin.wanted.store') }}" method="POST" class="w-75">
    @csrf
    <div class="form-group">
        <label for="name">First Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" >

    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">

    </div>

    <div class="form-group">
        <label for="date_of_birth">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">

    </div>

    <div class="form-group">
        <label for="nationality">Nationality</label>
        <input type="text" class="form-control" id="nationality" name="nationality" value="{{ old('nationality') }}" >

    </div>



    <div class="form-group">
        <label>Select Felonies</label>
        <div id="felony-checkbox-group">
            @foreach($felonies as $felony)
            <div class="form-check">
                <input type="checkbox" class="form-check-input felony-checkbox" id="felony-{{ $felony->id }}" name="felony[]" value="{{ $felony->id }}" {{ in_array($felony->id, old('felony', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="felony-{{ $felony->id }}">
                    {{ $felony->name }}
                </label>
            </div>
            @endforeach
        </div>
        <small class="text-muted">You can select up to 4 felonies.</small>
    </div>


    <div class="form-group">
        <label for="device_id">Device</label>
        <select class="form-control" id="device_id" name="device_id">
            <option value="">Select Device</option>
            @foreach($devices as $device)
                <option value="{{ $device->id }}" {{ old('device_id') == $device->id ? 'selected' : '' }}>
                    {{ $device->device_type }}
                </option>
            @endforeach
        </select>

    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
