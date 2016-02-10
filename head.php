<head>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Fides Admin</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/icons/apple-touch-icon-144-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/icons/apple-touch-icon-114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/icons/apple-touch-icon-72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="assets/images/icons/apple-touch-icon-57-precomposed.png" />
        <link rel="shortcut icon" href="assets/images/icons/favicon.png" />

        <!-- Fides Admin CSS Core -->

        <link rel="stylesheet" type="text/css" href="assets/css/minified/aui-production.min.css" />

        <!-- Theme UI -->

        <link id="layout-theme" rel="stylesheet" type="text/css" href="assets/themes/minified/fides/color-schemes/dark-blue.min.css" />

        <!-- Fides Admin Responsive -->

        <link rel="stylesheet" type="text/css" href="assets/themes/minified/fides/common.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/themes/minified/fides/responsive.min.css" />

        <!-- Fides Admin JS -->

        <script type="text/javascript" src="assets/js/minified/aui-production.min.js"></script>
		
        <script type="text/javascript" src="assets/js/select_customer.js"></script><!-- select_customer -->
        <script type="text/javascript" src="assets/js/add_customer.js"></script><!-- add_customer-->
        <script type="text/javascript" src="assets/js/add_purchase.js"></script><!-- add_purchase-->
        <script type="text/javascript" src="assets/js/add_company.js"></script><!-- add_company-->
		<script type="text/javascript" src="assets/js/select_category.js"></script><!-- select_category-->
		<script type="text/javascript" src="assets/js/select_bank.js"></script><!-- select_bank-->
		<script type="text/javascript" src="assets/js/select_Companey.js"></script><!-- select_Companey-->

        <script>
            jQuery(window).load(
                function(){

                    var wait_loading = window.setTimeout( function(){
                      $('#loading').slideUp('fast');
                      jQuery('body').css('overflow','auto');
                    },1000
                    );

                });

        </script>
        <script>
			$(document).ready(function() {
				 $('.delete').click(function (){
				var r = confirm("Are you sure to delete it!");
				if (r == true) {
					var deleteTheSelectedUrl = $(this).attr('href');
					window.location = deleteTheSelectedUrl;
				} else {
					$("a.delete").removeAttr("href");
				}

			});
			});

        </script>
		
		

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	</head>
    