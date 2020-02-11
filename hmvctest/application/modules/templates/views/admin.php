<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Lafej is an online store for your stationaries and plastic bags">
	    <meta name="keywords" content="Lafej,Lafej Store,Online store,free deliverystationaries,pencils,crayons,white marker board,pen,erasers,plastics,plastic bags">
        <meta name="author" content="infinitizon">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Lafej Admin :: <?php echo $title; ?></title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="<?php echo assets_url(); ?>bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo assets_url(); ?>font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo assets_url(); ?>plugins/icomoon/style.css" rel="stylesheet">
        <link href="<?php echo assets_url(); ?>plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="<?php echo assets_url(); ?>plugins/switchery/switchery.min.css" rel="stylesheet"/>
      
        <!-- Theme Styles -->
        <link href="<?php echo assets_url(); ?>css/space.min.css" rel="stylesheet">
        <link href="<?php echo assets_url(); ?>css/custom.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo assets_url(); ?>images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo assets_url(); ?>images/favicon.ico" type="image/x-icon">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box" href="index-2.html">
                    <span>Lafej</span>
                    <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
                    <i class="icon-close" id="sidebar-toggle-button-close"></i>
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            <li>
                                <a href="index.html">
                                    <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(2)=='category'?'active-page':'' ?>">
                                <a href="<?php echo site_url('admin/category'); ?>">
                                    <i class="menu-icon icon-inbox"></i><span>Categories</span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(2)=='products'?'active-page':'' ?>">
                                <a href="<?php echo site_url('admin/products'); ?>">
                                    <i class="menu-icon icon-inbox"></i><span>Products</span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(2)=='users'?'active-page':'' ?>">
                                <a href="<?php echo site_url('admin/users'); ?>">
                                    <i class="menu-icon icon-inbox"></i><span>Users</span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(2)=='profile'?'active-page':'' ?>">
                                <a href="javascript:void(0);">
                                    <i class="menu-icon icon-flash_on"></i><span>My Profile</span><i class="accordion-icon fa fa-angle-right"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo site_url('admin/profile/view'); ?>" class="<?php echo $this->uri->segment(2)=='profile'?'active':'' ?>">View Profile</a></li>
                                    <li><a href="<?php echo site_url('admin/profile/logout'); ?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->
            
            <!-- Page Content -->
            <div class="page-content">            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <div class="logo-sm">
                                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                    <a class="logo-box" href="<?php echo base_url(); ?>"><span>Lafej</span></a>
                                </div>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                        
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fa fa-bars"></i></a></li>
                                    <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fa fa-expand"></i></a></li>
                                    <li><a href="javascript:void(0)" id="search-button"><i class="fa fa-search"></i></a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <!-- <li><a href="javascript:void(0)" class="right-sidebar-toggle" data-sidebar-id="main-right-sidebar"><i class="fa fa-envelope"></i></a></li> -->
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i></a>
                                        <ul class="dropdown-menu dropdown-lg dropdown-content">
                                            <li class="drop-title">Notifications<a href="#" class="drop-title-link"><i class="fa fa-angle-right"></i></a></li>
                                            <li class="slimscroll dropdown-notifications">
                                                <ul class="list-unstyled dropdown-oc">
                                                    <li>
                                                        <a href="#"><span class="notification-badge bg-primary"><i class="fa fa-photo"></i></span>
                                                            <span class="notification-info">No Pending Notifications</b>.
                                                                <small class="notification-date">00:00</small>
                                                            </span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="http://via.placeholder.com/36x36" alt="" class="img-circle"></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Profile</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Account Settings</a></li>
                                            <li><a href="#">Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div><!-- /Page Header -->
                <!-- Page Inner -->
                <div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header"><?php echo $title; ?></h3>
                    </div>
                <div id="main-wrapper">
                    <div class="row">

					
