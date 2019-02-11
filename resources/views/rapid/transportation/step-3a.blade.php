@extends('layouts.app')

@section('styles')
    <link href="{{ asset('../assets/styles/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/styles/tooltipster.bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/styles/style.css') }}" rel="stylesheet">
@endsection
@section('content')
           
                     <h1 class="page-header">
                        @if('physical' == $decisionTree->component_type)
                           <span>Project Type: Physical infrastructure and soft components</span>
                           @else
                           <span class="page-header">Project Type: Soft components only</span>
                           @endif
                        <div class="dt_top_btn"><a href="{{ route('rapid.dashboard',$project_id) }}">Back to Screening Dashboard</a></div>
                     </h1>
                     <div class="Content">
                        <div class="">
                           <div class="contentDiv">

                              <div class="previous-rating-container">
                                 <div class="prev-step1">
                                    <div class="prev-step-label">
                                       <h4> Rating for Step 1: Exposure of the project location</h4>
                                    </div>
                                    <div class="prev-step-exposure-types">
                                       Selected climate and geophysical hazards: 
                                       <ul>
                                         @foreach($decisionTree->exposure_types as $exposure)
                                     		<li>{{ $exposure }}</li>
                                     	 @endforeach
                                       </ul>
                                    </div>
                                    <div class="prev-step-rating" style="background-color: {{ config('colors.colors')[$decisionTree->exposure_rating] }}; padding: 2px 5px; text-align: center; width: 123px;">{{ config('colors.colors_text')[$decisionTree->exposure_rating] }}</div>
                                 </div>

                                 @if('physical' == $decisionTree->component_type)
                                 <div class="prev-step2">
                                    <div class="prev-step-label">
                                       <h4>Rating for Step 2: Impacts on the project's physical infrastructure and assets</h4>
                                    </div>
                                    <div class="prev-step-impact-types">
                                       Selected subsectors: 
                                       <ul>
                                         @foreach($decisionTree->impact_sectors as $impact)
                                     		<li>{{ $impact }}</li>
                                     	 @endforeach
                                       </ul>
                                    </div>
                                    <div class="prev-step-rating" style="background-color: {{ config('colors.colors')[$decisionTree->impact_rating] }}; padding: 2px 5px; text-align: center; width: 123px;">{{ config('colors.colors_text')[$decisionTree->impact_rating] }}</div>
                                 </div>
                                @endif
                              </div>
                              <div class="step-separator"></div>
                              @if('physical' == $decisionTree->component_type)
                              <h3 class="dt_top_title">Step 3A: Modulation of Risks by Soft Components</h3>
                              <p class="step_desc">Soft components in project design can help modulate risks from climate and geophysical hazards. Some examples include developing transportation policies and strategic planning that consider future climate impacts on infrastructure or having emergency planning in place that increases local and national capacity to prepare for, cope with and respond to natural disasters. Click here for more examples. <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step3-info-icon1"> </p>
                              @else
                              <h3 class="dt_top_title">Step 2A: Soft components of the project</h3> 
                              <p class="step_desc">Soft components in project design can help modulate risks from climate and geophysical hazards. Some examples include having alternate means of transportation (such as secondary roads or other modes of transport) to provide critical supplies and services if the project is disrupted by climate or geophysical hazards or having the capacity and systems in place to identify and respond to disruptions from and geophysical hazards that can lessen their duration and severity. <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step3-soft-info-icon1"> </p>
                              @endif
                              
                              <form class="cpf-custom-dt" id="step3aPhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
                                 {{ csrf_field() }}  
                                 <div>
                                    <div class="form-type-checkboxes form-item-dt-softcom-types form-item form-group">
                                       <label for="edit-dt-softcom-types">a. Select the soft components that pertain to your project. </label>
                                       <div id="edit-dt-softcom-types" class="form-checkboxes">
                                          <div class="form-type-checkbox form-item-dt-softcom-types-Policy-Development form-item checkbox">
                                             <input type="checkbox" id="edit-dt-softcom-types-policy-development" name="softcom_types[]" value="Policy Development" class="form-checkbox" @if(in_array("Policy Development", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-policy-development">Policy Development </label>
                                          </div>
                                          <div class="form-type-checkbox form-item-dt-softcom-types-Capacity-building,-training-and-outreach form-item checkbox">
                                             <input type="checkbox" id="edit-dt-softcom-types-capacity-building-training-and-outreach" name="softcom_types[]" value="Capacity building, training and outreach" class="form-checkbox" @if(in_array("Capacity building, training and outreach", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-capacity-building-training-and-outreach">Capacity building, training and outreach </label>
                                          </div>
                                          <div class="form-type-checkbox form-item-dt-softcom-types-Data-gathering,-Monitoring-and-Information-management-systems form-item checkbox">
                                             <input type="checkbox" id="edit-dt-softcom-types-data-gathering-monitoring-and-information-management-systems" name="softcom_types[]" value="Data gathering, Monitoring and Information management systems" class="form-checkbox" @if(in_array("Data gathering, Monitoring and Information management systems", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-data-gathering-monitoring-and-information-management-systems">Data gathering, Monitoring and Information management systems </label>
                                          </div>
                                          <div class="form-type-checkbox form-item-dt-softcom-types-Long-term-strategic-planning form-item checkbox">
                                             <input type="checkbox" id="edit-dt-softcom-types-long-term-strategic-planning" name="softcom_types[]" value="Long-term strategic planning" class="form-checkbox" @if(in_array("Long-term strategic planning", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-long-term-strategic-planning">Long-term strategic planning </label>
                                          </div>
                                          <div class="form-type-checkbox form-item-dt-softcom-types-Emergency-Planning form-item checkbox">
                                             <input type="checkbox" id="edit-dt-softcom-types-emergency-planning" name="softcom_types[]" value="Emergency Planning" class="form-checkbox" @if(in_array("Emergency Planning", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-emergency-planning">Emergency Planning </label>
                                          </div>
                                          <div class="form-type-checkbox form-item-dt-softcom-types-Maintenance &amp;-Operations form-item checkbox">
                                             <input type="checkbox" id="edit-dt-softcom-types-maintenance-operations" name="softcom_types[]" value="Maintenance &amp; Operations" class="form-checkbox" @if(in_array("Maintenance & Operations", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-maintenance-operations">Maintenance &amp; Operations </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-type-checkboxes form-item-dt-step3-ques1 form-item form-group">
                                       <label for="edit-dt-step3-ques1">b. Indicate how soft components might together reduce or increase the risks from climate and geophysical hazards you have identified. </label>
                                       <div id="edit-dt-step3-ques1" class="form-checkboxes">
                                          <div class="form-type-checkbox form-item-dt-step3-ques1-Reduce-Risk form-item checkbox">
                                             <input type="checkbox" id="edit-dt-step3-ques1-reduce-risk" name="softcom_rating" value="Reduce Risk" class="form-checkbox" @if('Reduce Risk' == $decisionTree->softcom_rating) checked @endif>  <label for="edit-dt-step3-ques1-reduce-risk">Reduce Risk </label>
                                          </div>
                                          <div class="form-type-checkbox form-item-dt-step3-ques1-Increase-Risk form-item checkbox">
                                             <input type="checkbox" id="edit-dt-step3-ques1-increase-risk" name="softcom_rating" value="Increase Risk" class="form-checkbox" @if('Increase Risk' == $decisionTree->softcom_rating) checked @endif>  <label for="edit-dt-step3-ques1-increase-risk">Increase Risk </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="dt_step3_column_wrapper">
                                       <div class="step3_ques3">
                                          <p><b>c. As part of the gender mainstreaming considerations for your project, have you identified women as particularly vulnerable to risks from climate and geophysical hazards?</b> For example, women require transport services to access various resources and opportunities, such as employment, childcare, education, health, and political processes. They make more complex and more frequent trips than men. Cultural acceptance, personal safety and avoidance of harassment are also main concerns of women while accessing different transport modes.</p>
                                          <div id="edit-dt-step3-ques2" class="form-checkboxes">
                                             <div class="form-type-checkbox form-item-dt-step3-ques2-Yes form-item checkbox">
                                                <input type="checkbox" id="edit-dt-step3-ques2-yes" name="softcom_vulnerability" value="Yes" class="form-checkbox" @if('Yes' == $decisionTree->softcom_vulnerability) checked @endif>  <label for="edit-dt-step3-ques2-yes">Yes </label>
                                             </div>
                                             <div class="form-type-checkbox form-item-dt-step3-ques2-No form-item checkbox">
                                                <input type="checkbox" id="edit-dt-step3-ques2-no" name="softcom_vulnerability" value="No" class="form-checkbox" @if('No' == $decisionTree->softcom_vulnerability) checked @endif>  <label for="edit-dt-step3-ques2-no">No </label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="step3_ques4">
                                          <p><b>d. Does your project include components designed to help alleviate the risks to women from climate and geophysical hazards? </b> For example, a transport infrastructure improvement project can include a component focusing on building flash-flood refuges for women and children in economic centers to address their needs during heavy rainfall seasons.</p>
                                          <div id="edit-dt-step3-ques3" class="form-checkboxes">
                                             <div class="form-type-checkbox form-item-dt-step3-ques3-Yes form-item checkbox">
                                                <input type="checkbox" id="edit-dt-step3-ques3-yes" name="softcom_vul_alleviate" value="Yes" class="form-checkbox" @if('Yes' == $decisionTree->softcom_vul_alleviate) checked @endif>  <label for="edit-dt-step3-ques3-yes">Yes </label>
                                             </div>
                                             <div class="form-type-checkbox form-item-dt-step3-ques3-No form-item checkbox">
                                                <input type="checkbox" id="edit-dt-step3-ques3-no" name="softcom_vul_alleviate" value="No" class="form-checkbox" @if('No' == $decisionTree->softcom_vul_alleviate) checked @endif>  <label for="edit-dt-step3-ques3-no">No </label>
                                             </div>
                                          </div>
                                          Other groups such as <b>migrants and displaced populations</b> may also be especially vulnerable.
                                       </div>
                                    </div>
                                    <div class="form-type-textarea form-item-dt-step3-notes form-item form-group">
                                       <label for="edit-dt-step3-notes">You can capture your analysis here. </label>
                                       <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step3-notes" name="softcom_notes" cols="9" rows="7" placeholder="Sample Text: The project has a significant focus on capacity enhancement, flood contingency planning, and emergency preparedness planning. The project also includes a flood mapping update to reflect future climate impacts and for use in long-term transport planning. Combined, these features will reduce the anticipated risk from climate and geophysical hazards.">{{$decisionTree->softcom_notes}}</textarea></div>
                                    </div>
                                    <div class="saveBtnBlock">
                                       <button type="submit" class="SaveBtn" id="step3aPhysicalSubmit">Save</button>
                                    </div>
                                 </div>
                              </form>
                              <div class="tooltip_templates" style="display: none;">
                                 <span id="step3-info-icon1">
                                    Other examples of how soft components can help manage climate and disaster risk include: 
                                    <ul> 
                                       <li>Capacity building and training to help prepare for and cope with hazards or build longer-term resilience</li>
                                       <li>Budgeting processes that account for additional maintenance costs to address increasing damages from hazards, and </li>
                                       <li>Updating flood maps to reflect future climate impacts and using those maps for long-term transport planning.</li>
                                       <li>Establishing emergency protocols in anticipation of more frequent and severe extreme weather events.</li>
                                       <li>Broader institutional capacity building that can improve management and maintenance of road assets.</li>
                                       <li>Development and implementation of policies that promote flexible and adaptive management protocols.</li>
                                    </ul>
                                 </span>
                                 <span id="step3-soft-info-icon1">
                                       Other examples of how soft components can help manage climate and disaster risk include:
                                       <ul> 
                                        <li>Alternative routes are readily available and they are resilient to the impacts of climate and geophysical hazards.</li>
                                        <li>The transport authority is actively monitoring climate change impacts and taking steps to combat them. </li>
                                        <li>The transport authority exhibits awareness of climate change, and is planning to adapt to climate and disaster risks.</li>
                                        <li>Emergency protocols are in place that enables the transport authority to quickly and effectively respond to natural disasters. </li>
                                        <li>Establishing information systems that can collect and monitor information on future climate and disaster risks. </li>
                                        <li>Other opportunities for institutional strengthening and capacity building at local and national levels to take climate and disaster risk into account for transportation systems.</li>
                                       </ul>
                                 </span>
                                 <span id="step3a-sample-text-dt-info-icon">
                                 The project has a significant focus on capacity enhancement, basin-wide integrated dam reservoir operations plans, emergency preparedness plan, awareness raising and evacuation drills for local communities living downstream. The project also includes a hydrological observation network and information system. Combined, these features will reduce the anticipated risk from climate and geophysical hazards.
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
@endsection

@section('scripts')
@endsection