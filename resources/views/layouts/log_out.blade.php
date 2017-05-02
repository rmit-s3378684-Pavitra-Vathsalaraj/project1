@include('layouts.nav')

	<div style='margin-top:5%' class="container-fluid">
		<div style='width: 30%;margin:auto' class="panel panel-default">
			<h2 style='text-align: center' >Logged out</h2>
				<hr>
					@if(Session::has('success'))
						<div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
							{{Session::get('success')}} 
						</div>
					@endif
					@if(Session::has('logout_success'))
						<div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
							{{Session::get('logout_success')}} 
						</div>
					@endif
						@if(Session::has('Auth_error'))
						<div style='margin-left:7%;text-align:center' class="alert alert-success col-sm-10"> 
							{{Session::get('Auth_error')}} 
						</div>
					@endif

					<p style='text-align: center'>
					You have Successfully logged out.
					
				</p>
			
			<form action="register_check" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div style='margin:10%' >
					  	<div class="form-group">
					  	  
	
						 
						</div>
					</div>
				 
  			<p style='text-align: center'>
        	  <a style='border-color:#ccc' href="{{URL::to('/login')}}" class="btn btn-secondary">Log in again</a>
        	  
        	</p>
			</form>
		</div>

	</div>

@include('layouts.login_intro')

@include('layouts.footer')
</body>
</html>