<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create a new course</h4>
            <div class="row">
                <div class="alert alert-dismissible hide fade in ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong></strong><span class="message"></span>
                </div>
            </div>
            <div class="basic-form">
                <form name="course" id="course">
                <?php 
                    echo isset($course->r_k)? "<input type='hidden' name='r_k' value='$course->r_k' />":'';
                ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Course Name</label>
                            <input type="text" class="form-control" placeholder="Enter a course name"
                                name="menu_name" id="menu_name" value="<?php echo isset($course->menu_name) ? $course->menu_name : '' ?>" />
                            <span class="error text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Base link for the course</label>
                            <input type="text" class="form-control" placeholder="A link for course, e.g. html"
                                name="link" id="link" value="<?php echo isset($course->link) ? $course->link : '' ?>" />
                            <span class="error text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Font Icon</label>
                            <input type="text" data-placement="bottomRight" class="form-control icp icp-auto"
                            name="icon" id="icon" value="<?php echo isset($course->icon) ? $course->icon : '' ?>" />
                            <span class="error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Summary</label>
                            <span class="error text-danger"></span>
                            <div class="summernote" id="content">
                                <?php echo isset($course->content) ? $course->content : '' ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>