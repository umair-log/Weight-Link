@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.topbar') 

<div class="page-wrapper">
    <div class="page-content">
        <h4>Add New Customer</h4>

        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Material for Transport:</label>
                <input type="text" name="material_for_transport" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Transportation Company:</label>
                <select name="transportation_company" class="form-control" required>
                    @foreach($companies as $company)
                        <option value="{{ $company }}">{{ $company }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Truck:</label>
                <select name="truck" class="form-control" required>
                    @foreach($trucks as $truck)
                        <option value="{{ $truck }}">{{ $truck }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Customer</button>
        </form>
    </div>
</div>

@include('layouts.footer')
