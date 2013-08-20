<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('add_items', $attributes); ?>

<p>
        <label for="item_name">Item Name <span class="required">*</span></label>
        <?php echo form_error('item_name'); ?>
        <br /><input id="item_name" type="text" name="item_name" maxlength="100" value="<?php echo set_value('item_name'); ?>"  />
</p>

<p>
        <label for="fellowship_id">Fellowship <span class="required">*</span></label>
        <?php echo form_error('fellowship_id'); ?>
        
        <select>
        	<option>select</option>
        	<?php foreach($fellowships as $fs){?>
        		
        		<option value="<?php echo $fs->fellowship_id;?>"><?php echo $fs->fellowship_name;?></option>
        		
        	<?php } ?>	
        	
        </select>

        <br />
</p>                                             
                        
<p>
        <label for="item_description">Description</label>
        <?php echo form_error('item_description'); ?>
        <br /><input id="item_description" type="text" name="item_description" maxlength="200" value="<?php echo set_value('item_description'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
