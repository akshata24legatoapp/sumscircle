
<style type="text/css">
	.badge {
	    position: absolute;
	    font-size: 16px;
	    top: 14px;
	    right: -8px;
	    color: white;
	    padding: 2px;
	    border: 1px solid red;
	    border-radius: 60%;
	    background-color: red;
	    animation: blink 2s ease-in infinite;
}

@keyframes blink {
  from, to { opacity: 1 }
  50% { opacity: 0 }
}
</style>
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		
	<?php echo view('session');?>

	<header id="m_header" class="m-grid__item m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
	<div class="m-container m-container--fluid m-container--full-height">
		<div class="m-stack m-stack--ver m-stack--desktop">
			<div class="m-stack__item m-brand  m-brand--skin-dark ">
				<div class="m-stack m-stack--ver m-stack--general">
					<div class="m-stack__item m-stack__item--middle m-brand__logo">
						<a href="<?php echo base_url('dashboard')?>" class="m-brand__logo-wrapper" style="text-decoration:none;font-size: 19px;font-weight: 500;color: white;">
							Sumcircle
						</a>
					</div>
					<div class="m-stack__item m-stack__item--middle m-brand__tools">
						<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
							<span></span>
						</a>
						<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
							<span></span>
						</a>
						<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
							<i class="flaticon-more"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
				
				<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "></div>
				<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
					<div class="m-stack__item m-topbar__nav-wrapper">
						<ul class="m-topbar__nav m-nav m-nav--inline">
							<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
								<a href="#" class="m-nav__link m-dropdown__toggle">
									<span class="m-topbar__userpic">
										<!-- <i class="fa fa-bell" aria-hidden="true" style="font-size:22px;padding-top: 9px;"><span class="badge">2</span></i> -->
									</span>
								</a>
								<div class="m-dropdown__wrapper">	
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center" style="; background-size: cover;">
											<div class="m-card-user m-card-user--skin-dark">
												
												<div class="m-card-user__details">
													<span class="m-card-user__name m--font-weight-500" style="color: black;">Notifications</span>
													<a href="" class="m-card-user__email m--font-weight-300 m-link"></a>
												</div>
											</div>
										</div>
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav m-nav--skin-light">
													<li class="m-nav__section m--hide">
														<span class="m-nav__section-text">Section</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
						<ul class="m-topbar__nav m-nav m-nav--inline" style="margin: 0 15px 0 0px">
							<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
								<a href="#" class="m-nav__link m-dropdown__toggle">
									<span class="m-topbar__userpic">
										<img src="<?php echo APPPATH2.'images/profile.jpg'?>">
										<!-- <i class="fa fa-user" aria-hidden="true"></i> -->
									</span>

									<!-- <span class="m-topbar__username m--hide">Administrator</span> -->
								</a>
								<div class="m-dropdown__wrapper">	
									<div class="m-dropdown__inner">
										<!-- <div class="m-dropdown__header m--align-center" style="; background-size: cover;">
											<div class="m-card-user m-card-user--skin-dark">
												<div class="m-card-user__pic">
													<img src="" width="100" height="70">

												</div>
												<div class="m-card-user__details">
													<span class="m-card-user__name m--font-weight-500" style="color: black;"></span>
													<a href="" class="m-card-user__email m--font-weight-300 m-link"></a>
												</div>
											</div>
										</div> -->
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav m-nav--skin-light">
													<li class="m-nav__section m--hide">
														<span class="m-nav__section-text">Section</span>
													</li>
													<li class="m-nav__item">
														<a href="view_profile" class="m-nav__link">
															<i class="m-nav__link-icon fa fa-user" aria-hidden="true" style="color:#c58729"></i>
															<span class="m-nav__link-title">
																<span class="m-nav__link-wrap">
																	<span class="m-nav__link-text">My Profile</span>
																</span>
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="change_password" class="m-nav__link">
															<i class="m-nav__link-icon fa fa-undo" aria-hidden="true" style="color:#434aa2"></i>
															<span class="m-nav__link-text">Change Password</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="logout" class="m-nav__link">
															<i class="m-nav__link-icon fa fa-power-off" aria-hidden="true" style="color:red"></i>
															<span class="m-nav__link-text">Log Out</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header> 
</body>