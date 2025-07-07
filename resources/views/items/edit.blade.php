@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Edit Item</h4>

    <form method="POST" action="{{ route('items.update', $item->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Item Name</label>
            <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
