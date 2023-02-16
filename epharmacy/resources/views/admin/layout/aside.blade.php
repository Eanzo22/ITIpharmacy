<nav class="navbar navbar-expand-sm navbar-default">

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li>
                <a href="{{route('drugs.index')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
            </li>
            <li class="menu-item-has-children  dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>drugs</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="{{route('drugs.index')}}">All drugs</a></li>
                    <li><i class="fa fa-table"></i><a href="{{route ('drugs.create')}}">create drug</a></li>
                    <li><i class="fa fa-table"></i><a href="{{route ('drugs.archive')}}">archive drug</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children  dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>companies</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="{{route('companies.index')}}">All companies</a></li>
                    <li><i class="fa fa-table"></i><a href="{{route ('companies.create')}}">create company</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children  dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>categories</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="{{route('categories.index')}}">All categories</a></li>
                    <li><i class="fa fa-table"></i><a href="{{route ('categories.create')}}">create categories</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children  dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>orders</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="{{route('orders.index')}}">All orders</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children  dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>users</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="{{route('users.index')}}">All users</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>