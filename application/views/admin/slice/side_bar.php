</div>
</div>
<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<div class="sidebar">

    <div class="antiScroll">
        <div class="antiscroll-inner">
            <div class="antiscroll-content">

                <div class="sidebar_inner">
                    <form action="index.php?uid=1&amp;page=search_page" class="input-append" method="post" >
                        <input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
                    </form>
                    <div id="side_accordion" class="accordion">

                        <div class="accordion-group">
                            <div class="accordion-heading <?php if(isset($menu)&&($menu=='Districts')){echo " sdb_h_active";}?>">
                                <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Districts
                                </a>
                            </div>
                            <div class="accordion-body collapse <?php if(isset($menu)&&($menu=='Districts')){echo " in";}?>" id="collapseOne">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/districts');?>">Districts</a></li>
                                        <li><a href="<?php echo site_url('cm/districts/add');?>">Add District</a></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading <?php if(isset($menu)&&($menu=='Associations')){echo " sdb_h_active";}?>">
                                <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Associations
                                </a>
                            </div>
                            <div class="accordion-body collapse <?php if(isset($menu)&&($menu=='Associations')){echo " in";}?>" id="collapseTwo">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/associations');?>" > Associations</a></li>
                                        <li><a href="<?php echo site_url('cm/associations/add');?>"> Add Association</a></li>
                                        <li><a href="<?php echo site_url('cm/sub_associations');?>"> Sub Associations</a></li>
                                        <li><a href="<?php echo site_url('cm/sub_associations/add');?>"> Add Sub Association</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading <?php if(isset($menu)&&($menu=='Church')){echo " sdb_h_active";}?>">
                                <a href="#collapseFive" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Church 
                                </a>
                            </div>
                            <div class="accordion-body collapse <?php if(isset($menu)&&($menu=='Church')){echo " in";}?>" id="collapseFive">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/church');?>">Church</a></li>
                                        <li><a href="<?php echo site_url('cm/church/add');?>">Add Church</a></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
						<div class="accordion-group">
                            <div class="accordion-heading <?php if(isset($menu)&&($menu=='Competitions')){echo " sdb_h_active";}?>">
                                <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Competitions 
                                </a>
                            </div>
                            <div class="accordion-body collapse <?php if(isset($menu)&&($menu=='Competitions')){echo " in";}?>" id="collapseThree">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/items');?>">Competitions</a></li>
                                        <li><a href="<?php echo site_url('cm/items/add');?>">Add Competition Item</a></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
						<div class="accordion-group">
                            <div class="accordion-heading <?php if(isset($menu)&&($menu=='Participants')){echo " sdb_h_active";}?>">
                                <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Participants 
                                </a>
                            </div>
                            <div class="accordion-body collapse <?php if(isset($menu)&&($menu=='Participants')){echo " in";}?>" id="collapseFour">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/participants');?>">Participants</a></li>
                                        <li><a href="<?php echo site_url('cm/participants/add');?>">Add Participants</a></li>
                                        <li><a href="<?php echo site_url('cm/participants_items');?>">Participants & Items</a></li>
                                        <li><a href="<?php echo site_url('cm/participants_items/add');?>">Assign Participant to Item</a></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                       	<div class="accordion-group">
                            <div class="accordion-heading <?php if(isset($menu)&&($menu=='Results')){echo " sdb_h_active";}?>">
                                <a href="#collapseSix" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Results 
                                </a>
                            </div>
                            <div class="accordion-body collapse <?php if(isset($menu)&&($menu=='Results')){echo " in";}?>" id="collapseSix">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/results');?>">Results</a></li>
                                        <li><a href="<?php echo site_url('cm/result/add');?>">Add Result</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                         <div class="accordion-group">
                            <div class="accordion-heading <?php if(isset($menu)&&($menu=='Reports')){echo " sdb_h_active";}?>">
                                <a href="#collapseSeven" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Reports
                                </a>
                            </div>
                            <div class="accordion-body collapse <?php if(isset($menu)&&($menu=='Reports')){echo " in";}?>" id="collapseSeven">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/participants');?>">Paricipants List</a></li>
                                        <li><a href="<?php echo site_url('cm/participants/add');?>">Com. Item List</a></li>
                                        <li><a href="<?php echo site_url('cm/participants_items');?>">Result List</a></li>
                                        <li><a href="<?php echo site_url('cm/participants_items');?>">District Level Points</a></li>
                                                                             
                                    </ul>
                                </div>
                            </div>
                        </div>
                      
                    </div>

                    <div class="push"></div>
                </div>

                <!--<div class="sidebar_info">
                    <ul class="unstyled">
                        <li>
                            <span class="act act-warning">65</span>
                            <strong>New comments</strong>
                        </li>
                        <li>
                            <span class="act act-success">10</span>
                            <strong>New articles</strong>
                        </li>
                        <li>
                            <span class="act act-danger">85</span>
                            <strong>New registrations</strong>
                        </li>
                    </ul>
                </div> -->

            </div>
        </div>
    </div>

</div>