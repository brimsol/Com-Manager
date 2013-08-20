<!--Head Start-->
<?php $this->load->view('admin/slice/head'); ?>		
<!--Head End-->

<!--Top Nav Start-->
<?php $this->load->view('admin/slice/top_nav'); ?>				 
<!--top Nav End-->

<!-- main content Start -->

<div class="row-fluid search_page">
    <div class="span12">
        <h3 class="heading">User Management</h3>
        <div class="well clearfix">
            <div class="row-fluid">
                <div class="pull-left">Showing 1 - 20 of 204 Results</div>
                <div class="pull-right">
                    <span class="sepV_c">
                        Sort by:
                        <select>
                            <option>Name</option>
                            <option>Date</option>
                            <option>Relevance</option>
                        </select>
                    </span>
                    <span class="sepV_c">
                        View:
                        <select>
                            <option>12</option>
                            <option>25</option>
                            <option>50</option>
                        </select>
                    </span>
                    <span class="sepV_c">
                        <i class="splashy-application_windows_add"></i> <a href='<?php echo base_url(); ?>admin/video_gallery/add' class="ext_disabled">Add User</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">
                <form class="well form-inline" method="post" action="">
                    <p class="f_legend">Search</p>
                    <input type="text" class="input-small" placeholder="title" name="title" value="<?php echo isset($srch['title']) ? $srch['title'] : '' ?>">
                    <button type="submit" class="btn">Search</button>
                </form>
            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Path</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($video_gallery) {
                    foreach ($video_gallery as $video) {
                        ?>
                        <tr>
                            <td><?php echo $video->video_id; ?></td>
                            <td><?php echo $video->title; ?></td>
                            <td><?php echo $video->file_name; ?></td>
                            <td><?php echo $video->description; ?></td>
                        </tr>
        <?php
    }
} else {
    ?>
                    <tr>
                        <td colspan="4">No data found! </td>                    
                    </tr>
    <?php
}
?>

            </tbody>
        </table>
        <div class="pagination">
            <ul>
                <li><a href="#">Prev</a></li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="disabled"><a href="#">...</a></li>
                <li><a href="#">10</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </div>
</div>	


<!-- main content End -->

<!-- sidebar start-->
<?php $this->load->view('admin/slice/side_bar'); ?>	
<!--Sidebar End-->          

<!--Footer start-->
<?php $this->load->view('admin/slice/footer'); ?>				
<!--Footer End-->
