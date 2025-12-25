@php
    $setting = App\Models\Setting::first();
@endphp


<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}">{{ $setting->sidebar_lg_header }}</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('admin.dashboard') }}">{{ $setting->sidebar_sm_header }}</a>
      </div>
      <ul class="sidebar-menu">
        <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> <span>{{__('admin.Dashboard')}}</span></a></li>

          <li class="nav-item dropdown {{ Route::is('admin.all-booking') || Route::is('admin.booking-show') || Route::is('admin.awaiting-booking') || Route::is('admin.complete-request') || Route::is('admin.active-booking') || Route::is('admin.completed-booking') || Route::is('admin.declined-booking')  ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>{{__('admin.All Bookings')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.all-booking') || Route::is('admin.booking-show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.all-booking') }}">{{__('admin.All Bookings')}}</a></li>

                <li class="{{ Route::is('admin.awaiting-booking') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.awaiting-booking') }}">{{__('admin.Awaiting Approval')}}</a></li>

                <li class="{{ Route::is('admin.active-booking') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.active-booking') }}">{{__('admin.Active Bookings')}}</a></li>

                <li class="{{ Route::is('admin.completed-booking') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.completed-booking') }}">{{__('admin.Completed Bookings')}}</a></li>

                <li class="{{ Route::is('admin.complete-request') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.complete-request') }}">{{__('admin.Complete Request')}}</a></li>
                <li class="{{ Route::is('admin.declined-booking') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.declined-booking') }}">{{__('admin.Declined Bookings')}}</a></li>

              </ul>
            </li>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.service.*') || Route::is('admin.awaiting-for-approval-service') || Route::is('admin.active-service') ||  Route::is('admin.banned-service') || Route::is('admin.review-list') || Route::is('admin.show-review') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('admin.Manage Services')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.service.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.service.index') }}">{{__('admin.All Service')}}</a></li>

                <li class="{{ Route::is('admin.awaiting-for-approval-service') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.awaiting-for-approval-service') }}">{{__('admin.Awaiting for Approval')}}</a></li>

                <li class="{{ Route::is('admin.active-service') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.active-service') }}">{{__('admin.Active Service')}}</a></li>

                <li class="{{ Route::is('admin.banned-service') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.banned-service') }}">{{__('admin.Banned Service')}}</a></li>


                <li class="{{ Route::is('admin.review-list') || Route::is('admin.show-review') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.review-list') }}">{{__('admin.Service Review')}}</a></li>


            </ul>
          </li>


          <li class="{{ Route::is('admin.category.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category.index') }}"><i class="fas fa-th-large"></i> <span>{{__('admin.Categories')}}</span></a></li>
          <li class="{{ Route::is('admin.admin.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.admin.index') }}"><i class="fas fa-user"></i> <span>{{__('admin.Admin list')}}</span></a></li>
          <li class="nav-item dropdown {{  Route::is('admin.provider') || Route::is('admin.send-email-to-all-provider') || Route::is('admin.send-email-to-provider') || Route::is('admin.pending-provider') || Route::is('admin.provider-show') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>{{__('admin.Providers')}}</span></a>
            <ul class="dropdown-menu">

                <li class="{{ Route::is('admin.provider') || Route::is('admin.provider-show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.provider') }}">{{__('admin.Provider List')}}</a></li>

                <li class="{{ Route::is('admin.pending-provider') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pending-provider') }}">{{__('admin.Pending Provider')}}</a></li>

            </ul>
          </li>

          <li class="nav-item dropdown {{  Route::is('admin.customer-list') || Route::is('admin.customer-show') || Route::is('admin.pending-customer-list') || Route::is('admin.send-email-to-all-customer') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>{{__('admin.Users')}}</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.customer-list') || Route::is('admin.customer-show') || Route::is('admin.send-email-to-all-customer') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.customer-list') }}">{{__('admin.User List')}}</a></li>

                <li class="{{ Route::is('admin.pending-customer-list') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pending-customer-list') }}">{{__('admin.Pending User')}}</a></li>
            </ul>
          </li>

          @php
                $unseenMessages = App\Models\TicketMessage::where('unseen_admin', 0)->groupBy('ticket_id')->get();
                $count = $unseenMessages->count();
            @endphp

          <li class="{{ Route::is('admin.ticket') || Route::is('admin.ticket-show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.ticket') }}"><i class="fas fa-envelope-open-text"></i> <span>{{__('admin.Support Ticket')}}</span></a></li>
          <!-- <li class="{{ Route::is('admin.ticket') || Route::is('admin.ticket-show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.ticket') }}"><i class="fas fa-envelope-open-text"></i> <span>{{__('admin.Support Ticket')}} <sup class="badge badge-danger">{{ $count }}</sup></span></a></li> -->


          <li class="nav-item dropdown {{ Route::is('admin.withdraw-method.*') || Route::is('admin.provider-withdraw') || Route::is('admin.pending-provider-withdraw') || Route::is('admin.show-provider-withdraw')  ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>{{__('admin.Withdraw Payment')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.withdraw-method.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.withdraw-method.index') }}">{{__('admin.Withdraw Method')}}</a></li>

                <li class="{{ Route::is('admin.provider-withdraw') || Route::is('admin.show-provider-withdraw') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.provider-withdraw') }}">{{__('admin.Provider Withdraw')}}</a></li>

                <li class="{{ Route::is('admin.pending-provider-withdraw') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pending-provider-withdraw') }}">{{__('admin.Withdraw Request')}}</a></li>

            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.country.*') || Route::is('admin.state.*') || Route::is('admin.city.*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i><span>{{__('admin.Locations')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.country.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.country.index') }}">Country</a></li>
                <li class="{{ Route::is('admin.state.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.state.index') }}">City</a></li>
                <li class="{{ Route::is('admin.city.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.city.index') }}">Service Area</a></li>

            </ul>
          </li>


          <li class="{{ Route::is('admin.reports') ? 'active' : '' }}"><a class="nav-link d-none" href="{{ route('admin.reports') }}"><i class="fas fa-file"></i> <span>{{__('admin.Provider/Client Reports')}}</span></a></li>


          <li class="nav-item dropdown {{ Route::is('admin.email-configuration') || Route::is('admin.email-template') || Route::is('admin.edit-email-template') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i><span>{{__('admin.Email Configuration')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.email-configuration') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.email-configuration') }}">{{__('admin.Setting')}}</a></li>
            </ul>
          </li>
        </ul>

    </aside>
  </div>
