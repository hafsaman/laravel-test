@extends('layouts.app')

@section('content')

		<!-- BreadCrumbs End -->
<div id="main" class="haslayout padding-section">
			<div class="container">
                                {{ Form::model($arrUser, array('route' => array('profiledit', $arrUser->id), 'method' => 'POST','class'=>'shop-form','id'=>'register-form')) }}

                        {{ csrf_field() }}

					<fieldset>
						<div class="fields-area">
							<div class="border-left"><h2>Profile</h2></div>
							
                                                        	<div class="row">
								<div class="form-group col-sm-6 col-xs-12 {{ $errors->has('firstname') ? ' has-error' : '' }}">
									<label> FirstName</label>
									<input id="firstname" type="text" class="form-control" name="firstname" value="{{ $arrUser->firstname}}" required autofocus>

                                                                        @if ($errors->has('firstname'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('firstname') }}</strong>
                                                                            </span>
                                                                        @endif
								</div>
                                                                    <div class="form-group col-sm-6 col-xs-12 {{ $errors->has('name') ? ' has-error' : '' }}">
									<label>LastName</label>
									<input id="lastname" type="text" class="form-control" name="lastname" value="{{ $arrUser->lastname }}" required autofocus>

                                                                        @if ($errors->has('lastname'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('lastname') }}</strong>
                                                                            </span>
                                                                        @endif
								</div>
                                                             <div class="form-group col-sm-6 col-xs-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <label for="email" class="col-md-4 control-label">E-Mail Address *</label>

                                                                <input id="email" type="email" class="form-control" name="email" value="{{ $arrUser->email }}"  readonly="readOnly"  >

                                                                    @if ($errors->has('email'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif
                                                             </div>     
							</div>
							
						
							
							<div class="row">
								
								<div class="form-group col-sm-6 col-xs-12 address">
									<label>Phone*</label>
									<input type="text" name='phone' id="phone" placeholder="" class="form-control" value="{{ $arrUser->phone }}" required>
								 @if ($errors->has('phone'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            <div class="form-group col-sm-6 col-xs-12">
									<label>Profile*</label>
                                                                        <img src="{!! url('/public/uploads/avtars/'.$arrUser->profilepic) !!}" style="width:150px; height:150px;">
                                                                        <input type="file" name='profilepic' id='profilepic' >
                                                                        <input type="hidden"name="prevprofile" value="{{$arrUser->profilepic}}">
                                                                        
								</div>
							</div>
                                                        
                                                        <div class="row">
                                                        <div class=" form-groupcol-md-6 col-md-offset-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Update
                                                            </button>
                                                        </div>
                                                        </div>
                                                </div>
                                          </fieldset> 
                        {!! Form::close() !!}
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
           
            
            email: {
                required: true,
                email: true
            },
           
            phone: {
                required: true,
                minlength: 8,
                digits: true
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
            
            
            phone: {
                required: "Please provide your phone number",
                minlength: "Your phone number must be at least 8 characters long",
                digits: "Please enter valide phone number"
            },
           
           
        },
        
       
       
    });

  
  </script>
           @endsection
