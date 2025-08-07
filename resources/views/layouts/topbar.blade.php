<nav class="navbar navbar-expand px-3 border-bottom shadow-sm bg-white">
    <div class="d-flex align-items-center ms-auto">
        @auth
        <div class="dropdown">
            <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjEofX99GPaBBLF9NPxmpiDRHAmvY00shDnw&s" alt="Profile" width="32" height="32" class="rounded-circle me-2">
                <div class="d-none d-sm-block text-start">
                    <div class="fw-bold">{{ auth()->user()->name }}</div>
                    <small class="text-muted">{{ ucfirst(auth()->user()->type) }}</small>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Update Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>