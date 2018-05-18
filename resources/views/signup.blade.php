@extends('layouts.app')

@section('content')
<div class="breadcrumbs haslayout">
			<div class="container">
				<span class="page-title">Signup</span>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Signup</li>
				</ol>
			</div>
		</div>
		<!-- BreadCrumbs End -->
<div id="main" class="haslayout padding-section">
			<div class="container">
                            <form class="shop-form" method="POST"  enctype="multipart/form-data"action="{{ route('signup') }}" id="register-form">
                        {{ csrf_field() }}

					<fieldset>
						<div class="fields-area">
							<div class="border-left"><h2>Signup</h2></div>
							
                                                        	<div class="row">
								<div class="form-group col-sm-6 col-xs-12 {{ $errors->has('firstname') ? ' has-error' : '' }}">
									<label> FirstName*</label>
									<input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                                                        @if ($errors->has('firstname'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('firstname') }}</strong>
                                                                            </span>
                                                                        @endif
								</div>
                                                                    <div class="form-group col-sm-6 col-xs-12 {{ $errors->has('name') ? ' has-error' : '' }}">
									<label>LastName*</label>
									<input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                                                        @if ($errors->has('lastname'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('lastname') }}</strong>
                                                                            </span>
                                                                        @endif
								</div>
                                                             <div class="form-group col-sm-6 col-xs-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <label for="email">E-Mail Address *</label>

                                                                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                                    @if ($errors->has('email'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif
                                                             </div>     
							</div>
							<div class="row">
								
                                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-sm-6 col-xs-12">
                                                                  <label>Password*</label>

                            
                                                                <input id="password" type="password" class="form-control" name="password" required>

                                                                @if ($errors->has('password'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                    </span>
                                                                @endif

                                                        </div>
								<div class="form-group col-sm-6 col-xs-12">
									<label>Confirm Password</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                                      								</div>
							</div>
						
							
							<div class="row">
								
								<div class="form-group col-sm-6 col-xs-12 {{ $errors->has('phone') ? ' has-error' : '' }}">
									<label>Phone*</label>
                                                                        <input type="text" name='phone' id="phone" placeholder="" class="form-control" required>
                                                                         <span class="help-block">
                                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                                    </span>
								</div>
                                                            <div class="form-group col-sm-6 col-xs-12 {{ $errors->has('profilepic') ? ' has-error' : '' }}">
									<label>Profile*</label>
                                                                        <input type="file" name='profilepic' id="profilepic" required>
                                                                         @if ($errors->has('profilepic'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('profilepic') }}</strong>
                                                                            </span>
                                                                        @endif
								</div>
							</div>
                                                        
                                                        <div class="row">
                                                        <div class=" form-groupcol-md-6 col-md-offset-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Sign up
                                                            </button>
                                                        </div>
                                                        </div>
                                                </div>
                                          </fieldset>
                                </form>
                        </div>
</div>
@endsection
   @section('footer-scripts')
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js'></script>
       <script type="text/javascript">
       $(document).ready(function () {
    $("#register-form").validate({
        rules: {
            firstname: {
                required: true,
                minlength: 3
            },
            lastname: {
                required: true,
                minlength: 3
            },
            password: {
                required: true,
                minlength: 7
            },
           
            
            email: {
                required: true,
                email: true
            },
           
            phone: {
                required: true,
                minlength: 8,
                digits: true
            },
             profilepic: {
                required: true
                
            },
          
        },
        messages: {
            firstname: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 3 characters"
            },
            lastname: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 3 characters"
            },
            password: {
                required: "Please enter your password",
                minlength: "Your name must consist of at least 7 characters"
            },
             phone: {
                required: "Please provide your phone number",
                minlength: "Your phone number must be at least 8 characters long",
                digits: "Please enter valide phone number"
            },
            profilepic: {
                required: "Please enter profile pic",
               
            },
                       
           
           
           
        },
        
       
       
    });

  
  </script>
           @endsection
