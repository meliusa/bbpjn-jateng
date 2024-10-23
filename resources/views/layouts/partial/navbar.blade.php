 <!-- Menu -->
 <aside id="layout-menu" class="flex-grow-0 layout-menu-horizontal menu-horizontal menu bg-menu-theme">
     <div class="container-xxl d-flex h-100">
         <ul class="menu-inner">
             <!-- Dashboards -->
             {{-- <li class="menu-item active"> --}}
             <li class="menu-item">
                 <a href="{{ route('dashboards.index') }}" class="menu-link ">
                     <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                     <div data-i18n="Dashboards">Dashboards</div>
                 </a>
             </li>

             <!-- Members -->
             <li class="menu-item">
                 <a href="{{ route('members.index') }}" class="menu-link">
                     <i class="menu-icon tf-icons mdi mdi-card-account-details-outline"></i>
                     <div data-i18n="Members">Members</div>
                 </a>
             </li>

             <!-- Gates -->
             <li class="menu-item">
                 <a href="javascript:void(0)" class="menu-link">
                     <i class="menu-icon tf-icons mdi mdi-transit-connection-horizontal"></i>
                     <div data-i18n="Gates">Gates</div>
                 </a>
             </li>

             <!-- Logs -->
             <li class="menu-item">
                 <a href="javascript:void(0)" class="menu-link">
                     <i class="menu-icon tf-icons mdi mdi-file-outline"></i>
                     <div data-i18n="Logs">Logs</div>
                 </a>
             </li>

         </ul>
     </div>
 </aside>
 <!-- / Menu -->
