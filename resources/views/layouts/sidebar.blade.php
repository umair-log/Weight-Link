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
    @endif

    {{-- Customer Module --}}

    {{-- <li>
        <a href="{{ route('customers.index') }}">
            <div class="parent-icon"><i class="bx bx-user-pin"></i></div>
            <div class="menu-title">Customer Module</div>
        </a>
    </li> --}}


	<li>
		<a href="{{ route('orders.index') }}">
			<div class="parent-icon"><i class="bx bx-package"></i></div>
			<div class="menu-title">Order Module</div>
		</a>
	</li>

    <li>
        <a href="{{ route('items.index') }}">
            <div class="parent-icon"><i class="bx bx-box"></i></div>
            <div class="menu-title">Item Module</div>
        </a>
    </li>

    <li>
        <a href="{{ route('invoices.index') }}">
            <div class="parent-icon"><i class="bx bx-file"></i></div>
            <div class="menu-title">Invoices</div>
        </a>
    </li>

</ul>

    <!-- End Navigation -->

</aside>
