<!doctype html>
<html lang="en">
  <head>
  	<title>Student Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/multiselect-dropdown.js') }}"></script>
    <style>
      .multiselect-dropdown{
        width:100% !important;
      }
    </style>
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="" class="logo">Admin Dashboard</a></h1>
        <ul class="list-unstyled components mb-5">

          
                <li>
                    <a href=""><span class="fa fa-users mr-3"></span> Home</a>
                </li>
                <li>
                    <a href="{{route('admin.students.index')}}"><span class="fa fa-users mr-3"></span> Student</a>
                </li>
                 <li>
                    <a href="{{route('students.index')}}"><span class="fa fa-users mr-3"></span> Teacher</a>
                </li>
                <li>
                    <a href=""><span class="fa fa-users mr-3"></span> Courses</a>
                </li>
                <li>
                  <a href=""><span class="fa fa-users mr-3"></span> Enrollment</a>
                </li>
                <li>
                  <a href=""><span class="fa fa-users mr-3"></span> Payment</a>
                </li>
          

            <li>
                <a href="/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
            </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
              @yield('space-work')
            </div>
		</div>

    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
