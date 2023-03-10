<?php $__env->startSection('content'); ?> 
<div class="row m-0 bg-gray">
    <div class="col-md-12">
        <div class="opc_error_msg"></div>
    </div>

    <div class="col-md-8 mx-auto" >
        
        <!-- opportunity -->
        <div class="card mt-5 mb-2 bgcolor-e1e3dd">
            <a onclick="window.history.back();" class="left_back mb-1 cusor_pointer display_image1"><img src="/assets/images/Frame 6.svg" alt="Back" ></a>
            <a onclick="window.history.back();" class="left_back cusor_pointer display_image2"><img src="/assets/images/backformobile.svg" alt="Back" ></a>
            <div class="card-header pl-4 pr-4 color-opentowork h-100">
                <div class="row m-0 p-0 opportunity_header">
                    <p class="w-100 m-0 p-0 font-weight-bold">Open-to-work</p>
                </div>
            </div>
            <div class="card-block p-4">
                <div class="row m-0 p-0 mt-2">
					<div class="w-100 mt-3 profile_pitch">
                        <div class="form-group form-inline p-0 m-0 mt-2">
                            <label class="col-md-3 p-0 font-weight-bold" for="role">Name:</label>
                            <input class="form-control col-md-9 opc_title" type="text" autocomplete="no"  value="<?php echo e($opc && $opc->title ? $opc->title : ''); ?><?php echo e($user && $user->full_name ? $user->full_name  : ''); ?>">
                        </div>
                        <div class="form-group form-inline p-0 m-0 mt-2">
                            <label class="col-md-3 p-0 font-weight-bold" for="company">Email:</label>
                            <input class="form-control col-md-9 opc_email" type="text" autocomplete="no" value="<?php echo e($opc && $opc->email ? $opc->email : ''); ?><?php echo e($user && $user->email ? $user->email  : ''); ?>">
						</div>
                        <div class="form-group form-inline p-0 m-0 mt-2">
                            <label class="col-md-3 p-0 font-weight-bold" for="company">Phone Number:</label>
                            <input class="form-control col-md-9 opc_phone" type="text" autocomplete="no" value="<?php echo e($opc && $opc->phone ? $opc->phone : ''); ?>">
						</div>
                        <div class="form-group form-inline p-0 m-0 mt-2 ">
                            <label class="col-md-3 p-0 font-weight-bold" for="location">Location:</label>                           
                            <select data-tags="true" class="form-control opc_country_code col-md-5 mb-2 db_exp_country"  name="chosen">
                                <option value="">Select a Country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country_code => $coutry_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country_code); ?>" <?php echo e($opc && $opc->country_code === $country_code ? 'selected' : ''); ?> <?php echo e($user && $user->country_code === $country_code ? 'selected' : ''); ?>><?php echo e($coutry_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="col-md-4 m-0 p-0 mb-2 has-location">
                                <span class="fa fa-map-marker form-control-marker"></span>
                                <input type="text" placeholder="city" class="opc_city form-control w-100 " autocomplete="no" value="<?php echo e($opc && $opc->city ? $opc->city : ''); ?><?php echo e($user && $user->city ? $user->city : ''); ?>" />
                            </div>
                        </div>
                        <div class="form-group form-inline p-0 m-0 mt-2">
                            <label class="col-md-3 p-0 font-weight-bold" for="Description">Pitch:</label>
                            <textarea class="col-md-12 form-control profile_presentation opc_description mt-2"><?php echo e($opc && $opc->description ? nl2br($opc->description)  : ''); ?><?php echo e($user && $user->my_pitch ? nl2br($user->my_pitch)  : ''); ?></textarea>
                        </div>    

						<div class="row m-0 p-0 mt-2">
							<div class="w-100 mt-3 profile_pitch">
								<h3 class="font-weight-bold">Experience:</h3>
								<div class="profile_experience_area">
									<?php $__currentLoopData = $user_experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="row m-0 p-0 profile_company" id="profile_exp_<?php echo e($ue->id); ?>">
										<p class="w-33 m-0 p-0 font-weight-bold exp_db_role ellipsis" onclick="toggleEllipsis(this)"><?php echo e($ue->title); ?></p>
										<p class="w-33 m-0 p-0 text-center mb-2 exp_db_company ellipsis" onclick="toggleEllipsis(this)"><?php echo e($ue->company); ?></p>
										<p class="w-33 m-0 p-0 cusor_pointer text-right "><img src="/assets/images/Icon-edit.svg" alt="Edit" style="width:25px;"><span class="pl-2" onclick="javascript:editProfile_experience(<?php echo e($ue->id); ?>)">Edit</span></p>
										<p class="w-33 m-0 p-0 exp_db_country_city ellipsis" onclick="toggleEllipsis(this)"><span class="fa fa-map-marker"></span>&nbsp;<?php echo e((isset($countries[$ue->country_code]) ? $countries[$ue->country_code] : '' ) .', '.$ue->city); ?></p>
										<p class="w-33 m-0 p-0 text-center exp_db_date ellipsis" onclick="toggleEllipsis(this)">
										<?php echo e(date("m/Y", strtotime($ue->from_date))); ?> - 
											<?php if($ue->currently_working == 1): ?>
												Present
											<?php else: ?>	
												<?php echo e(date("m/Y", strtotime($ue->to_date))); ?>

											<?php endif; ?>
										</p>
										<p class="w-33 m-0 p-0 cusor_pointer text-right" onclick="javascript:removeProfile_experience(<?php echo e($ue->id); ?>)">Remove</p>
										<input type="hidden" class="db_country_code" value="<?php echo e($ue->country_code); ?>" />
										<input type="hidden" class="db_city" value="<?php echo e($ue->city); ?>" />
										<input type="hidden" class="db_from_date" value="<?php echo e($ue->from_date); ?>" />
										<input type="hidden" class="db_to_date" value="<?php echo e($ue->to_date); ?>" />
									</div>
									<hr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>

								<div id="experience_wrapper" style="<?php echo e(count($user_experiences) == 0 ? 'display:block;' : 'display:none;'); ?>">
									<div class="form-group form-inline p-0 m-0 mt-2">
										<label class="col-md-3 p-0 font-weight-bold" for="role">Role:</label>
										<input class="form-control col-md-9 exp_role" placeholder="Ex: Retail Sales Manager" type="text"  value="">
									</div>
									<div class="form-group form-inline p-0 m-0 mt-2">
										<label class="col-md-3 p-0 font-weight-bold" for="company">Company:</label>
										<input class="form-control col-md-9 exp_company" type="text" placeholder="Ex: Microsoft" value="">
									</div>

									<div class="form-group form-inline p-0 m-0 mt-2">
										<label class="col-md-3 p-0 font-weight-bold" for="profession">Location:</label>
										<select class="form-control opc_country_code col-md-5 mb-2 exp_country"  name="chosen">
											<option value="">Select a Country</option>
											<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country_code => $coutry_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($country_code); ?>"><?php echo e($coutry_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>									
										<div class="col-md-4 m-0 p-0 mb-2 has-location">
											<span class="fa fa-map-marker form-control-marker"></span>
											<input type="text" placeholder="city" class="exp_city form-control w-100 " value="" />
										</div>									
									</div>

									<div class="form-group form-inline p-0 m-0 ">
										<label class="col-md-3 p-0 font-weight-bold" for="profession">Started:</label>
										<!-- <input type="text" placeholder="" class="exp_from_date form-control col-md-3 mb-2" value="" /> -->
										<input type="text"  placeholder="yyyy-mm-dd" class=" exp_from_date form-control col-md-3 mb-2" value="" >
										<label class="col-md-3 p-0 ended_align font-weight-bold" for="profession">Ended:</label>
										<input type="text" placeholder="yyyy-mm-dd"  class="exp_to_date form-control col-md-3 mb-2" value=""  />
										
										
									</div>
									<div class="w-100 row form-group p-0 m-0 ">
										<div class="col-md-9">
										</div>
										<div class="form-check col-md-3 mb-2">
											<input type="checkbox" class="form-check-input filled-in" id="ongoingExp" onclick="checkOngoingExp()">
											<label class="form-check-label " for="ongoingExp"> Ongoing</label>
										</div>
									</div>
								</div>								
							</div>
						</div>						

						<!-- Add Experience -->
						<div class="row m-0 p-0 mt-5 display_button1">
							<p class="w-75 m-0 p-0"></p>
							<p class="w-25 m-0 p-0 text-right">
								<button id="another_experience" data-id="" class="btn button_create_opportunity color-experience">Add experience</a>
								</button>
							</p>
						</div>
						<div class="row m-0 p-0 mt-5 display_button2">
							<p class="w-100 m-0 p-0 text-right">
								<button id="another_experience" data-id="" class="btn button_create_opportunity color-experience">Add experience</a>
								</button>
							</p>
						</div>



						<div class="row m-0 p-0 mt-2">
							<div class="w-100 mt-3 profile_pitch">
								<h3 class="font-weight-bold">Education:</h3>
								<div class="profile_education_area">
									<?php $__currentLoopData = $user_educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="row m-0 p-0 profile_company" id="profile_edu_<?php echo e($ue->id); ?>">
										<p class="w-33 m-0 p-0 font-weight-bold db_edu_role ellipsis" onclick="toggleEllipsis(this)"><?php echo e($ue->title); ?></p>
										<p class="w-33 m-0 p-0 text-center mb-2 db_edu_school ellipsis" onclick="toggleEllipsis(this)"><?php echo e($ue->school); ?></p>
										<p class="w-33 m-0 p-0 cusor_pointer text-right "><img src="/assets/images/Icon-edit.svg" alt="Edit" style="width:25px;"><span class="pl-2" onclick="javascript:editProfile_education(<?php echo e($ue->id); ?>)">Edit</span></p>
										<p class="w-33 m-0 p-0 db_edu_country_city ellipsis" onclick="toggleEllipsis(this)"><span class="fa fa-map-marker"></span>&nbsp;<?php echo e((isset($countries[$ue->country_code]) ? $countries[$ue->country_code] : '' ) .', '.$ue->city); ?></p>
										<p class="w-33 m-0 p-0 text-center db_edu_date ellipsis" onclick="toggleEllipsis(this)">
										<?php echo e($ue->from_year); ?> - <?php echo e($ue->to_year); ?>

										</p>
										<p class="w-33 m-0 p-0 cusor_pointer text-right" onclick="javascript:removeProfile_education(<?php echo e($ue->id); ?>)">Remove</p>
										<input type="hidden" class="db_edu_country_code" value="<?php echo e($ue->country_code); ?>" />
										<input type="hidden" class="db_edu_city" value="<?php echo e($ue->city); ?>" />
										<input type="hidden" class="db_edu_from_year" value="<?php echo e($ue->from_year); ?>" />
										<input type="hidden" class="db_edu_to_year" value="<?php echo e($ue->to_year); ?>" />
										<input type="hidden" class="db_edu_type_of_title" value="<?php echo e($ue->type_of_title); ?>" />
									</div>
									<hr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>

								<div id="education_wrapper" style="<?php echo e(count($user_educations) == 0 ? 'display:block;' : 'display:none;'); ?>">
								<div class="form-group form-inline p-0 m-0 mt-2">
									<label class="col-md-3 p-0 font-weight-bold" for="role">Field of study:</label>
									<input class="form-control col-md-9 edu_role" placeholder="Ex: Software" type="text"  value="">
								</div>
								<div class="form-group form-inline p-0 m-0 mt-2">
									<label class="col-md-3 p-0 font-weight-bold" for="company">School:</label>
									<input class="form-control col-md-6 edu_school" type="text" placeholder="Ex: Boston University" value="">
									<input class="form-control col-md-3 edu_type_of_title" placeholder="Ex: Bachelor degree" type="text" value="">
								</div>

								<div class="form-group form-inline p-0 m-0 mt-2">
									<label class="col-md-3 p-0 font-weight-bold" for="profession">Location:</label>
									<select class="form-control opc_country_code col-md-5 mb-2 edu_country"  name="chosen">
										<option value="">Select a Country</option>
										<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country_code => $coutry_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($country_code); ?>"><?php echo e($coutry_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
									<input type="text" placeholder="city" class="edu_city form-control col-md-4 mb-2" value="" />
								</div>

								<div class="form-group form-inline p-0 m-0 ">
									<label class="col-md-3 p-0 font-weight-bold" for="profession">Started:</label>
									<input type="number" placeholder="YYYY" min="2000" max="2100" class="edu_from_year form-control col-md-3 mb-2" value="" >
									
									<label class="col-md-3 p-0 ended_align font-weight-bold" for="profession">Ended:</label>
									<input type="text" placeholder="YYYY" min="2000" max="2100" class="edu_to_year form-control col-md-3 mb-2" value=""  />
	
								</div>
								<div class="w-100 row form-group p-0 m-0 ">
									<div class="col-md-9">
									</div>
									<div class="form-check col-md-3 mb-2">
										<input type="checkbox" class="form-check-input filled-in" id="ongoingEdu" onclick="checkOngoingEdu()">
										<label class="form-check-label " for="ongoingEdu"> Ongoing</label>
									</div>
								</div>	
								</div>				
							</div>
						</div>						

						<!-- Add Education -->
						<div class="row m-0 p-0 mt-5 display_button1">
							<p class="w-75 m-0 p-0"></p>
							<p class="w-25 m-0 p-0 text-right">
								<button id="another_education" data-id="" class="btn button_create_opportunity color-experience">Add education</a>
								</button>
							</p>
						</div>
						<div class="row m-0 p-0 mt-5 display_button2">
							<p class="w-100 m-0 p-0 text-right">
								<button id="another_education" data-id="" class="btn button_create_opportunity color-experience">Add education</a>
								</button>
							</p>
						</div>
                        
                        <div class="form-group form-inline p-0 m-0 mt-3">
                            <label class="col-md-3 p-0 font-weight-bold" for="profession">Roles of interests:</label>
                            <select data-tags="true" multiple class="opc_roles col-md-9 form-control mt-2">
                            <?php $__currentLoopData = $opc_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oc => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($val); ?>" <?php echo e(isset($opc_roles_db) && count($opc_roles_db) > 0 && in_array($val, $opc_roles_db) ? 'selected' : ''); ?>><?php echo e($val); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>                                            
                        <div class="form-group form-inline p-0 m-0 mt-3">
                            <label class="col-md-3 p-0 font-weight-bold" for="profession">Skills:</label>
                            <select  data-tags="true"  multiple class="opc_fields col-md-9 form-control mt-2">
                            <?php $__currentLoopData = $opc_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oc => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($val); ?>" <?php echo e(isset($opc_fields_db) && count($opc_fields_db) > 0 && in_array($val, $opc_fields_db) ? 'selected' : ''); ?>><?php echo e($val); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>    
                        <?php if($opc && $opc->id): ?>   
                        <div class="form-group form-inline p-0 m-0 mt-3">
                            <div class="col-md-3 p-0 m-0 mb-3">
								
								<button type="button" id="hideOpentowork" data-id="<?php echo e($opc && $opc->id ? $opc->id : 0); ?>" data-title="<?php echo e($refer == 1 ? 'Unhide'  : 'Hide'); ?>" data-refer-id="<?php echo e($refer ? $refer : 0); ?>" class="settingsButton btn-hide-color"><?php echo e($refer == 1 ? 'Unhide open-to-work'  : 'Hide open-to-work'); ?></button>
							</div>
                            <div class="col-md-9 p-0 m-0">
								
								<div class="alert alert-secondary m-0 p-0 p-2 " role="alert">
								Hidden open-to-work cards only appear to the talent seeker you send it too.
								</div>
								
							</div>
                            
						</div>     
                        <?php endif; ?>                                  
                    </div>
                </div>

                <div class="row m-0 p-0 mt-4">
                    <div class="w-100 m-0 p-0">	
                        <a href="#" data-opt-id="<?php echo e(isset($id) ? $id  : 0); ?>" data-opt-refer="<?php echo e($opc && $opc->refer == 1 ? 'Unhide'  : 'Hide'); ?>" data-owner-id="<?php echo e(isset($opc->user_id) ? $opc->user_id  : 0); ?>" data-owner-product="<?php echo e(isset($targetid) ? $targetid  : 0); ?>" class="text-decoration-none textcolor-blue pull-right pl-3 opt_align_mobile add_edit_opentowork_card">Save</a>
                        <?php if(isset($id) && $id > 0): ?>
                            <a href="#" data-opt-id="<?php echo e(isset($id) ? $id  : 0); ?>" class="text-decoration-none color-delete pull-right pl-2 pr-2 opt_align_mobile"  data-toggle="dropdown">Delete</a>
                 	
                            <div class="dropdown-menu dropdown-menu-right"  style="padding: 0px;">
                                <p style="padding: 10px;">Are you sure you want to delete?</p>
                                <div style="width: 90%;margin: 0 auto;padding-bottom: 10px;">
                                    <span class="delete_opentowork_card_link cusor_pointer color-delete" data-opt-id="<?php echo e(isset($id) ? $id  : 0); ?>" >Delete</span><span class="cusor_pointer pull-right" style="color: #219BC4;">Back</span>
                                </div>	

                            </div>
                        <?php endif; ?>

                           

                        
                    </div>
                </div>
            </div>
        </div>
    
        <div class="mt-5"></div>
        <p class="text-center">
            <a  onclick="window.history.back();" class="cusor_pointer"><img src='/assets/images/back_arrow_round.svg' alt='Back' ></a>
        </p>		
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\XAMPP7.4\htdocs\growyspace 2.0\resources\views/opentowork_create.blade.php ENDPATH**/ ?>