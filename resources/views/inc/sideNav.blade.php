  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-success">
   <!-- Brand Logo -->
   <a href="/home" class="brand-link">
     <img src="/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">Yeka Prosperity</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="{{Session::get('user')->img}}" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">{{Session::get('user')->fullName}}</a>
       </div>
     </div>

     <!-- SidebarSearch Form -->

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/home" class="nav-link @if($page == 'Dashbord') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                  Home page
            </p>
         </a>
        </li>
        <li class="nav-item @if($page == 'leader Profile' || $page == '') menu-open @endif">
          <a href="#" class="nav-link @if($page == 'leader Profile' || $page == '') active @endif">
            <i class="nav-icon fas fa-building"></i>
            <p>
             Manage Profiles
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/leaders_profile" class="nav-link @if($page == 'leader Profile') active @endif">
                <i class="fas fa-users nav-icon"></i>
                <p>leaders Profiles</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/org_profile" class="nav-link @if($page == '') active @endif">
                <i class="fas fa-id-badge nav-icon"></i>
                <p>Organization Profiles</p>
              </a>
            </li>
          </ul>
        </li>
         <li class="nav-item @if($page == 'leaders Type Setting') menu-open @endif">
           <a href="#" class="nav-link @if($page == 'leaders Type Setting') active @endif">
             <i class="nav-icon fas fa-cogs"></i>
             <p>
              Settings
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
             <ul class="nav nav-treeview">
                 <li class="nav-item">
                     <a href="/social_media" class="nav-link @if($page == 'Social Media Setting') active @endif">
                         <i class="fas fa-users-cog nav-icon"></i>
                         <p>Social Media</p>
                     </a>
                 </li>
             </ul>
             <ul class="nav nav-treeview">
                 <li class="nav-item">
                     <a href="/social_media_property" class="nav-link @if($page == 'Social Media Property  Setting') active @endif">
                         <i class="fas fa-users-cog nav-icon"></i>
                         <p>Social Media Property</p>
                     </a>
                 </li>
             </ul>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="/leaders_type" class="nav-link @if($page == 'leaders Type Setting') active @endif">
                 <i class="fas fa-users-cog nav-icon"></i>
                 <p>leaders Type</p>
               </a>
             </li>
           </ul>
         </li>

       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>
