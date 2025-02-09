<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        @can('admins')
        <li class=" nav-item"><a href="{{route('dashboard.roles.index')}}">
            <i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{__('dashboard.roles')}}</span></a>
          <ul class="menu-content">
            <li class="active"><a class="menu-item" href="{{route('dashboard.roles.index')}}" data-i18n="nav.dash.ecommerce">{{__('dashboard.allroles')}}</a>
            </li>
            <li><a class="menu-item" href="{{route('dashboard.managers.index')}}" data-i18n="nav.dash.crypto">{{__('dashboard.admins')}}</a>
            </li>

          </ul>
        </li>
        @endcan

        @can('content')
        <li class=" nav-item"><a href="{{route('dashboard.header')}}"><i class="la la-header"></i><span class="menu-title" data-i18n="nav.form_wizard.main">{{__('dashboard.header_site')}}</span></a>
        </li>
        @endcan

        @can('content')
        <li class=" nav-item"><a href="{{route('dashboard.settings')}}"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">{{__('dashboard.settings')}}</span></a>
        </li>
        @endcan

        @can('content')
        <li class=" nav-item"><a href="{{route('dashboard.about')}}"><i class="la la-search"></i><span class="menu-title" data-i18n="nav.templates.main">{{__('dashboard.about')}}</span></a>
        </li>
        @endcan

        @can('content')
        <li class=" nav-item"><a href="{{route('dashboard.skills')}}"><i class="la la-diamond"></i><span class="menu-title" data-i18n="nav.templates.main">{{__('dashboard.skills')}}</span></a>

        </li>
        @endcan
        @can('content')
        <li class=" nav-item"><a href="{{route('dashboard.clients')}}"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.users.main">{{__('dashboard.clients')}}</span></a>
        </li>
        @endcan
        @can('content')
        <li class=" nav-item"><a href="{{route('dashboard.services.index')}}"><i class="la la-paste"></i><span class="menu-title" data-i18n="nav.form_wizard.main">{{__('dashboard.services')}}</span></a>
        </li>
        @endcan

        @can('content')
        <li class=" nav-item"><a href="{{route('dashboard.testimonials.index')}}"><i class="la la-edit"></i><span class="menu-title" data-i18n="nav.form_wizard.main">{{__('dashboard.testmonials')}}</span></a>
        </li>
        @endcan

        @can('content')
        <li class=" nav-item"><a href="{{route('dashboard.faq.index')}}"><i class="la la-paint-brush"></i><span class="menu-title" data-i18n="nav.form_wizard.main">{{__('dashboard.faq')}}</span></a>
        </li>
        @endcan

        @can('content')
        <li class=" nav-item"><a href="{{route('dashboard.teams.index')}}"><i class="la la-comments"></i><span class="menu-title" data-i18n="nav.form_wizard.main">{{__('dashboard.team')}}</span></a>
        </li>
        @endcan

        @can('manage_cumtomers')
        <li class="nav-item"><a href="{{route('dashboard.messages.index')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="nav.form_wizard.main">{{__('dashboard.customer_orders')}}</span></a>
        </li>
        @endcan

        @can('content')
        <li class=" nav-item"><a href="{{route('dashboard.blog.index')}}"><i class=" la la-file-text"></i><span class="menu-title" data-i18n="nav.form_wizard.main">{{__('dashboard.blog')}}</span></a>
        </li>
        @endcan
      </ul>
    </div>
  </div>
