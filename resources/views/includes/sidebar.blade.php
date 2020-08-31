<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item">
                <a class="nav-item-hold" href="{{ route('dashboard') }}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-item="data-master">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Data-Center"></i>
                    <span class="nav-text">Data Master</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Inbox-Into"></i>
                    <span class="nav-text">Item In</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Inbox-Out"></i>
                    <span class="nav-text">Item Out</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Inbox-Out"></i>
                    <span class="nav-text">Transfer Orders</span>
                </a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="childNav" data-parent="data-master">
            <li class="nav-item">
                <a href="alerts.html">
                    <i class="nav-icon i-Empty-Box"></i>
                    <span class="item-name">Items</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="alerts.html">
                    <i class="nav-icon i-File-Pictures"></i>
                    <span class="item-name">Galleries</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('category.index') }}">
                    <i class="nav-icon i-Filter-2"></i>
                    <span class="item-name">Categories</span>
                </a>
            </li>
    </div>
    <div class="sidebar-overlay"></div>
</div>
