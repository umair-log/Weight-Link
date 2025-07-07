@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">{{ isset($invoice) ? 'Edit' : 'Create' }} Invoice</h4>

    <form action="{{ isset($invoice) ? route('invoices.update', $invoice) : route('invoices.store') }}" method="POST">
        @csrf
        @if(isset($invoice)) @method('PUT') @endif

        @include('invoices.form')

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
