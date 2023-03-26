<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu"> Dashboard </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users.register') }}" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">User Registeration</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users') }}" aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="hide-menu"> Users </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('fees') }}" aria-expanded="false">
                        <i class="fa fa-dollar-sign" aria-hidden="true"></i>
                        <span class="hide-menu"> Fees </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('settings') }}" aria-expanded="false">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <span class="hide-menu"> Settings </span>
                    </a>
                </li>
               
               <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('optimize') }}" aria-expanded="false">
                        <i class="fa fa-code" aria-hidden="true"></i>
                        <span class="hide-menu"> Optimize Application <span class="text-danger">*</span></span>
                    </a>
                    <div class="small text-danger text-center">* DO NOT CLICK: For developers use only</div>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>