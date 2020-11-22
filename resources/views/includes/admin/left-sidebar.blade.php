<div class="br-sideleft sideleft-scrollbar">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <a href="{{ url('/admin-panel') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Dashboard</span>
    </a>
    <a href="#" data-parent="profile_website" class="br-menu-link">
        <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-person-outline tx-24"></i>
        <span class="menu-item-label">Home Page</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a>

    <ul class="br-menu-sub nav flex-column" data-child="profile_website" style="display: none;">
        <li class="nav-item"><a href="{{ route('admin.social-links-index') }}" class="nav-link">Social Links</a></li>
        <li class="nav-item"><a href="{{ route('admin.header-text-index') }}" class="nav-link">Header Text</a></li>
        <li class="nav-item"><a href="{{ route('admin.about-us-add') }}" class="nav-link">About Us</a></li>
    </ul>
    <a href="{{ route('admin.services-index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Services</span>
    </a>

     <a href="{{ route('admin.products-index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Products</span>
    </a>

    <a href="{{ route('admin.our-team-index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Our Team</span>
    </a>
    <a href="{{ route('admin.page-about-us-add') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">About Us</span>
    </a>
   
      <a href="#" data-parent="profile_website" class="br-menu-link">
        <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-person-outline tx-24"></i>
        <span class="menu-item-label">Bookings</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a>

    <ul class="br-menu-sub nav flex-column" data-child="profile_website" >
        <li class="nav-item"><a href="{{ route('admin.bookings-index') }}" class="nav-link">Bookings inquiries</a></li>
        <li class="nav-item"><a href="{{ route('admin.bookings-confirmBookings') }}" class="nav-link">Bookings</a></li>
    </ul>
    <a href="#" data-parent="profile_website" class="br-menu-link">
        <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-person-outline tx-24"></i>
        <span class="menu-item-label">Gallery</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a>

    <ul class="br-menu-sub nav flex-column" data-child="profile_website" >
        <li class="nav-item"><a href="{{ route('admin.gallery-index') }}" class="nav-link">gallery</a></li>
        <li class="nav-item"><a href="{{ route('admin.gallery-add') }}" class="nav-link">add</a></li>
    </ul>
    
</div>
