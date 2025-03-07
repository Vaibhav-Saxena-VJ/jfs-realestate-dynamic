<style>
    .main-menu.menu-light .navigation .navigation-header {
    color: #fff;
    /* margin: 2rem 0 0.8rem 2.2rem; */
    padding: 0;
    line-height: 1.5;
    letter-spacing: .01rem;
    background: dodgerblue;
    margin-top: 10px;
    margin-bottom: 17px;
    padding: 10px;
    text-align: center;
    font-weight: 700 !important;
    margin-left: 0px;
}
.main-menu.menu-light .navigation .navigation-header span {
    font-weight: 900;
    font-size: 16px;
}
.logo-image{
    width:200px !important;
}
.main-menu.menu-light .navigation>li.open>a, .main-menu.menu-light .navigation>li.sidebar-group-active>a {
    color: #fff;
    background: #1e90ff;
    transition: transform .25s ease 0s;
    border-radius: 0px;
    margin-bottom: 7px;
}
.main-menu.menu-light .navigation>li {
    padding: 0 0px;
}

.main-menu.menu-light .navigation>li.has-sub>a, .main-menu.menu-light .navigation>li.sidebar-group-active>a {
    color: #fff;
    background: #1e90ff;
    transition: transform .25s ease 0s;
    border-radius: 0px;
    margin-bottom: 7px;
}
.dot {
  height: 25px;
  width: 25px;
  background-color: #eb2a2a;
  border-radius: 50%;
  display: inline-block;
}
</style>

@php
$user=Auth::user();
$role_id=$user->role_id;
@endphp
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto"><a class="navbar-brand" href="javascript:void(0);">
       
             
             <img src="{{config('app.baseURL')}}/images/logo/logo.png" alt="logo" class="logo-image">
       
       
      </a></li>

    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


      <li class="nav-item  ">
        <a href="{{config('app.baseURL')}}/admin/dashboard">
          <i class="feather icon-home"></i>
          <span class="menu-title" data-i18n="">Dashboard</span>
          
        </a>
      </li>
      
      <li class="nav-item has-sub">
                        <a href="javascript:void(0);">
                            <i class="feather icon-shopping-cart" style="visibility:hidden;"></i>
                            <span class="menu-title" data-i18n="">Master</span>
                                                    </a>
                                                    <ul class="menu-content" style="">
                   @if($role_id==1)
      <li class="nav-item  ">
        <a href="{{config('app.baseURL')}}/admin/commission/all">
          <i class="feather icon-layers"></i>
            <span class="menu-title" data-i18n="nav.app_email">Commission Master</span>
        </a>
      </li>
      @endif
      <li class="nav-item  ">
        <a href="{{config('app.baseURL')}}/admin/bank/all">
          <i class="feather icon-home "></i>
            <span class="menu-title" data-i18n="nav.app_email">Partner Banks</span>
        </a>
      </li>
      <li class="nav-item  ">
        <a href="{{config('app.baseURL')}}/admin/property/all">
          <i class="feather icon-box"></i>
            <span class="menu-title" data-i18n="nav.app_email">Properties</span>
        </a>
      </li>
      <li class="nav-item  ">
        <a href="{{config('app.baseURL')}}/admin/status/all">
          <i class="feather icon-box"></i>
            <span class="menu-title" data-i18n="nav.app_email">Status</span>
        </a>
      </li>
      @if($role_id==1)
      <li class="nav-item  ">
        <a href="{{config('app.baseURL')}}/admin/admin/all">
          <i class="feather icon-users"></i>
            <span class="menu-title" data-i18n="nav.app_email">Associate Access</span>
        </a>
      </li>
      @endif
     
     
          
    </ul>                                            </li>
      
      
      
      
      <!--<li class="navigation-header">-->
      <!--  <span>Master</span>-->
      <!--</li>-->
      

      <!-- <li class="nav-item  ">
        <a href="{{config('app.baseURL')}}/admin/blog/all">
          <i class="feather icon-box"></i>
          <span class="menu-title" data-i18n="nav.app_email">Blog</span>
        </a>
      </li> -->

      <!--  <li class="nav-item  ">
        <a href="{{config('app.baseURL')}}/admin/mutual-fund/add">
          <i class="feather icon-box"></i>
          <span class="menu-title" data-i18n="nav.app_email">Mutual Fund List</span>
        </a>
      </li> -->
      <li class="nav-item has-sub">
                        <a href="javascript:void(0);">
                            <i class="feather icon-shopping-cart" style="visibility:hidden;"></i>
                            <span class="menu-title" data-i18n="">Users</span>
                                                    </a>
                                                  <ul class="menu-content" style="">
                                                       @if($role_id==1)  
                     <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/user/all">
              
                <i class="feather icon-users"></i>
                <span class="menu-title" data-i18n="nav.app_email">Users</span>
              </a>
            </li>
            <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/partner/all">
              
                <i class="feather icon-users"></i>
                <span class="menu-title" data-i18n="nav.app_email">Channel Partner</span>
              </a>
            </li>
            @endif
            <!--                                      <li class="nav-item  ">-->
            <!--  <a href="{{config('app.baseURL')}}/admin/docpendingall">-->
              
            <!--    <i class="feather icon-help-circle"></i>-->
            <!--    <span class="menu-title" data-i18n="nav.app_email">Pending Documents</span>-->
            <!--  </a>-->
            <!--</li>-->


     
     
          
    </ul>                                            </li>
      

