<?php 
   $step1 = false; 
   $step2 = false; 
   $step2a = false; 
   $step2b = false; 
   $step3 = false; 
   $step3a = false; 
   $step3b = false; 
   $step4 = false; 
   $step5 = false; 
?>
@if ($projectData->rapid->component_type == "physical")
<div id="decision-tree-physical" class="decision_tree">
   <ul id="type_physical_step1">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label">Step <span class="step_num">1</span></div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info1-1">
                  <div class="sp_head">
                     <span>Exposure of the Project Location</span>
                     <div style="display:none;">
                        <span id="Exposure-info1-1">
                           <ul>
                              <li>Consider your project location.</li>
                              <li>
                                 Is it currently exposed to:
                                 <ul>
                                    <li>Climate hazards (extreme temperature precipitation, flooding, drought, seal level rise, storm surge, high winds) and/or</li>
                                    <li>Geophysical hazards (earthquakes, tsunamis, landslides, and volcanic eruptions)?</li>
                                 </ul>
                              </li>
                              <li>How will this exposure change in the future?</li>
                           </ul>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="tree-box-rate">
                  @if (isset($projectData->rapid->exposure_rating) && $projectData->rapid->exposure_rating != "")
                  <div class="dtsteps_rate_box">
                     <div class="dtsteps_rate_box_colors" style="text-align: center; background-color:{{ config('colors.colors')[$projectData->rapid->exposure_rating] }}"> {{ config('colors.colors_text')[$projectData->rapid->exposure_rating] }}</div>
                     <div class="edit_dt_step"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-1']) }}">Edit</a></div>
                  </div>
                  <?php $step1 = true; ?>
                  @else
                  <?php $step1 = false; ?>
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-1']) }}" class="no_rating">Open</a></div>
                  @endif
               </div>
            </div>
         </div>
      </li>
   </ul>
   @if($projectData->rapid->exposure_rating != 1 && $projectData->rapid->exposure_rating != 2)
   <ul id="type_physical_step2" class="@if(!$step1) dt_disabled @endif">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label">Step <span class="step_num">2</span></div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info1-2">
                  <div class="sp_head">
                     <span class="" >Impacts on the Project's Physical Infrastructure and Assets</span>
                     <div style="display:none;">
                        <span id="Exposure-info1-2">
                           <ul>
                              <li>Consider your project’s agriculture infrastructure and other physical assets as currently designed. </li>
                              <li>Can these be impacted by the climate and geophysical hazards you have identified?</li>
                           </ul>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="tree-box-rate">
                  @if (isset($projectData->rapid->impact_rating) && $projectData->rapid->impact_rating != "") 
                  <div class="dtsteps_rate_box">
                     <div class="dtsteps_rate_box_colors" style="text-align: center; background-color: {{ config('colors.colors')[$projectData->rapid->impact_rating] }} ">{{ config('colors.colors_text')[$projectData->rapid->impact_rating] }}</div>
                     <div class="edit_dt_step"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-2']) }}">Edit</a></div>
                  </div>
                  <?php $step2 = true; ?>
                  @elseif($step1)
                  <?php $step2 = false; ?>
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-2']) }}" class="no_rating">Open</a></div>
                  @endif
               </div>
            </div>
         </div>
      </li>
   </ul>
   @if($projectData->rapid->impact_rating != 1)
   <ul id="type_physical_step3a" class="@if(!$step2) dt_disabled @endif">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label">Step <span class="step_num">3A</span></div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info-3a">
                  <div class="sp_head">
                     <span>Modulation of Risks by Soft Components</span>
                     <div style="display:none;">
                        <span id="Exposure-info-3a">
                           <ul>
                              <li>Consider soft components that are relevant for your project (e.g. capacity building, awareness raising, institutional strengthening). </li>
                              <li>How do these modulate the risks from climate and geophysical hazards you have identified?</li>
                           </ul>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="tree-box-rate">
                  @if (isset($projectData->rapid->softcom_rating) && $projectData->rapid->softcom_rating != "")
                  <div class="dtsteps_rate_box">
                     <div class="dtsteps_rate_box_text">
                        @if ($projectData->rapid->softcom_rating == "Increase Risk")
                        <span class="dt-rating-label">Modulation of risks by soft components:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/up-arrow.png') }}" style="height: 15px; width: 20px;" title="Increase Risk" /></span><br />
                        @elseif ($projectData->rapid->softcom_rating == "Reduce Risk")
                        <span class="dt-rating-label">Modulation of risks by soft components:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/down-arrow.png') }}" style="height: 15px; width: 20px;" title="Reduce Risk" /></span><br />
                        @endif
                        @if (isset($projectData->rapid->softcom_vulnerability) && $projectData->rapid->softcom_vulnerability == "Increase Risk")
                        <span class="dt-rating-label">Women identified as particularly vulnerable:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/up-arrow.png') }}" style="height: 15px; width: 20px;" title="Increase Risk" /></span><br />
                        @elseif (isset($projectData->rapid->softcom_vulnerability) && $projectData->rapid->softcom_vulnerability == "Reduce Risk")
                        <span class="dt-rating-label">Women identified as particularly vulnerable:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/down-arrow.png') }}" style="height: 15px; width: 20px;" title="Reduce Risk" /></span><br />
                        @elseif (isset($projectData->rapid->softcom_vulnerability) && $projectData->rapid->softcom_vulnerability == "Yes")
                        <span class="dt-rating-label">Women identified as particularly vulnerable:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/tic-mark-arrow.png') }}" style="height: 15px; width: 20px;" title="Yes" /></span><br />
                        @elseif (isset($projectData->rapid->softcom_vulnerability) && $projectData->rapid->softcom_vulnerability == "No")
                        <span class="dt-rating-label">Women identified as particularly vulnerable:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/x-arrow-red.png') }}" style="height: 15px; width: 20px;" title="No" /></span><br />
                        @endif
                        @if (isset($projectData->rapid->softcom_vul_alleviate) && $projectData->rapid->softcom_vul_alleviate == "Yes")
                        <span class="dt-rating-label">Components designed to help alleviate risks to women:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/tic-mark-arrow.png') }}" style="height: 15px; width: 20px;" title="Yes" /></span><br />
                        @elseif (isset($projectData->rapid->softcom_vul_alleviate) && $projectData->rapid->softcom_vul_alleviate == "No")
                        <span class="dt-rating-label">Components designed to help alleviate risks to women:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/x-arrow-red.png') }}" style="height: 15px; width: 20px;" title="No" /></span><br />
                        @endif
                     </div>
                     <div class="edit_dt_step"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-3a']) }}">Edit</a></div>
                  </div>
                  <?php $step3a = true; ?>
                  @elseif($step2)
                  <?php $step3a = false; ?>
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-3a']) }}" class="no_rating">Open</a></div>
                  @endif
               </div>
            </div>
         </div>
      </li>
   </ul>
   <ul id="type_physical_step3b" class="@if(!$step3a) dt_disabled @endif">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label">Step <span class="step_num">3B</span></div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info1-3b-new">
                  <div class="sp_head">
                     <span>Modulation of Risks by the Project's Development Context</span>
                     <div style="display:none;">
                        <span id="Exposure-info1-3b-new">
                           <ul>
                              <li>Your project is taking place within a broader development context, which includes the agriculture sector and other social, economic and political factors.</li>
                              <li>How does this context modulate the risks from climate and geophysical hazards on your project? </li>
                           </ul>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="tree-box-rate">
                  @if (isset($projectData->rapid->context_rating) && $projectData->rapid->context_rating != "") 
                  <div class="dtsteps_rate_box">
                     <div class="dtsteps_rate_box_text dtsteps_rate_box3b">
                        @if ($projectData->rapid->context_rating == "Increases Risk")
                        <span class="dt-rating-label">Modulation of risks by project development context:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/up-arrow.png') }}" style="height: 15px; width: 20px;" title="Increases Risk" /></span><br />
                        @elseif ($projectData->rapid->context_rating == "Reduce Risk")
                        <span class="dt-rating-label">Modulation of risks by project development context:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/down-arrow.png') }}" style="height: 15px; width: 20px;" title="Reduce Risk" /></span><br />
                        @endif
                     </div>
                     <div class="edit_dt_step"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-3b']) }}">Edit</a></div>
                  </div>
                  <?php $step3b = true; ?>
                  @elseif($step3a)
                  <?php $step3b = false; ?>
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-3b']) }}" class="no_rating">Open</a></div>
                  @endif
               </div>
            </div>
         </div>
      </li>
   </ul>
   <ul id="type_physical_step4" class="@if(!$step3b) dt_disabled @endif">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label">Step <span class="step_num">4</span></div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info-4">
                  <div class="sp_head">
                     <span>Risk to the Outcome/Service Delivery of the Project</span>
                     <div style="display:none;">
                        <span id="Exposure-info-4">
                           <ul>
                              <li>Consider your previous ratings.</li>
                              <li>What is the level of risk to the outcome/service delivery of the project based on these? </li>
                           </ul>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="tree-box-rate">
                  @if (isset($projectData->rapid->outcome_rating) && $projectData->rapid->outcome_rating != "") 
                  <div class="dtsteps_rate_box">
                     <div class="dtsteps_rate_box_colors" style="text-align: center; background-color: {{ config('colors.colors')[$projectData->rapid->outcome_rating] }}">{{ config('colors.colors_text')[$projectData->rapid->outcome_rating] }}</div>
                     <div class="edit_dt_step"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-4']) }}">Edit</a></div>
                  </div>
                  <?php $step4 = true; ?>
                  @elseif($step3b)
                  <?php $step4 = false; ?>
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-4']) }}" class="no_rating">Open</a></div>
                  @endif
               </div>
            </div>
         </div>
      </li>
   </ul>
   @else
   <?php $step4 = true; ?>
   @endif
   @else
   <?php $step4 = true; ?>
   @endif
   <ul id="type_physical_step5" class="dt_summary @if(!$step4) dt_disabled @endif">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label dt_summary_step">
                  <span class="step_num">Finish</span>
               </div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info1-Summary">
                  <div class="sp_head">
                     <span>Summary of Risks and Next Steps</span>
                     <div style="display:none;">
                        <span id="Exposure-info1-Summary">
                        You will be able to generate and save a summary report of your selected risk ratings.
                        </span>
                     </div>
                  </div>
               </div>
               @if($step4)
               <div class="tree-box-rate">
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'summary']) }}" class="no_rating">Open</a></div>
               </div>
               @endif
            </div>
         </div>
      </li>
   </ul>
