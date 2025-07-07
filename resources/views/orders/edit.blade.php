@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Edit Order</h4>

    <form method="POST" action="{{ route('orders.update', $order->id) }}">
        @csrf
        @method('PUT')

        @include('orders.form', ['order' => $order])

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
