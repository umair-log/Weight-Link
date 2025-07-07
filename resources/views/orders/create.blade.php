@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Create Order</h4>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        @include('orders.form', ['order' => null])

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
