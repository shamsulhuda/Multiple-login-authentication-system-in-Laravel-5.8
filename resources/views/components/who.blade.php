@if(Auth::guard('web')->check())
    <p class="text-success">
        You're Logged in as a <strong>USER</strong>!
    </p>
@else
    <p class="text-danger">
        You're Logged out as a <strong>USER</strong>!
    </p>
@endif


@if(Auth::guard('admin')->check())
    <p class="text-success">
        You're Logged in as <strong>ADMIN</strong>!
    </p>
@else
    <p class="text-danger">
        You're Logged out as <strong>ADMIN</strong>!
    </p>
@endif