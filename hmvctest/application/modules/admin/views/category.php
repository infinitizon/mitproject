<div class="panel panel-white">
	<div class="panel-body">
<div class="row">
	<div class="alert alert-dismissible hide fade in ">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong></strong>
	</div>
<?php

if($this->uri->segment(3)=='new' || $this->uri->segment(3)=='edit' ) {
	 	?>
	<div class="col-sm-6 col-sm-offset-3">
		<p><a href="<?php echo base_url('admin/category'); ?>"><i class="fa fa-long-arrow-left"></i> Back</a></p>
		<form method='post' id='filesForm' enctype="multipart/form-data">
			<input type="hidden" name="fileAction" value="<?php echo current_url(); ?>" />
			<div class="row top-buffer">
				<div class="form-group">
					<label for="cat_00_nm">Category Name:</label>
					<input type="text" name="cat_00_nm" id="cat_00_nm"  value="<?php echo $category->cat_00_nm; ?>" 
                        class="form-control" placeholder="Enter Category Name">
						<span class="error"></span>
				</div>
			</div>
			<div class="row top-buffer">
				<div class="form-group">
					<label for="cat_00_dsc">Category Description:</label>
					<input type="text" name="cat_00_dsc" id="cat_00_dsc" value="<?php echo $category->cat_00_dsc; ?>"
						   class="form-control" placeholder="Enter Description">
						   <span class="error"></span>
				</div>
			</div>
			<div class="row top-buffer">
                <div class="form-group">
                    <label for="cat_par_id">Parent Category: <span class="error"></span></label>
                    <select class="form-control" id="cat_par_id" name='cat_par_id'>
                        <option>Choose one</option>
                        <?php
                        if ($parentCategories->num_rows() > 0) {
							var_dump($parentCategories->result());
                            foreach ($parentCategories->result() as $parent) {
                                echo "<option value='" . $parent->cat_par_id . "'" 
                                        . ($parent->cat_par_id == @$category->cat_par_id ? 'selected="selected"' : '') . ">" 
                                        . $parent->cat_00_nm . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
			</div>
			<div class="row top-buffer">
                <div class="form-group">
                    <div>Category Pictures:  <i id="newDynamicImage" class="fa fa-2x fa-plus-square-o pull-right cursor-pointer"></i></div>
                    <table id="dynamicImageTbl" class="table table-striped">
                        <thead>
                        <tr><th>&nbsp;</th><th width='70%'>Image</th><th>Image in Use?</th></tr>
                        </thead>
                        <tbody>
						<?php
							foreach($files->result() as $row) {
								echo "<tr>
										<td></td>
										<td><img src='".$row->fl_loc_tmb."' width='50' /></td>
										<td><input class='js-switch' type='checkbox' id='fl_ius_yn' name='fl_ius_yn' ".($row->fl_ius_yn==1?"checked='checked'":'')." /></td>
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
					<input type="hidden" name="cat_id" value="<?php echo $category->cat_id; ?>" />
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
		<a class="Create New" href="<?php echo base_url('admin/category/new'); ?>">
		<i class="fa fa-plus"></i> Create New</a>
	</p>
<table class="table table-striped">
	<thead>
	<tr>
		<th>Category Name</th><th>Description</th><th>Parent</th><th>&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	<?php
	if($categories->num_rows() > 0){
		foreach($categories->result() as $category){
			echo "<tr><td>$category->cat_00_nm</td><td>$category->cat_00_dsc</td><td>";
					foreach($parentCategories->result() as $parent){
						if($category->cat_par_id == $parent->cat_id) echo $parent->cat_00_nm;
					}
            echo "<td><a href='#' class='delete_cat' id='$category->cat_id'><i class='fa fa-lg fa-trash-o text-danger'></i></a> 
                    <a href='".base_url('admin/category/edit/'.$category->cat_id)."'><i class='fa fa-lg fa-pencil-square-o'></i></a> 
                </td></tr>";
		}
	}else{
		echo "<tr><td colspan='4' class='text-center'>No data available</td></tr>";
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