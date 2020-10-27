

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-users"></i><span>Users</span></a>
</li>


<li class="{{ Request::is('butchers*') ? 'active' : '' }}">
    <a href="{{ route('butchers.index') }}"><i class="fa fa-cut"></i><span>Butchers</span></a>
</li>

<li class="{{ Request::is('meatTypes*') ? 'active' : '' }}">
    <a href="{{ route('meatTypes.index') }}"><i class="fa fa-edit"></i><span>Meat Types</span></a>
</li>

<li class="{{ Request::is('complaints*') ? 'active' : '' }}">
    <a href="{{ route('complaints.index') }}"><i class="fa fa-comment"></i><span>Complaints</span></a>
</li>

<li class="{{ Request::is('intros*') ? 'active' : '' }}">
    <a href="{{ route('intros.index') }}"><i class="fa fa-list"></i><span>Intros</span></a>
</li>

<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{{ route('settings.index') }}"><i class="fa fa-cogs"></i><span>Settings</span></a>
</li>
