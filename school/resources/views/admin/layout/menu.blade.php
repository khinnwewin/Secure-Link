<li class="{{ Request::is('article*') ? 'active' : '' }}">
    <a href="{{ route('article.index') }}"><i class="fa fa-edit"></i><span>Activities</span></a>
</li>
<li class="{{ Request::is('one*') ? 'active' : '' }}">
    <a href="{{ route('one.index') }}"><i class="fa fa-edit"></i><span>One</span></a>
</li>
<li class="{{ Request::is('information*') ? 'active' : '' }}">
    <a href="{{ route('information.index') }}"><i class="fa fa-edit"></i><span>Information</span></a>
</li>