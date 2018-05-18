@extends('frontend.layouts.homelayout')

@section('content')



@section('content')
<div class="breadcrumbs haslayout">
			<div class="container">
				<span class="page-title">Registration</span>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Registration</li>
				</ol>
			</div>
		</div>
		<!-- BreadCrumbs End -->
<div id="main" class="haslayout padding-section">
			<div class="container">
				<form class="shop-form" method="POST" action="{{ route('register') }}" id="register-form">
                        {{ csrf_field() }}

					<fieldset>
						<div class="fields-area">
							<div class="border-left"><h2>Registration</h2></div>
							
                                                        	<div class="row">
								<div class="form-group col-sm-6 col-xs-12 {{ $errors->has('name') ? ' has-error' : '' }}">
									<label> Name</label>
									<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                                        @if ($errors->has('name'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('name') }}</strong>
                                                                            </span>
                                                                        @endif
								</div>
                                                             <div class="form-group col-sm-6 col-xs-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <label for="email" class="col-md-4 control-label">E-Mail Address *</label>

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
                                                                  <label>Password</label>

                            
                                                                <input id="password" type="password" class="form-control" name="password" required>

                                                                @if ($errors->has('password'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                    </span>
                                                                @endif

                                                        </div>
								<div class="form-group col-sm-6 col-xs-12">
									<label>Confirm Password*</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
								</div>
							</div>
						
							<div class="row">
								<div class="form-group col-sm-12 col-xs-12 address">
									<label>Your Address*</label>
									<input type="text" name="address" placeholder="Street Address" class="form-control">
									
								</div>
							</div>
							<div class="row">
                                                            <div class="form-group col-sm-6 col-xs-12">
									<label>Area*</label>
									<input type="text" placeholder=""name="area" class="form-control">
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label>State*</label>
                                                                        {{ Form::select('state', ['' => 'Select'] +$states , old('state') , array('class' => 'form-control', 'id' => 'state')) }} 
                                                                        
									
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label>Town / City*</label>
                                                                        {{ Form::select('city', ['' => 'Select'] , old('city') , array('class' => 'form-control', 'id' => 'city')) }}  
									
								</div>
                                                            <div class="form-group col-sm-6 col-xs-12">
									<label>Country*</label>
									<select name='country'>
										
										<option value='1'>United States (US)</option>
										
									</select>
								</div>
								
							</div>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label>Postcode / Zip*</label>
									<input type="text" name='postalcode' placeholder="" class="form-control">
								</div>
								<div class="form-group col-sm-6 col-xs-12 address">
									<label>Phone*</label>
									<input type="text" name='phone' placeholder="" class="form-control">
								</div>
							</div>
                                                        
                                                        <div class="row">
                                                        <div class=" form-groupcol-md-6 col-md-offset-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Register
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
            name: {
                required: true,
                minlength: 3
            },
            password: {
                required: true,
                minlength: 7
            },
           
            address: {
                required: true,
                minlength: 5,
            },
            email: {
                required: true,
                email: true
            },
            state: "required",
            city: "required",
            postalcode: {
                required: true,
                minlength: 3,
                digits: true
            },
            phone: {
                required: true,
                minlength: 8,
                digits: true
            },
          
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 3 characters"
            },
            password: {
                required: "Please enter your password",
                minlength: "Your name must consist of at least 7 characters"
            },
            
            address: {
                required: "Please provide your address",
                minlength: "Your address must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
            state: "Please select state",
            city: "Please select city",
            postalcode: {
                required: "Please provide your STD Code",
                minlength: "Your STD Code must be at least 3 characters long",
                digits: "Please enter valide STD Code"
            },
            phone: {
                required: "Please provide your phone number",
                minlength: "Your phone number must be at least 8 characters long",
                digits: "Please enter valide phone number"
            },
           
           
        },
        
       
       
    });

    $("#state").change(function () {
        var stateId = $(this).val();
     
        if (stateId) {
            $.ajax({
                type: "GET",
                url: "api/get-city-list?state_id=" + stateId,
                
                success: function (res) {
                    if (res) {
                        $("#city").empty();
                        $("#city").append('<option value="">Select City</option>');
                        $.each(res, function (key, value) {
                            $("#city").append('<option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        $("#city").empty();
                        $("#city").append('<option value="">Select</option>');
                    }
                }
            });
        } else {
            $("#city").empty();
            $("#city").append('<option value="">Select</option>');
        }
    });    
});

  </script>
           @endsection
