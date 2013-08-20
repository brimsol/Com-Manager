
<!--Head Start-->
<?php $this->load->view('admin/slice/head'); ?>		
<!--Head End-->
    
<!--Top Nav Start-->
<?php $this->load->view('admin/slice/top_nav'); ?>				 
<!--top Nav End-->
           
<!-- main content Start -->
            
                   <form class="form-horizontal">
                        <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="textinput">Username</label>
                                <div class="controls">
                                    <input id="textinput" name="username" type="text" placeholder="Username" class="input-xlarge">
                                     </div>
                            </div>

                            <!-- Password input-->
                            <div class="control-group">
                                <label class="control-label" for="passwordinput">Password</label>
                                <div class="controls">
                                    <input id="passwordinput" name="password" type="password" placeholder="Password" class="input-xlarge">
                                    
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="control-group">
                                <label class="control-label" for="selectbasic">Select Basic</label>
                                <div class="controls">
                                    <select id="selectbasic" name="selectbasic" class="input-xlarge">
                                        <option>Option one</option>
                                        <option>Option two</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="control-group">
                                <div class="controls">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
                                </div>
                            </div>
                    </form>

                        
<!-- main content End -->
            
<!-- sidebar start-->
<?php $this->load->view('admin/slice/side_bar'); ?>	
<!--Sidebar End-->          
            
<!--Footer start-->
<?php $this->load->view('admin/slice/footer'); ?>				
<!--Footer End-->
