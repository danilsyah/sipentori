<div class="main-header">
    <div class="logo">
        <img src="{{ url('backend/assets/images/logo.png') }}" alt="">
    </div>

    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div style="margin: auto"></div>

    <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img src="{{ url('backend/assets/images/faces/1.jpg') }}" id="userDropdown" alt=""
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <i class="i-Lock-User mr-1"></i> {{ Auth::user()->name }}
                    </div>
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">Log Out</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>

</div>
