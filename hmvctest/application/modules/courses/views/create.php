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
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Course Name</label>
                            <input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="Enter a course name" />
                            <span class="error text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Base link for the course</label>
                            <input type="text" class="form-control" name="link" id="link" placeholder="A link for course, e.g. html" />
                            <span class="error text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Font Icon</label>
                            <input type="text" data-placement="bottomRight" name="icon" id="icon" class="form-control icp icp-auto" />
                            <span class="error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Summary</label>
                            <span class="error text-danger"></span>
                            <div class="summernote" id="content">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>