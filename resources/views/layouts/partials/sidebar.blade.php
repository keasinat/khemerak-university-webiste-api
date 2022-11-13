<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('/images/logo-round.svg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Business Gov</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('dashboard.dashboard') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.page.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                {{ __('dashboard.page_management') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.news.index') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'news.activity') == 0) ? 'active' : '' }}">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                {{ __('dashboard.blog_management') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                {{ __('dashboard.business_management') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.activity.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('dashboard.activity_list') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('dashboard.ministry_list') }}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Media</li>

          <li class="nav-item">
            <a href="{{ route('admin.unisharp.lfm.show') }}" target="_blank" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>{{ __('dashboard.logout') }}</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>