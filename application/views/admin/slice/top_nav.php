<div id="maincontainer" class="clearfix">
<!-- header -->
 <header>
   <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="#"><i class="icon-home icon-white"></i> Competition Manager</a>
                            <ul class="nav user_menu pull-right">                           
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if($this -> session -> userdata('username') != '' ){echo $this -> session -> userdata('username'); }?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
										<li><a href="#"> My Profile</a></li>
										<li class="divider"></li>
										<li><a href="<?php echo site_url('logout');?>" class="ext_disabled"> Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
							<a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
								<span class="icon-align-justify icon-white"></span>
							</a>
                        </div>
                    </div>
                </div>
    </header>
<div id="contentwrapper">
                <div class="main_content">