 <div id="sidebar-collapse" class="sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div><br>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{ Auth::user()->firstname . Auth::user()->lastname }}</div>
            <div class="profile-usertitle-status"><i class="fa fa-circle"></i>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div>
        <div class="block-title">
            <strong><span>Account</span></strong>
        </div>
        <div class="block-content">
            <ul>
                @switch($current)
                @case(1)
                <li class="current">Info Account</li>
                <li><a href="{{ route('account_edit') }}" >Edit Account</a></li>
                @break
                @case(2)
                <li><a href="{{ route('account_profile') }}">Info Account</a></li>
                <li class="current">Edit Account</li>
                @break
                @default
                <li><a href="{{ route('account_profile') }}">Info Account</a></li>
                <li><a href="{{ route('account_edit') }}" >Edit Account</a></li>
                @break
                @endswitch
            </ul>
        </div>
    </div>
    <div>
        <div class="block-title">
            <strong><span>Order Management</span></strong>
        </div>
        <div class="block-content">
            <ul>
                @switch($current)
                @case(4)
                <li class="current">Wait for confirmation</li>
                <li>Confirmed</li>
                <li>Borrowing Books</li>
                <li>Cancelled</li>
                <li>History</li>
                @break
                @case(5)
                <li>Wait for confirmation</li>
                <li class="current">Confirmed</li>
                <li>Borrowing Books</li>
                <li>Cancelled</li>
                <li>History</li>
                @break

                @case(6)
                <li>Wait for confirmation</li>
                <li>Confirmed</li>
                <li class="current">Borrowing Books</li>
                <li>Cancelled</li>
                <li>History</li>
                @break

                @case(7)
                <li>Wait for confirmation</li>
                <li>Confirmed</li>
                <li>Borrowing Books</li>
                <li class="current">Cancelled</a></li>
                <li>History</a></li>
                @break
                @case(8)
                <li>Wait for confirmation</li>
                <li>Confirmed</li>
                <li>Borrowing Books</li>
                <li>>Cancelled</li>
                <li class="current">History</li>
                @break
                @default
                <li><a href="{{ route('order_by_status',1) }}">Wait for confirmation</a></li>
                <li>Confirmed</li>
                <li>Borrowing Books</li>
                <li>>Cancelled</li>
                <li>History</li>
                @break
                @endswitch
            </ul>
        </div>
    </div>
</div>
