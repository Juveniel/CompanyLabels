<ul class="nav navbar-nav">
    @if (Auth::check() && Auth::user()->getRole() === 'admin')
        <li>
            <a   href="/admin/dashboard">
                <i class='fa fa-home fa-fw'></i>
                Dashboard
            </a>
        </li>

        <li class="heading"><h4>System modules</h4></li>

        <li @if (Request::is('admin/users*')) class="dropdown active" @endif class="dropdown" data-toggle="collapse" href="#user-mod-sub">
            <a >
                <i class="fa fa-users fa-fw"></i>
                Users
                <span class="epxpand-triger"></span>
            </a>
            <ul @if (Request::is('admin/users*')) class="sub-menu collapse in" @endif id="user-mod-sub"  class="sub-menu collapse" >
                <li>
                    <a  href="/admin/users">
                        <i class="fa fa-list fa-fw"></i>
                        List
                    </a>
                </li>
                <li>
                    <a   href="/admin/users/create">
                        <i class="fa fa-user-plus fa-fw"></i>
                        Create
                    </a>
                </li>
                <li>
                    <a href="/admin/users/{{Auth::user()->id}}">
                        <i class="fa fa-user fa-fw"></i>
                        View profile
                    </a>
                </li>
            </ul>
        </li>

        <li @if (Request::is('admin/companies*')) class="dropdown active" @endif class="dropdown" data-toggle="collapse" href="#company-mod-sub">
            <a >
                <i class="fa fa-briefcase fa-fw"></i>
                Companies
                <span class="epxpand-triger"></span>
            </a>
            <ul @if (Request::is('admin/companies*')) class="sub-menu collapse in" @endif id="company-mod-sub"  class="sub-menu collapse" >
                <li>
                    <a  href="/admin/companies">
                        <i class="fa fa-list fa-fw"></i>
                        List
                    </a>
                </li>
                <li>
                    <a   href="/admin/companies/create">
                        <i class="fa fa-user-plus fa-fw"></i>
                        Create
                    </a>
                </li>
            </ul>
        </li>

        <li @if (Request::is('admin/labels*')) class="dropdown active" @endif class="dropdown" data-toggle="collapse" href="#labels-mod-sub">
            <a >
                <i class="fa fa-braille fa-fw"></i>
                Label Templates
                <span class="epxpand-triger"></span>
            </a>
            <ul @if (Request::is('admin/labels*')) class="sub-menu collapse in" @endif id="labels-mod-sub"  class="sub-menu collapse" >
                <li>
                    <a  href="/admin/labels">
                        <i class="fa fa-list fa-fw"></i>
                        List
                    </a>
                </li>
                <li>
                    <a   href="/admin/labels/create">
                        <i class="fa fa-user-plus fa-fw"></i>
                        Add label template
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="/admin/settings">
                <i class="fa fa-cog fa-fw"></i>
                Settings
            </a>
        </li>

        <li @if (Request::is('admin/logs*')) class="dropdown active" @endif class="dropdown" data-toggle="collapse" href="#logs-mod-sub">
            <a >
                <i class="fa fa-users fa-fw"></i>
                Logs
            </a>
            <ul @if (Request::is('admin/logs*')) class="sub-menu collapse in" @endif id="logs-mod-sub"  class="sub-menu collapse" >
                <li>
                    <a  href="/admin/logs/access">
                        <i class="fa fa-lock fa-fw"></i>
                        Access log
                    </a>
                </li>
            </ul>
        </li>

        <li class="heading"><h4>Frontend modules</h4></li>

        <li>
            <a   href="/admin/companyCatalogue">
                <i class='fa fa-info fa-fw'></i>
                Catalogue
            </a>
        </li>

    @endif
</ul>

