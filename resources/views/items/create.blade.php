@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Add Item</h4>

    <form method="POST" action="{{ route('items.store') }}">
        @csrf
        <div class="mb-3">
            <label>Item Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
