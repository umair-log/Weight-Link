@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.topbar')

<div class="page-wrapper">
    <div class="page-content">
        <h4>Edit User</h4>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Type</label>
                <select name="type" class="form-control" required>
                    <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="client" {{ $user->type == 'client' ? 'selected' : '' }}>Client</option>
                </select>
            </div>

            <div class="mb-3">
                <label>New Password <small>(leave blank to keep existing)</small></label>
                <input type="password" name="password" class="form-control">
            </div>

            <button class="btn btn-sm btn-primary">Update User</button>
        </form>
    </div>
</div>

@include('layouts.footer')
