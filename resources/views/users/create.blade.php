@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.topbar')

<div class="page-wrapper">
    <div class="page-content">
        <h4>Add New User</h4>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Type</label>
                <select name="type" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="client">Client</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-sm btn-success">Create User</button>
        </form>
    </div>
</div>

@include('layouts.footer')
