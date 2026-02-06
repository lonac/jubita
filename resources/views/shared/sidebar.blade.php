<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li><a href="{{route('dashboard')}}" class="waves-effect"><i class="fa fa-dashboard fa-fw"></i> <span>Dashboard</span></a></li>
                    
            <li>
                <a href="#" class="waves-effect"> <i class="fa fa-globe fa-fw"></i> <span class="hide-menu">Contents<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">  
                    <li> <a href="{{route('content.content.create')}}">Registrations</a> </li>
                    <li> <a href="{{route('content.content.index')}}">List</a> </li>
                </ul>
            </li> 


            <li>
                <a href="#" class="waves-effect"> <i class="fa fa-list fa-fw"></i> <span class="hide-menu">Products<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">  
                    <li> <a href="{{route('product.product.create')}}">Registrations</a> </li>
                    <li> <a href="{{route('product.product.index')}}">List</a> </li>
                </ul>
            </li>

            
            <li> 
                <a href="#" class="waves-effect"> <i class="fa fa-money fa-fw"></i> <span class="hide-menu">Markets<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">  
                    <li> <a href="{{route('market.market_price.create')}}">Registrations</a> </li>
                    <li> <a href="{{route('market.market_price.index')}}">List</a> </li>
                </ul>
            </li>


           
          

            @can('configure')
            <li>
                <a href="#" class="waves-effect"><i class="fa fa-gear fa-fw"></i> 
                <span class="hide-menu">Configurations<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level"> 
                    <li> <a href="{{route('settings.categories.index')}}">Categories</a> </li>
                    <li> <a href="{{route('settings.post_type.index')}}">Post Types</a> </li> 
                    <li> <a href="{{route('settings.commodity_type.index')}}">Commodity Type</a> </li>
                    <li> <a href="{{route('settings.role.index')}}">Roles & Permissions</a> </li>
                    <li><a href="#">Passwords</a></li>
                </ul>
            </li>
            @endcan 
            <li><a href="{{route('logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
    </div>
</div>