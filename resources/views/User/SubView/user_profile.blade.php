	<div class="header"> 
                <h1 class="page-header">
                    {{Auth::user()->lastname}}'s Profile
                </h1>						
			</div>

            <div id="page-inner" class="container">
            	<div class="profile-container">
            		<div class="row" style="display: flex;justify-content: center;align-items: center">
            			<div class="col-xs-12">
            				{!!Form::open(['method' => 'POST', 'url' => 'user/action/update_profile', 'entype' => 'multipart/form-data'])!!}
							
							<div class="detail-section">
            					<div class="row">
            						<div class="col-md-2 col-xs-4">
            							<div class="profile-field-name">
  											Email
  										</div>
            						</div>
            						<div class="col-md-10 col-xs-8">
            							<div class="profile-content">
            								{!!Form::text('user_email',Auth::user()->email,array('class' => 'profile-content','id' => 'user_email_input'))!!}
            							</div>
            						</div>
            					</div>
            				</div>

							<div class="detail-section">
            					<div class="row">
            						<div class="col-md-2 col-xs-4">
            							<div class="profile-field-name">
  											Phone
  										</div>
            						</div>
            						<div class="col-md-10 col-xs-8">
            							<div class="profile-content">
            								{!!Form::text('user_phone',Auth::user()->phone,array('class' => 'profile-content','id' => 'user_phone_input'))!!}
            							</div>
            						</div>
            					</div>
            				</div>

            				<div class="detail-section">
            					<div class="row">
            						<div class="col-md-2 col-xs-4">
            							<div class="profile-field-name">
  											Address
  										</div>
            						</div>
            						<div class="col-md-10 col-xs-8">
            							<div class="profile-content">
            								{!!Form::text('user_address',Auth::user()->address,array('class' => 'profile-content','id' => 'user_address_input'))!!}
            							</div>
            						</div>
            					</div>
            				</div>

            				<div class="detail-section">
            					<div class="row">
            						<div class="col-md-2 col-xs-4">
            							<div class="profile-field-name">
  											First Name
  										</div>
            						</div>
            						<div class="col-md-10 col-xs-8">
            							<div class="profile-content">
            								{!!Form::text('user_first_name',Auth::user()->firstname,array('class' => 'profile-content','id' => 'user_firstname_input'))!!}
            							</div>
            						</div>
            					</div>
            				</div>

            				<div class="detail-section">
            					<div class="row">
            						<div class="col-md-2 col-xs-4">
            							<div class="profile-field-name">
  											Last Name
  										</div>
            						</div>
            						<div class="col-md-10 col-xs-8">
            							<div class="profile-content">
            								{!!Form::text('user_last_name',Auth::user()->lastname,array('class' => 'profile-content','id' => 'user_lastname_input'))!!}
            							</div>
            						</div>
            					</div>
            				</div>
                            
                            <!--
            				<div class="detail-section">
            					<div class="row" style="display: flex;justify-content: center;align-items: center">
            						<div class="col-xs-5" style="display: flex;justify-content: center;align-items: center">
            							{!!Form::submit('Update',array('id' => 'profile-submit-btt'))!!}
            						</div>
            					</div>
            				</div>
                        -->
            				{!!Form::close()!!}
            			</div>
            		</div>
            	</div>
            </div>
            <!-- /. PAGE INNER  -->