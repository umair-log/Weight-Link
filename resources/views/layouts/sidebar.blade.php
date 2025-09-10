<!-- sidebar.blade.php -->

<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.jpg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Weigh Link</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="bx bx-arrow-back"></i></div>
    </div>

<!-- Navigation -->
<ul class="metismenu" id="menu">

    {{-- Show only for admin --}}
    @if(auth()->check() && auth()->user()->type === 'admin')
    <li>
        <a href="{{ route('users.index') }}">
            <div class="parent-icon"><i class="bx bx-user"></i></div>
            <div class="menu-title">User Module</div>
        </a>
    </li>

    <li>
        <a href="{{ route('items.index') }}">
            <div class="parent-icon"><i class="bx bx-box"></i></div>
            <div class="menu-title">Item Module</div>
        </a>
    </li>


    @endif

    {{-- Customer Module --}}

    {{-- <li>
        <a href="{{ route('customers.index') }}">
            <div class="parent-icon"><i class="bx bx-user-pin"></i></div>
            <div class="menu-title">Customer Module</div>
        </a>
    </li> --}}


	{{-- <li>
		<a href="{{ route('orders.index') }}">
			<div class="parent-icon"><i class="bx bx-package"></i></div>
			<div class="menu-title">Order Module</div>
		</a>
	</li> --}}



    <li>
        <a href="{{ route('invoices.index') }}">
            <div class="parent-icon"><i class="bx bx-file"></i></div>
            <div class="menu-title">Invoices</div>
        </a>
    </li>

    {{-- Reports - Admin Only --}}
    @if(auth()->check() && auth()->user()->type === 'admin')
    <li>
        <a href="{{ route('reports.index') }}">
            <div class="parent-icon"><i class="bx bx-bar-chart-alt-2"></i></div>
            <div class="menu-title">Reports</div>
        </a>
    </li>
    @endif

    {{-- Client-specific navigation --}}
    @if(auth()->check() && auth()->user()->type === 'client')
    <li>
        <a href="{{ route('profile.edit') }}">
            <div class="parent-icon"><i class="bx bx-user-circle"></i></div>
            <div class="menu-title">Edit Profile</div>
        </a>
    </li>
    @endif

</ul>

{{-- Client Logout Section --}}
@if(auth()->check() && auth()->user()->type === 'client')
<div class="sidebar-footer mt-auto p-3">
    <div class="d-grid">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                <i class="bx bx-log-out me-2"></i>Logout
            </button>
        </form>
    </div>
</div>
@endif

    <!-- End Navigation -->

</aside>