<?php
$this->load->view($module.'/'.$view_file);
?>

                        
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p>Made with <i class="fa fa-heart"></i> by infinitizon</p>
                </div>
                </div><!-- /Page Inner -->
                <div class="page-right-sidebar" id="main-right-sidebar">
                    <div class="page-right-sidebar-inner">
                        <div class="right-sidebar-top">
                            <div class="right-sidebar-tabs">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active" id="chat-tab"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">chat</a></li>
                                    <li role="presentation" id="settings-tab"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">settings</a></li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="right-sidebar-toggle right-sidebar-close" data-sidebar-id="main-right-sidebar"><i class="icon-close"></i></a>
                        </div>
                        <div class="right-sidebar-content">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="chat">
                                    <div class="chat-list">
                                        <span class="chat-title">Recent</span>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item unread" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">David</span>
                                                <span class="chat-text">where u at?</span>
                                                <span class="chat-time">08:50</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item unread active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Daisy</span>
                                                <span class="chat-text">Daisy sent a photo.</span>
                                                <span class="chat-time">11:34</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="chat-list">
                                        <span class="chat-title">Older</span>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Tom</span>
                                                <span class="chat-text">You: ok</span>
                                                <span class="chat-time">2d</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Anna</span>
                                                <span class="chat-text">asdasdasd</span>
                                                <span class="chat-time">4d</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Liza</span>
                                                <span class="chat-text">asdasdasd</span>
                                                <span class="chat-time">&nbsp;</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="load-more-messages"  data-toggle="tooltip" data-placement="bottom" title="Load More">&bull;&bull;&bull;</a>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="right-sidebar-settings">
                                        <span class="settings-title">General Settings</span>
                                        <ul class="sidebar-setting-list list-unstyled">
                                            <li>
                                                <span class="settings-option">Notifications</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Activity log</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Automatic updates</span><input type="checkbox" class="js-switch" />
                                            </li>
                                            <li>
                                                <span class="settings-option">Allow backups</span><input type="checkbox" class="js-switch" />
                                            </li>
                                        </ul>
                                        <span class="settings-title">Account Settings</span>
                                        <ul class="sidebar-setting-list list-unstyled">
                                            <li>
                                                <span class="settings-option">Chat</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Incognito mode</span><input type="checkbox" class="js-switch" />
                                            </li>
                                            <li>
                                                <span class="settings-option">Public profile</span><input type="checkbox" class="js-switch" />
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-right-sidebar" id="chat-right-sidebar">
                    <div class="page-right-sidebar-inner">
                        <div class="right-sidebar-top">
                            <div class="chat-top-info">
                                <span class="chat-name">Noah</span>
                                <span class="chat-state">2h ago</span>
                            </div>
                            <a href="javascript:void(0)" class="right-sidebar-toggle chat-sidebar-close pull-right" data-sidebar-id="chat-right-sidebar"><i class="icon-keyboard_arrow_right"></i></a>
                        </div>
                        <div class="right-sidebar-content">
                            <div class="right-sidebar-chat slimscroll">
                                <div class="chat-bubbles">
                                <div class="chat-start-date">02/06/2017 5:58PM</div>
                                    <div class="chat-bubble them">
                                        <div class="chat-bubble-img-container">
                                            <img src="http://via.placeholder.com/38x38" alt="">
                                        </div>
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">Hello</span>
                                        </div>
                                    </div>
                                    <div class="chat-bubble me">
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">Hello!</span>
                                        </div>
                                    </div>
                                <div class="chat-start-date">03/06/2017 4:22AM</div>
                                    <div class="chat-bubble me">
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">lorem</span>
                                        </div>
                                    </div>
                                    <div class="chat-bubble them">
                                        <div class="chat-bubble-img-container">
                                            <img src="http://via.placeholder.com/38x38" alt="">
                                        </div>
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">ipsum dolor sit amet</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-write">
                                <form class="form-horizontal" action="javascript:void(0);">
                                    <input type="text" class="form-control" placeholder="Say something">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        <!-- Javascripts -->
        <script src="<?php echo assets_url(); ?>js/jquery/1.12.4/jquery.min.js"></script>
        <script src="<?php echo assets_url(); ?>bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="<?php echo assets_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo assets_url(); ?>plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="<?php echo assets_url(); ?>plugins/switchery/switchery.min.js"></script>
        <script src="<?php echo assets_url(); ?>js/space.min.js"></script>
        <script src="<?php echo assets_url(); ?>js/admin.js"></script>
        <script>
	$(function() {
		$('#edit_profile').on('click', function(e) {
			e.preventDefault();
            $('input').prop('disabled', !$('input').prop('disabled'));
            console.log( $('input').prop('disabled') );
            console.log( $('select').prop('disabled') );
			<?php if(isset($user))//Only SuperAdmin can edit roles
                    if($user->aut_id==16122018) 
                        echo "$('select').prop('disabled', !$('select').prop('disabled'));"; 
            ?>
		});
		$('.delete_cat').on('click', function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			if(confirm("Deleting a category would delete all sub categories and products related to it\nAre you sure you want to continue?")){
				window.location = "<?php echo base_url()?>category/delete/"+id;
			}else
				return false;
        });
        $('#newDynamicImage').click(function(){
            var rl = $('#dynamicImageTbl tbody tr').length;
            $('#dynamicImageTbl')
                .append('<tr><td></td><td><input type="file" id="file'+rl+'" name="file"></td><td><input class="js-switch" type="checkbox" id="fl_ius_yn'+rl+'" name="fl_ius_yn" /></td></tr>'); 
        });
        $("#filesForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: $('input[name=fileAction]').val(),
                type: 'POST',
                contentType:false,
                processData: false,
                data: function(){
                    var data = new FormData();
                    var fileLength = $('#filesForm input[type=file]').length;
                    for (var x = 0; x < fileLength; x++) {
                        data.append('file-'+x, $('#file'+x)[0].files[0]);
                        data.append('fl_ius_yn-'+x, $('#fl_ius_yn'+x).is(':checked'));
                    }
                    $('#filesForm input, #filesForm textarea, #filesForm select').each(
                        function(index){  
                            var input = $(this);
                            if(input.prop('type') =='select-one')
                                data.append( input.attr('name'), $('#'+input.attr('name')+" option:selected").val() );
                            if(input.prop('type') =='checkbox')
                                data.append( input.attr('name'), input.is(':checked') );
                            else
                                data.append(input.attr('name'), input.val());
                        }
                    );
                    return data;
                }(),
                success: function(result) {
                    $result = JSON.parse(result)
                    if($result.success){
                        $('div.alert').addClass('alert-success show').find('strong').append('Success! ').after($result.message);
                    }else{
                        $.each($result.message, function(key, value) {
                            if(value) {
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).parents('.form-group').find('.error').html(value);
                            }
                        });
                    }
 
                },
                error: function(xhr, result, errorThrown){
                    alert('Request failed.');
                }
            });
        });
	});
</script>
    </body>
</html>