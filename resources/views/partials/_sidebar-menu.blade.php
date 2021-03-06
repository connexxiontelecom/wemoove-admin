
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{route('dashboard')}}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Drivers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('new-registrations')}}">New Registrations</a></li>
                    <li><a href="{{route('manage-drivers')}}">Manage Drivers</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Passengers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('manage-passengers')}}">Manage Passengers</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-internet"></i>
                    <span class="nav-text">Rides</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('manage-rides')}}">Manage Rides</a></li>

                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-internet"></i>
                    <span class="nav-text">Transaction</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('wallet-dashboard')}}">Transactions</a></li>
                    <li><a href="{{route('wallet')}}">Customer's Wallet</a></li>
                    <li><a href="{{route('credit-wallet')}}">Credit Wallet</a></li>
                    <li><a href="#">Refund</a></li>
                    <li><a href="#">Promo</a></li>
                    <li><a href="{{route('payout-requests')}}">Payout</a></li>

                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-internet"></i>
                    <span class="nav-text">Policy</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('policy-settings')}}">Setting</a></li>
                    <li><a href="{{route('bank-setup')}}">Bank Setup</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-internet"></i>
                    <span class="nav-text">Support</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('support-categories')}}">Category</a></li>
                    <li><a href="{{route('bank-setup')}}">All Requests</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-internet"></i>
                    <span class="nav-text">Administration</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('all-admin-users')}}">All Admin Users</a></li>
                    <li><a href="{{route('add-new-admin-user')}}">Add New Admin User</a></li>
                </ul>
            </li>
        </ul>

        <div class="copyright">
            <p> ?? All Rights Reserved</p>
            <p>Powered by Connexxion Telecom</p>
        </div>
    </div>
</div>
