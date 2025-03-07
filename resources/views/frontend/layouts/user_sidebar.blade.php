@php
$user=Auth::user();
@endphp
<div class="col-lg-3  pr-lg-55">
    <div class="left-sidebar-widget">
        <div class="single-sidebar-widget mt-25 widget-border">
            <div class="catagory-list-widget">
                <div class="widget-title">
                    <h5 style="display: inline-flex;font-size: 22px;"> My Accounts</h5>
                    @php
                        $user=Auth::user();
                    @endphp
                    @if($user!="")
                        <p style="margin-left:15%;">Welcome <b>{{$user->name}}</b></p> 
                    @endif
                </div>
                <div class="widget-content ">
                    <ul class="catagory-list py-3">
                        <hr>
                        <li class="catagory-item ">
                            <a href="#" class="catagory-link ">
                                <span class="text">Personal Details</span>
                            </a>
                        </li>
                        <li class="catagory-item ">
                            <a href="#" class="catagory-link ">
                                <span class="text">Educational Details</span>
                            </a>
                        </li>
                        <li class="catagory-item ">
                            <a href="#" class="catagory-link ">
                                <span class="text">Professional Details</span>
                            </a>
                        </li>
                        <li class="catagory-item">
                            <a href="#" class="catagory-link">
                                <span class="text">Loan Application</span>
                            </a>
                        </li>
                        <li class="catagory-item">
                            <a href="#" class="catagory-link">
                                <span class="text">Approved Loan</span>
                               
                            </a>
                        </li>
                        <li class="catagory-item">
                            <a href="#" class="catagory-link">
                                <span class="text">Rejected Loan</span>
                            </a>
                        </li>
                        <li class="catagory-item">
                            <a href="#" class="catagory-link">
                                <span class="text">Referrals</span>
                            </a>
                        </li>
                        <li class="catagory-item">
                            <a href="#s" class="catagory-link">
                                <span class="text">My Bank Details</span>
                            </a>
                        </li>
                        <li class="catagory-item">
                            <a href="#" class="catagory-link">
                                <span class="text">Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>