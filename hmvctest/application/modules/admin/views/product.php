<div class="panel panel-white">
	<div class="panel-body">
<div class="row">
<div class="row">
	<div class="alert alert-dismissible hide fade in ">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong></strong>
	</div>
<?php

if($this->uri->segment(3)=='new' || $this->uri->segment(3)=='edit' ) {
	 	?>
	<div class="col-sm-8 col-sm-offset-2">
		<p><a href="<?php echo base_url('admin/products'); ?>"><i class="fa fa-long-arrow-left"></i> Back</a></p>
		<form method='post' id='filesForm' enctype="multipart/form-data">
			<input type="hidden" name="fileAction" value="<?php echo current_url(); ?>" />
			<div class="row top-buffer">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="tbl_00_cat_cat_id">Category: <span class="error"></span></label>
						<select class="form-control" id="tbl_00_cat_cat_id" name='tbl_00_cat_cat_id'>
							<option value=''>Choose one</option>
							<?php
							if ($categories->num_rows() > 0) {
								foreach ($categories->result() as $category) {
									echo "<option value='" . $category->cat_id . "'" 
											. ($category->cat_id == @$product->tbl_00_cat_cat_id ? 'selected="selected"' : '') . ">" 
											. $category->cat_00_nm . "</option>";
								}
							}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="row top-buffer">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="prd_00_nm">Product Name:</label>
						<input type="text" name="prd_00_nm" id="prd_00_nm" value="<?php echo $product->prd_00_nm; ?>" 
							class="form-control" placeholder="Enter Product Name" required="required">
							<div class="error"></div>
						<!-- <span class="text-danger"><?php echo form_error('prd_00_nm') ?></span> -->
					</div>
				</div>
			</div>
			<div class="row top-buffer">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="prd_00_prc">Current Price:</label>
						<input type="number" name="prd_00_prc"
							   id="prd_00_prc" <?php echo isset($product) ? "value='$product->prd_00_prc'" : '' ?>
							   class="form-control" placeholder="Enter Current Product Price">
							<div class="error"></div>
						<!-- <span class="text-danger"><?php echo form_error('prd_00_prc') ?></span> -->
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="prd_old_prc">Old Price:</label>
						<input type="number" name="prd_old_prc"
							   id="prd_old_prc" <?php echo isset($product) ? "value='$product->prd_old_prc'" : '' ?>
							   class="form-control" placeholder="Enter Old Product Price">
							<div class="error"></div>
						<!-- <span class="text-danger"><?php echo form_error('prd_old_prc') ?></span> -->
					</div>
				</div>
			</div>
			<div class="row top-buffer">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="prd_avl_qty">Available Quantity:</label>
						<input type="number" name="prd_avl_qty"
								id="prd_avl_qty" <?php echo isset($product) ? "value='$product->prd_avl_qty'" : '' ?>
								class="form-control" placeholder="Enter Available Quantity">
							<div class="error"></div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="prd_prc_curr">Pricing Currency:</label>
						<select class="form-control" id="prd_prc_curr" name='prd_prc_curr'>
							<option value=''>Choose one</option>
							<?php
							if ($currencies->num_rows() > 0) {
								foreach ($currencies->result() as $currency) {
									echo "<option value='" . $currency->r_k . "'" 
											. ($currency->r_k == @$product->prd_prc_curr ? 'selected="selected"' : '') . ">" 
											. $currency->val_dsc . "</option>";
								}
							}
							?>
						</select>
						<span class="error"></span>
					</div>
				</div>
			</div>
			<div class="row top-buffer">
				<div class="form-group">
					<label for="prd_00_dsc">Product Description: <span class="error"></span></label>
					<textarea name="prd_00_dsc" id="prd_00_dsc" class="form-control"
						placeholder="Enter Product Description"><?php echo isset($product) ? "$product->prd_00_dsc" : '' ?></textarea>
				</div>
			</div>
			<div class="row top-buffer">
                <div class="form-group">
                    <div>Product Images: <i id="newDynamicImage" class="fa fa-2x fa-plus-square-o pull-right cursor-pointer"></i></div>
                    <table id="dynamicImageTbl" class="table table-striped">
                        <thead>
                        <tr><th>&nbsp;</th><th width='70%'>Image</th><th>Image in Use?</th></tr>
                        </thead>
                        <tbody>
						<?php
							foreach($files->result() as $key => $row) {
								echo "<tr>
										<td><input type='hidden' name='fl_id[$key]' value='$row->fl_id' /></td>
										<td><img src='".$row->fl_loc_tmb."' width='50' /></td>
										<td><input class='js-switch' type='checkbox' name='fl_ius_yn[$key]' ".($row->fl_ius_yn==1?"checked='checked'":'')." /></td>
									</tr>";
							}
						?>
                        </tbody>
                    </table>
                </div>
            </div>
            
			<div class="form-group">
			<?php
			if($this->uri->segment(3)=='edit'){
				?>
					<input type="hidden" name="prd_id" value="<?php echo $product->prd_id; ?>" />
			<?php   
			}
			?>
				<input type="submit" name="submit" value="<?php echo $this->uri->segment(3)=='edit'? 'Update': 'Create New' ?>" class="btn btn-info"/>
			</div>
		</form>
	</div>
	<?php
}else{
?>
<div class="col-md-12">
	<p>
		<a class="Create New" href="<?php echo base_url('admin/products/new'); ?>">
		<i class="fa fa-plus"></i> Create New</a>
	</p>
<table class="table table-striped">
	<thead>
	<tr>
		<th>Product Name</th><th>Description</th><th>Category</th><th>Price</th><th>Avail. Qty.</th><th>&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	<?php
	if($products->num_rows() > 0){
		foreach($products->result() as $product){
			echo "<tr><td>$product->prd_00_nm</td><td>$product->prd_00_dsc</td><td>";
					foreach($categories->result() as $category){
						if($product->tbl_00_cat_cat_id == $category->cat_id) echo $category->cat_00_nm;
					}
			echo "<td>$product->prd_00_prc</td><td>$product->prd_avl_qty</td>";
            echo "<td><a href='#' class='delete_cat' id='$product->prd_id'><i class='fa fa-lg fa-trash-o text-danger'></i></a> 
                    <a href='".base_url('admin/products/edit/'.$product->prd_id)."'><i class='fa fa-lg fa-pencil-square-o'></i></a> 
                </td></tr>";
		}
	}else{
		echo "<tr><td colspan='6' class='text-center'>No data available</td></tr>";
	}
	?>
	</tbody>
</table>

</div>
	<?php
}
?>
</div>
</div>
</div>