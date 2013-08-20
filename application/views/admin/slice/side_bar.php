<?php
$dashboard = '';
$modules = '';
$modules_in = '';
$modules_li = '';

$video_gallery = '';
$video_gallery_in = '';
$video_gallery_li = '';



$usermanage_in = '';
$usermanage_li = '';

$menu = isset($menu) ? $menu : '';
switch ($menu) {

    case 'video_gallery':
        $modules = 'sdb_h_active';
        $modules_in = 'in';
        $video_gallery_li = 'class="active"';
        break;
    default:
        $dashboard = 'sdb_h_active';
        $dashboard_in = 'in';
        $dashboard_li = 'class="active"';
        break;
}
?>
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
                            <div class="accordion-heading">
                                <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Districts
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseOne">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/districts');?>">Districts</a></li>
                                        <li><a href="<?php echo site_url('cm/districts/add');?>">Add District</a></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Associations
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseTwo">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/associations');?>">Associations</a></li>
                                        <li><a href="<?php echo site_url('cm/associations/add');?>">Add Association</a></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
						<div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Competitions 
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseThree">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/items');?>">Competitions</a></li>
                                        <li><a href="<?php echo site_url('cm/items/add');?>">Add Competition Item</a></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
						<div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Participants 
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseFour">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo site_url('cm/participants');?>">Participants</a></li>
                                        <li><a href="<?php echo site_url('cm/participants/add');?>">Add Participants</a></li>
                                      
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