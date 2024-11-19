{{-- @php
    $roleId = Auth::user()->role_id;
@endphp --}}

<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            {{-- @if ($roleId == 1) --}}
                <li>
                    <a href="{{ url('/dashboard') }}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/customer') }}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i>
                        <span class="nav-text">Customer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/deals') }}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i>
                        <span class="nav-text">Deal</span>
                    </a>
                </li>



                <li>
                    <a href="{{ url('/client') }}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i>
                        <span class="nav-text">Client</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/balance-page') }}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i>
                        <span class="nav-text">Balance Sheet</span>
                    </a>
                </li>
            {{-- @endif --}}
        </ul>
    </div>
</div>
