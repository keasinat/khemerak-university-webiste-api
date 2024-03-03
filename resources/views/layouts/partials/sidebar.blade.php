<aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link">
          <img src="{{ asset('/images/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">EDF Portal</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
              <a href="#" class="d-block">Hi @if(Auth::check()) {{ Auth::user()->name }}  @endif</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    {{ __('dashboard.dashboard') }}
                  </p>
                </a>
              </li>
              @can('news-list')
                <li class="nav-item">
                <a href="{{ route('admin.slideshow.index') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'slideshow') == 0) ? '' : 'active ' }}">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    {{ __('dashboard.slideshow_management') }}
                  </p>
                </a>
              </li>
              @endcan
              @can('news-list')
                <li class="nav-item">
                <a href="{{ route('admin.news.index') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'news') == 0) ? '' : 'active ' }}">
                  <i class="nav-icon far fa-newspaper"></i>
                  <p>
                    {{ __('dashboard.blog_management') }}
                  </p>
                </a>
              </li>
              @endcan
              @can('staff-list')
              <li class="nav-item">
                <a href="{{ route('admin.staff.index') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'staff') == 0) ? '' : 'active ' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    {{ __('dashboard.staff_management') }}
                  </p>
                </a>
              </li>
              @endcan
                @can('document-list')
              <li class="nav-item {{ (strpos(Route::currentRouteName(), 'document') == 0) ? '' : 'menu-open' }}">
                <a href="#" class="nav-link {{ (strpos(Route::currentRouteName(), 'document') == 0) ? '' : 'active ' }}">
                  <i class="nav-icon fas fa-file-pdf"></i>
                  <p>
                    {{ __('dashboard.document_management') }}
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="{{ route('admin.document.index') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'document') == 0) ? '' : 'active ' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ __('dashboard.document_management') }}</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.document.category.index') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'category') == 0) ? '' : 'active ' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ __('dashboard.document_category') }}</p>
                    </a>
                  </li>
                </ul>
              </li>
                @endcan

                @can('event-list')
              <li class="nav-item {{ (strpos(Route::currentRouteName(), 'event') == 0) ? '' : 'menu-open' }}">
                <a href="#" class="nav-link {{ (strpos(Route::currentRouteName(), 'event') == 0) ? '' : 'active ' }}">
                  <i class="nav-icon fas far fa-calendar"></i>
                  <p>
                    {{ __('dashboard.event_management') }}
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.event.index') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'event') == 0) ? '' : 'active ' }}">
                      <i class="far fa-calendar nav-icon"></i>
                      <p>{{ __('dashboard.event_management') }}</p>
                    </a>
                  </li>
                </ul>
              </li>
                @endcan
                @can('partner-list')
                <li class="nav-item">
                <a href="{{ route('admin.partner.index') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'partner') == 0) ? '' : 'active ' }}">
                  <i class="nav-icon far fa-newspaper"></i>
                  <p>
                    {{ __('dashboard.partner_management') }}
                  </p>
                </a>
              </li>
              @endcan
              <li class="nav-header">File Manager</li>

              <li class="nav-item">
                <a href="{{ route('admin.filemanager') }}" target="_blank" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    File Manager
                  </p>
                </a>
              </li>
              <li class="nav-header">Access</li>
              @can('user-list')
              <li class="nav-item {{ (strpos(Route::currentRouteName(), 'user') == 0) ? '' : 'menu-open' }} {{ (strpos(Route::currentRouteName(), 'role') == 0) ? '' : 'menu-open' }}">
                <a href="#" class="nav-link {{ (strpos(Route::currentRouteName(), 'user') == 0) ? ''  : 'active' }}{{ (strpos(Route::currentRouteName(), 'role') == 0) ? ''  : 'active' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    {{ __('dashboard.user_management') }}
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @can('user-list')
                  <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'user') == 0) ? '' : 'active' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('dashboard.user_management') }}</p>
                    </a>
                          </li>
                  @endcan
                  @can('role-list')
                          <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'role') == 0) ? '' : 'active' }}">
                            <i class="far fa-circle nav-icon"></i><p>{{ __('dashboard.role_management') }}</p>
                    </a>
                  </li>
                  @endcan
                </ul>
              </li>
              @endcan
              <li class="nav-item">
                <a href="" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>{{ __('dashboard.logout') }}</p>
                </a>
                <x-forms.post :action="route('logout')" id="logout-form" class="d-none"/>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
</aside>
