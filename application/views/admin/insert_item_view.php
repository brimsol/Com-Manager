
<!--Head Start-->
<?php $this->load->view('admin/slice/head'); ?>		
<!--Head End-->
    
<!--Top Nav Start-->
<?php $this->load->view('admin/slice/top_nav'); ?>				 
<!--top Nav End-->
           
<!-- main content Start -->
 <legend><?php if(isset($heading)){echo $heading;}else{echo "List";}?></legend>           
<?php echo $output; ?>
                        
<!-- main content End -->
            
<!-- sidebar start-->
<?php $this->load->view('admin/slice/side_bar'); ?>	
<!--Sidebar End-->          
            
<!--Footer start-->
<?php $this->load->view('admin/slice/footer'); ?>	
			
<!--Footer End-->
