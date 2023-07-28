  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-success">
   <!-- Brand Logo -->
   <a href="/home" class="brand-link">
     <img src="/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">PMS</span>
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
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/home" class="nav-link @if($page == 'Dashbord') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                  Dashboard
              </p>
         </a>
        </li>
           <li class="nav-item @if($page == 'leaders Type Setting') menu-open @endif">
               <a href="#" class="nav-link @if($page == 'leaders Type Setting') active @endif">
                   <i class="nav-icon fas fa-building"></i>
                   <p>
                       Organization Module
                       <i class="right fas fa-angle-left"></i>
                   </p>
               </a>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="/organizational_jobs" class="nav-link @if($page == 'Job Section') active @endif">
                           <i class="fas fa-users-cog nav-icon"></i>
                           <p>Job Section</p>
                       </a>
                   </li>
               </ul>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="/leaders_type" class="nav-link @if($page == 'leaders Type Setting') active @endif">
                           <i class="fas fa-users-cog nav-icon"></i>
                           <p>Purchase Request</p>
                       </a>
                   </li>
               </ul>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="/organization" class="nav-link @if($page == 'Organization Setting') active @endif">
                           <i class="fas fa-users-cog nav-icon"></i>
                           <p>Indent Request</p>
                       </a>
                   </li>
               </ul>
           </li>
           <li class="nav-item @if($page == 'leaders Type Setting') menu-open @endif">
               <a href="#" class="nav-link @if($page == 'leaders Type Setting') active @endif">
                   <i class="nav-icon fas fa-money-bill-wave"></i>
                   <p>
                       Financial Module
                       <i class="right fas fa-angle-left"></i>
                   </p>
               </a>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="/leaders_type" class="nav-link @if($page == 'leaders Type Setting') active @endif">
                           <i class="fas fa-users-cog nav-icon"></i>
                           <p>Finacial Year</p>
                       </a>
                   </li>
               </ul>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="/organization" class="nav-link @if($page == 'Organization Setting') active @endif">
                           <i class="fas fa-users-cog nav-icon"></i>
                           <p>Store Creation</p>
                       </a>
                   </li>
               </ul>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="/organization" class="nav-link @if($page == 'Organization Setting') active @endif">
                           <i class="fas fa-users-cog nav-icon"></i>
                           <p>Item Category</p>
                       </a>
                   </li>
               </ul>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="/organization" class="nav-link @if($page == 'Organization Setting') active @endif">
                           <i class="fas fa-users-cog nav-icon"></i>
                           <p>Expense Category</p>
                       </a>
                   </li>
               </ul>
           </li>
           <li class="nav-item @if($page == 'leaders Type Setting') menu-open @endif">
               <a href="#" class="nav-link @if($page == 'leaders Type Setting') active @endif">
                   <i class="nav-icon fas fa-store-slash"></i>
                   <p>
                       Store Management
                       <i class="right fas fa-angle-left"></i>
                   </p>
               </a>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="/leaders_type" class="nav-link @if($page == 'leaders Type Setting') active @endif">
                           <i class="fas fa-users-cog nav-icon"></i>
                           <p>Item Creation</p>
                       </a>
                   </li>
               </ul>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="/organization" class="nav-link @if($page == 'Organization Setting') active @endif">
                           <i class="fas fa-users-cog nav-icon"></i>
                           <p>Store Creation</p>
                       </a>
                   </li>
               </ul>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="/organization" class="nav-link @if($page == 'Organization Setting') active @endif">
                           <i class="fas fa-users-cog nav-icon"></i>
                           <p>Item Category</p>
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
                     <a href="/organizational_setting" class="nav-link @if($page == 'Organizational Setting') active @endif">
                         <i class="fas fa-users-cog nav-icon"></i>
                         <p>Organization Setting</p>
                     </a>
                 </li>
             </ul>
             <ul class="nav nav-treeview">
                 <li class="nav-item">
                     <a href="/organization" class="nav-link @if($page == 'Organization Setting') active @endif">
                         <i class="fas fa-users-cog nav-icon"></i>
                         <p>User Management</p>
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
