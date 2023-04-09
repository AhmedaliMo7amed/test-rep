<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo mt-2 p-0">
    <a href="{{ route('admin_dashboard') }}" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bold"><img src="{{ asset('uploads/' . $setting->logo_image) }}" style ="width: 95%;" width="200px" height="75px" /></span>
    </a>

  </div>

  <div class="menu-divider mt-0"></div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">

    <li class="menu-item {{ request()->is('admin_panel') ? 'active' : '' }}">
      <a href="{{ route('admin_dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-stats"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    <li class="menu-item {{ request()->is('admin_panel/settings') ? 'active' : '' }}">
      <a href="{{ route('admin_panel.settings') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div data-i18n="Settings">Settings</div>
      </a>
    </li>

    <li class="menu-item {{ request()->is('admin_panel/users') ? 'active' : '' }}">
      <a href="{{ route('admin_panel.users.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Users">Users</div>
      </a>
    </li>

    <li class="menu-item {{ (request()->is('admin_panel/categories*') || request()->is('admin_panel/sub_categories*')
    || request()->is('admin_panel/profiles*') || request()->is('admin_panel/activities*')
    || request()->is('admin_panel/sub_activities*') ) ? 'open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-building"></i>
        <div data-i18n="Hotel">Hotel</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item {{ request()->is('admin_panel/categories*') ? 'active' : '' }}">
          <a href="{{ route('admin_panel.categories.index', ['lang' => 'en']) }}" class="menu-link">
            <div data-i18n="Categories">Categories</div>
          </a>
        </li>  
        <li class="menu-item {{ request()->is('admin_panel/sub_categories*') ? 'active' : '' }}">
          <a href="{{ route('admin_panel.sub_categories.index', ['lang' => 'en']) }}" class="menu-link">
            <div data-i18n="Sub Categories">Sub Categories</div>
          </a>
        </li>  
        <li class="menu-item {{ request()->is('admin_panel/profiles*') ? 'active' : '' }}">
          <a href="{{ route('admin_panel.profiles.index') }}" class="menu-link">
            <div data-i18n="Profiles">Profiles</div>
          </a>
        </li>  
        <li class="menu-item {{ request()->is('admin_panel/activities*') ? 'active' : '' }}">
          <a href="{{ route('admin_panel.activities.index') }}" class="menu-link">
            <div data-i18n="Activities">Activities</div>
          </a>
        </li> 
        <li class="menu-item {{ request()->is('admin_panel/sub_activities*') ? 'active' : '' }}">
          <a href="{{ route('admin_panel.sub_activities.index') }}" class="menu-link">
            <div data-i18n="Sub Activities">Sub Activities</div>
          </a>
        </li> 
        {{-- <li class="menu-item {{ request()->is('admin_panel/activities*') ? 'active' : '' }}">
          <a href="{{ route('admin_panel.activities.index') }}" class="menu-link">
            <div data-i18n="Activities">Activities</div>
          </a>
        </li>      --}}
      </ul>
    </li>

    <li class="menu-item {{ request()->is('admin_panel/reservations') ? 'active' : '' }}">
      <a href="{{ route('admin_panel.reservations.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-basket"></i>
        <div data-i18n="Reservations">Reservations</div>
      </a>
    </li>

    <li class="menu-item {{ request()->is('admin_panel/blogs*') ? 'active' : '' }}">
      <a href="{{ route('admin_panel.blogs.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-news"></i>
        <div data-i18n="Blogs">Blogs</div>
      </a>
    </li>


      <li class="menu-item {{ request()->is('admin_panel/contact_requests*') ? 'active' : '' }}">
        <a href="{{ route('admin_panel.contact_requests.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-message"></i>
          <div data-i18n="Contact Requests">Contact Requests</div>
        </a>
      </li>

      <li class="menu-item {{ request()->is('admin_panel/feedbacks*') ? 'active' : '' }}">
        <a href="{{ route('admin_panel.feedbacks.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-crown"></i>
          <div data-i18n="Feedbacks">Feedbacks</div>
        </a>
      </li>

  </ul>

</aside>