</div>
@elseif ($projectData->rapid->component_type == "soft")
<div id="decision-tree-soft" class="decision_tree">
   <ul id="type_soft_step1">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label">Step <span class="step_num">1</span></div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info2-1">
                  <div class="sp_head">
                     <span >Exposure of the Project Location</span>
                     <div style="display:none;">
                        <span id="Exposure-info2-1">
                           <ul>
                              <li>Consider your project location.</li>
                              <li>
                                 Is it currently exposed to:
                                 <ul>
                                    <li>Climate hazards (extreme temperature precipitation, flooding, drought, seal level rise, storm surge, high winds) and/or</li>
                                    <li>Geophysical hazards (earthquakes, tsunamis, landslides, and volcanic eruptions)?</li>
                                 </ul>
                              </li>
                              <li>How will this exposure change in the future?</li>
                           </ul>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="tree-box-rate">
                  @if (isset($projectData->rapid->exposure_rating) && $projectData->rapid->exposure_rating != "")
                  <div class="dtsteps_rate_box">
                     <div class="dtsteps_rate_box_colors" style="text-align: center; background-color: {{ config('colors.colors')[$projectData->rapid->exposure_rating] }}">{{ config('colors.colors_text')[$projectData->rapid->exposure_rating] }}</div>
                     <div class="edit_dt_step"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-1']) }}">Edit</a></div>
                  </div>
                  <?php $step1 = true; ?>
                  @else
                  <?php $step1 = false; ?>
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-1']) }}" class="no_rating">Open</a></div>
                  @endif
               </div>
            </div>
         </div>
      </li>
   </ul>
   @if($projectData->rapid->exposure_rating != 1 && $projectData->rapid->exposure_rating != 2)
   <ul id="type_soft_step2a" class="@if(!$step1) dt_disabled @endif">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label">Step <span class="step_num">2A</span></div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info-3a">
                  <div class="sp_head">
                     <span>Soft components of the Project</span>
                     <div style="display:none;">
                        <span id="Exposure-info-3a">
                           <ul>
                              <li>Consider soft components that are relevant for your project (e.g. capacity building, awareness raising, institutional strengthening).</li>
                              <li>How do these modulate the risks from climate and geophysical hazards you have identified?</li>
                           </ul>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="tree-box-rate">
                  @if (isset($projectData->rapid->softcom_rating) && $projectData->rapid->softcom_rating != "")
                  <div class="dtsteps_rate_box">
                     <div class="dtsteps_rate_box_text">
                        @if ($projectData->rapid->softcom_rating == "Increase Risk")
                        <span class="dt-rating-label">Modulation of risks by soft components:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/up-arrow.png') }}" style="height: 15px; width: 20px;" title="Increase Risk" /></span><br />
                        @elseif ($projectData->rapid->softcom_rating == "Reduce Risk")
                        <span class="dt-rating-label">Modulation of risks by soft components:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/down-arrow.png') }}" style="height: 15px; width: 20px;" title="Reduce Risk" /></span><br />
                        @endif
                        @if (isset($projectData->rapid->softcom_vulnerability) && $projectData->rapid->softcom_vulnerability == "Increase Risk")
                        <span class="dt-rating-label">Women identified as particularly vulnerable:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/up-arrow.png') }}" style="height: 15px; width: 20px;" title="Increase Risk" /></span><br />
                        @elseif (isset($projectData->rapid->softcom_vulnerability) && $projectData->rapid->softcom_vulnerability == "Reduce Risk")
                        <span class="dt-rating-label">Women identified as particularly vulnerable:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/down-arrow.png') }}" style="height: 15px; width: 20px;" title="Reduce Risk" /></span><br />
                        @elseif (isset($projectData->rapid->softcom_vulnerability) && $projectData->rapid->softcom_vulnerability == "Yes")
                        <span class="dt-rating-label">Women identified as particularly vulnerable:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/tic-mark-arrow.png') }}" style="height: 15px; width: 20px;" title="Yes" /></span><br />
                        @elseif (isset($projectData->rapid->softcom_vulnerability) && $projectData->rapid->softcom_vulnerability == "No")
                        <span class="dt-rating-label">Women identified as particularly vulnerable:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/x-arrow-red.png') }}" style="height: 15px; width: 20px;" title="No" /></span><br />
                        @endif
                        @if (isset($projectData->rapid->softcom_vul_alleviate) && $projectData->rapid->softcom_vul_alleviate == "Yes")
                        <span class="dt-rating-label">Components designed to help alleviate risks to women:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/tic-mark-arrow.png') }}" style="height: 15px; width: 20px;" title="Yes" /></span><br />
                        @elseif (isset($projectData->rapid->softcom_vul_alleviate) && $projectData->rapid->softcom_vul_alleviate == "No")
                        <span class="dt-rating-label">Components designed to help alleviate risks to women:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/x-arrow-red.png') }}" style="height: 15px; width: 20px;" title="No" /></span><br />
                        @endif
                     </div>
                     <div class="edit_dt_step"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-3a']) }}">Edit</a></div>
                  </div>
                  <?php $step2a = true; ?>
                  @elseif($step1)
                  <?php $step2a = false; ?>
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-3a']) }}" class="no_rating">Open</a></div>
                  @endif
               </div>
            </div>
         </div>
      </li>
   </ul>
   <ul id="type_soft_step2b" class="@if(!$step2a) dt_disabled @endif">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label">Step <span class="step_num">2B</span></div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info2-2">
                  <div class="sp_head">
                     <span>Sector and Country Context of the Project</span>
                     <div style="display:none;">
                        <ul id="Exposure-info2-2">
                           <li>Your project is taking place within a broader  country context, which includes the energy sector and other social, economic and political factors.</li>
                           <li> How does this context influence the climate and disaster risks for your project?</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="tree-box-rate">
                  @if (isset($projectData->rapid->context_rating) && $projectData->rapid->context_rating != "")
                  <div class="dtsteps_rate_box">
                     <div class="dtsteps_rate_box_text dtsteps_rate_box3b">
                        @if ($projectData->rapid->context_rating == "Increases Risk")
                        <span class="dt-rating-label">Modulation of risks by project development context:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/up-arrow.png') }}" style="height: 15px; width: 20px;" title="Increases Risk" /></span><br />
                        @elseif ($projectData->rapid->context_rating == "Reduce Risk")
                        <span class="dt-rating-label">Modulation of risks by project development context:</span><span class="dt-rating-icon"><img src="{{ asset('assets/images/down-arrow.png') }}" style="height: 15px; width: 20px;" title="Reduce Risk" /></span><br />
                        @endif
                     </div>
                     <div class="edit_dt_step"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-3b']) }}">Edit</a></div>
                  </div>
                  <?php $step2b = true; ?>
                  @elseif($step2a)
                  <?php $step2b = false; ?>
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-3b']) }}" class="no_rating">Open</a></div>
                  @endif
               </div>
            </div>
         </div>
      </li>
   </ul>
   <ul id="type_soft_step3" class="@if(!$step2b) dt_disabled @endif">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label">Step <span class="step_num">3</span></div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info2-3">
                  <div class="sp_head">
                     <span>Risk to the Outcome/Service Delivery of the Project</span>
                     <div style="display:none;">
                        <span id="Exposure-info2-3">
                           <ul>
                              <li>Consider your previous ratings.</li>
                              <li>What is the level of risk to the outcome/service delivery of the project based on these? </li>
                           </ul>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="tree-box-rate">
                  @if (isset($projectData->rapid->outcome_rating) && $projectData->rapid->outcome_rating != "")
                  <div class="dtsteps_rate_box">
                     <div class="dtsteps_rate_box_colors" style="text-align: center; background-color: {{config('colors.colors')[$projectData->rapid->outcome_rating]}}">{{ config('colors.colors_text')[$projectData->rapid->outcome_rating] }}</div>
                     <div class="edit_dt_step"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-4']) }}">Edit</a></div>
                  </div>
                  <?php $step4 = true; ?>
                  @elseif($step2b)
                  <?php $step4 = false; ?>
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'step-4']) }}" class="no_rating">Open</a></div>
                  @endif
               </div>
            </div>
         </div>
      </li>
   </ul>
   @else
   <?php $step4 = true; ?>
   @endif
   <ul id="type_soft_step4" class="dt_summary @if(!$step4) dt_disabled @endif">
      <li>
         <div class="tree-box secondary-box">
            <div class="tree-box-inner">
               <div class="step_label dt_summary_step"><span class="step_num">Finish</span></div>
               <div class="step_heading tooltip_matrix" data-tooltip-content="#Exposure-info2-Summary">
                  <div class="sp_head">
                     <span>Summary of Risks and Next Steps</span>
                     <div style="display:none;">
                        <span id="Exposure-info2-Summary">
                           <ul>
                              <li>You will be able to generate and save a summary report of your selected risk ratings.</li>
                           </ul>
                        </span>
                     </div>
                  </div>
               </div>
               @if($step4)
               <div class="tree-box-rate">
                  <div class="dt_open_link"><a href="{{ route('rapid.steps',['id'=>$projectData->rapid->id,'stepname'=>'summary']) }}" class="no_rating">Open</a></div>
               </div>
               @endif
            </div>
         </div>
      </li>
   </ul>
</div>
@endif