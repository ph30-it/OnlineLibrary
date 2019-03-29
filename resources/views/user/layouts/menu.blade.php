 <div id="sidebar-collapse" class="sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div><br>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{ Auth::user()->lastname ." ".Auth::user()->firstname}}</div>
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
                <li><a href="{{ route('account_profile') }}">Info Account</a></li>
                <li><a href="{{ route('account_edit') }}" >Edit Account</a></li>
            </ul>
        </div>
    </div>
    <div>
        <div class="block-title">
            <strong><span>Order Management</span></strong>
        </div>
        <div class="block-content">
            <ul>
                <li><a href="{{ route('order_by_status',1) }}">Wait for confirmation</a></li>
                <li><a href="{{ route('order_by_status',2) }}">Confirmed</a></li>
                <li><a href="{{ route('order_by_status',4) }}">Borrowing Books</a></li>
                <li>Cancelled</li>
                <li>History</li>
            </ul>
        </div>
    </div>
</div>