<li class="nav-item has-sub open">
                        <a href="javascript:void(0);">
                            <i class="feather icon-shopping-cart" style="visibility:hidden;"></i>
                            <span class="menu-title" data-i18n="">User & Applications</span>
                                                    </a>
                                                  <ul class="menu-content" style="">
            <!--                                           @if($role_id==1)  -->
            <!--         <li class="nav-item  ">-->
            <!--  <a href="{{config('app.baseURL')}}/admin/user/all">-->
              
            <!--    <i class="feather icon-users"></i>-->
            <!--    <span class="menu-title" data-i18n="nav.app_email">Users</span>-->
            <!--  </a>-->
            <!--</li>-->
            <!--@endif-->
            <!--                                      <li class="nav-item  ">-->
            <!--  <a href="{{config('app.baseURL')}}/admin/docpendingall">-->
              
            <!--    <i class="feather icon-help-circle"></i>-->
            <!--    <span class="menu-title" data-i18n="nav.app_email">Pending Documents</span>-->
            <!--  </a>-->
            <!--</li>-->

                                                   <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/pendingall">
              
                <i class="feather icon-alert-circle"></i>
                <span class="menu-title" data-i18n="nav.app_email">All Loan Applications</span>
              </a>
            </li>

 <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/approvedall">
              
                <i class="feather icon-check-circle"></i>
                <span class="menu-title" data-i18n="nav.app_email">Approved Loans</span>
              </a>
            </li>

             <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/rejectedall">
              
                <i class="feather icon-x-circle"></i>
                <span class="menu-title" data-i18n="nav.app_email">Rejected Loans</span>
              </a>
            </li>
            
            <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/notificationall">
              
                <i class="feather icon-x-circle"></i>
                <span class="menu-title" data-i18n="nav.app_email">Notifications</span>
                @if($data['notificationcount']==0)
                  <span class="number">
                  ({{$data['notificationcount']}})
                  </span>
                @else
                  <span class="number dot" style="text-align: center;color:white;">
                  ({{$data['notificationcount']}})
                  </span>
                @endif
                
              </a>
            </li>
     
     
          
    </ul>                                            </li>
    
    
    <li class="nav-item has-sub">
                        <a href="javascript:void(0);">
                            <i class="feather icon-shopping-cart" style="visibility:hidden;"></i>
                            <span class="menu-title" data-i18n="">Referral Program</span>
                                                    </a>
                                                    <ul class="menu-content" style="">
                    <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/refer_earn/all">
              
                <i class="feather icon-info"></i>
                <span class="menu-title" data-i18n="nav.app_email">Referral Claims</span>
              </a>
            </li>


       <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/wallet/all">
              
                <i class="feather icon-check-circle"></i>
                <span class="menu-title" data-i18n="nav.app_email">Approved Transaction</span>
              </a>
            </li>

            <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/redeem/all">
              
                <i class="feather icon-folder"></i>
                <span class="menu-title" data-i18n="nav.app_email">Redeem Requests</span>
              </a>
            </li>
     
     
          
    </ul>                                            </li>

  
    
    <li class="nav-item has-sub">
                        <a href="javascript:void(0);">
                            <i class="feather icon-shopping-cart" style="visibility:hidden;"></i>
                            <span class="menu-title" data-i18n="">Web Forms & Leads</span>
                                                    </a>
                                                    <ul class="menu-content" style="">
                   <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/contact/all">
              
                <i class="feather icon-phone"></i>
                <span class="menu-title" data-i18n="nav.app_email">Contact Form</span>
              </a>
            </li>
            
            <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/referal_tools/all">
              
                <i class="feather icon-user-plus"></i>
                <span class="menu-title" data-i18n="nav.app_email">Referral Tool</span>
              </a>
            </li>
            
            <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/property_lead/all">
              
                <i class="feather icon-home"></i>
                <span class="menu-title" data-i18n="nav.app_email">Property Leads</span>
              </a>
            </li>
     
          
    </ul>                                            </li>
    
    
    <li class="nav-item has-sub">
                        <a href="javascript:void(0);">
                            <i class="feather icon-shopping-cart" style="visibility:hidden;"></i>
                            <span class="menu-titlel .navigation-header" data-i18n="">Tools</span>
                                                    </a>
                                                    <ul class="menu-content" style="">
                    @if($role_id==1 || $role_id==4)
            <!--<li class="nav-item  ">-->
            <!--  <a href="{{config('app.baseURL')}}/admin/sanctioncalculator">-->
              
            <!--    <i class="feather icon-airplay"></i>-->
            <!--    <span class="menu-title" data-i18n="nav.app_email">Sanction Calculator</span>-->
            <!--  </a>-->
            <!--</li>-->
              <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/sanctioncalculatorhistory">
              
                <i class="feather icon-airplay"></i>
                <span class="menu-title" data-i18n="nav.app_email">Eligibility Calculation</span>
              </a>
            </li>
            
               <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/mis">
              
                <i class="feather icon-airplay"></i>
                <span class="menu-title" data-i18n="nav.app_email">MIS</span>
              </a>
            </li>
            
            <li class="nav-item  ">
              <a href="{{config('app.baseURL')}}/admin/invoice">
              
                <i class="feather icon-airplay"></i>
                <span class="menu-title" data-i18n="nav.app_email">Invoice</span>
              </a>
            </li>
            @endif
     
          
    </ul>                                            </li>


            
<div class="buy-now no-print" style="margin-left:20px;">
    <a href="{{config('app.baseURL')}}" class="btn btn-danger">Switch To Website</a>
</div>
              
     
            
           
            
             



            </ul>
          </div>
        </div>
<!-- END: Main Menu-->