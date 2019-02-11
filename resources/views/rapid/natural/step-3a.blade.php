@extends('layouts.app')
@section('styles')
<link href="{{ asset('../assets/styles/tooltipster.bundle.min.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/styles/style.css') }}" rel="stylesheet">
@endsection
@section('content')
<h1 class="page-header">
   &nbsp;
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
         <h3>Step 3A: Modulation of Risks by Soft Components</h3>
         @else
         <h3>Step 2A: Soft components of the project</h3>
         @endif
         <p class="step_desc">Soft components in project design can help modulate risks from climate and geophysical hazards. Some examples include developing natural resources policies and strategic planning that consider future climate impacts.Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step3-info-icon1"> </p>
         <form class="cpf-custom-dt" id="step3aPhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}  
            <div>
               <div class="form-type-checkboxes form-item-dt-softcom-types form-item form-group">
                  <label for="edit-dt-softcom-types">a. Select the soft components that pertain to your project. </label>
                  <div id="edit-dt-softcom-types" class="form-checkboxes">
                     <div class="form-type-checkbox form-item-dt-softcom-types-Policy-Development form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-policy-development" name="softcom_types[]" value="Policy Development" class="form-checkbox" @if(in_array("Policy Development", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-policy-development">Policy Development </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-Long-term-strategic-planning form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-long-term-strategic-planning" name="softcom_types[]" value="Long-term strategic planning" class="form-checkbox" @if(in_array("Long-term strategic planning", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-long-term-strategic-planning">Long-term strategic planning </label>
                    </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-Capacity-building,-training-and-outreach form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-capacity-building-training-and-outreach" name="softcom_types[]" value="Capacity building, training and outreach" class="form-checkbox" @if(in_array("Capacity building, training and outreach", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-capacity-building-training-and-outreach">Capacity building, training and outreach </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-Emergency-Planning form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-emergency-planning" name="softcom_types[]" value="Emergency Planning" class="form-checkbox" @if(in_array("Emergency Planning", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-emergency-planning">Emergency Planning </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-Maintenance &amp;-Operations form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-maintenance-operations" name="softcom_types[]" value="Maintenance and Operations" class="form-checkbox" @if(in_array("Maintenance and Operations", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-maintenance-operations">Maintenance and Operations </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-Data-gathering,-Monitoring-and-Information-management-systems form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-data-gathering-monitoring-and-information-management-systems" name="softcom_types[]" value="Data gathering, Monitoring and Information management systems" class="form-checkbox" @if(in_array("Data gathering, Monitoring and Information management systems", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-data-gathering-monitoring-and-information-management-systems">Data gathering, Monitoring and Information management systems </label>
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
                     <p><b>c. As part of the gender mainstreaming considerations for your project, have you identified women as particularly vulnerable to risks from climate and geophysical hazards?</b> For example, climate stress on water and forest resources can result in women having to travel longer distances and for longer time to collect water or wood for domestic use, thereby increasing their time-poverty. Click here for more examples. <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step-c-icon"></p>
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
                     <p><b>d. Does your project include components designed to help alleviate the risks to women from climate and geophysical hazards? </b> For example, tracking systems that monitor natural resource degradation impacts on women’s livelihoods (e.g. domestic water use, forest timber). Click here for more examples. <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step3-info-icon2"></p>
                     <div id="edit-dt-step3-ques3" class="form-checkboxes">
                        <div class="form-type-checkbox form-item-dt-step3-ques3-Yes form-item checkbox">
                           <input type="checkbox" id="edit-dt-step3-ques3-yes" name="softcom_vul_alleviate" value="Yes" class="form-checkbox" @if('Yes' == $decisionTree->softcom_vul_alleviate) checked @endif>  <label for="edit-dt-step3-ques3-yes">Yes </label>
                        </div>
                        <div class="form-type-checkbox form-item-dt-step3-ques3-No form-item checkbox">
                           <input type="checkbox" id="edit-dt-step3-ques3-no" name="softcom_vul_alleviate" value="No" class="form-checkbox" @if('No' == $decisionTree->softcom_vul_alleviate) checked @endif>  <label for="edit-dt-step3-ques3-no">No </label>
                        </div>
                     </div>
                     Other groups such as <b>migrants and displaced populations</b> may also be especially vulnerable. For instance, increased natural resource degradation can force people to leave their homes and livelihoods. Click here for examples of how project components can help alleviate risks to migrants. <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_dt tooltipstered" data-tooltip-content="#step3-info-icon3">
                  </div>
               </div>
               <div class="form-type-textarea form-item-dt-step3-notes form-item form-group">
                  <label for="edit-dt-step3-notes">You can capture your analysis here. </label>
                  <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step3-notes" name="softcom_notes" cols="9" rows="7" placeholder="Sample text. The project includes capacity enhancement, emergency preparedness plans and awareness raising for target beneficiaries. The project also includes support for diversification out of climate-sensitive livelihoods. Combined, these features will reduce the anticipated risk from climate and geophysical hazards.">{{$decisionTree->softcom_notes}}</textarea></div>
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
                <li>Emergency protocols to respond to natural disasters, such as tropical cyclones.</li>
                <li>Updating flood maps to reflect future climate impacts.</li>
                <li>Enhancing ocean monitoring systems, such as tide gauges, to track changes in sea level and inform future decision-making.</li>
                <li>Establishing zoning policies in anticipation of more frequent and severe extreme weather events and broader institutional capacity building that can enhance the enforcement of coastal zoning measures.</li>
                <li>Land conservation management to build longer-term resilience.</li>
                <li>Support for diversification of livelihoods.</li>
                <li>Community mobilization and social capital institution building.</li>
                <li>Capacity building and training to help prepare for and cope with hazards or build longer-term resilience.</li>
                <li>Budgeting processes that account for additional maintenance costs to address increasing damages from hazards.</li>
                <li>Development and implementation of policies that promote flexible and adaptive management protocols</li>
                <li>Establishing information systems that can collect and monitor information on future climate and disaster risks. </li>
                <li>Running education campaigns that factor in future climate impacts on ecosystem services.</li>
                </ul>
                </span>
                
                <span id="step3-info-icon2">
                Other examples of how project components can help alleviate climate and disaster-related risks to women include:
                   <ul> 
                    <li>Capacity building that enables women to serve as decision makers and effective agents for community preparedness for flooding and other extreme events. This can improve their standing in the public sphere as leaders and reduce disproportionately high mortality rates among women in such disasters. </li>
                <li>Long-term planning that ensures women’s access to and decision-making power over competing resources (e.g. women’s participation in water user associations). </li>
                <li>Policies that ensure equal access to natural resources for women.</li>
                <li>Designing economic and social programs that differentiate among vulnerabilities such as income, age, and gender.</li>
                     </ul>
                </span>
                
                <span id="step3-info-icon3">
                @if('physical' == $decisionTree->component_type)
                 Some examples of how project components can help alleviate climate and disaster-related risks to migrants include:
                    <ul> 
                      <li>Developing policies that make financial credit, loans and insurance available to target beneficiaries. </li>
                      <li>Promoting investments in technologies and practices for efficient use and conservation of natural resources.</li>
                      <li>Establishing natural resources users’ associations to govern local natural resource systems.</li>
                      <li>Establishing information systems that can collect and monitor information on future climate and disaster risks. </li>
                      <li>Running education campaigns that factor in future climate impacts on ecosystem services.</li>
                      <li>Other opportunities for institutional strengthening and capacity building at local and national levels to take climate and disaster risk into account for natural resource systems.</li>
                    </ul>
                @else
                Some examples of how project components can help alleviate climate and disaster-related risks to migrants include:

                 <ul>
                  <li>Incorporating changing climate and migration patterns in population projections when estimating the population using natural resources within an ecosystem or landscape (e.g., rangeland, forest, freshwater system). </li>
                  <li>Voluntarily relocating people out of harm’s way (away from steep hillsides, from flood plains, and from the coast). Making sure that other vulnerable people do not move into vacated areas by reserving them for soccer fields, public parks, etc.</li>
                 </ul>
                @endif
                </span>
                
                    <span id="step3a-sample-text-dt-info-icon">
                The project has a significant focus on capacity enhancement, basin-wide integrated dam reservoir operations plans, emergency preparedness plan, awareness raising and evacuation drills for local communities living downstream. The project also includes a hydrological observation network and information system. Combined, these features will reduce the anticipated risk from climate and geophysical hazards.
                </span>
                
                <span id="step3d-info-icon2">
                Some examples of how project components can help alleviate climate and disaster-related risks to migrants include:
                <ul>
                <li>Incorporating changing climate and migration patterns in population projections when estimating the population using natural resources within an ecosystem or landscape (e.g., rangeland, forest, freshwater system). </li>
                <li>Voluntarily relocating people out of harm’s way (away from steep hillsides, from flood plains, and from the coast). Making sure that other vulnerable people do not move into vacated areas by reserving them for soccer fields, public parks, etc.</li>
                </ul>
                </span>
                
                <span id="step-c-icon">
                <ul><li>Women who are highly dependent on local, climate-sensitive natural resources for their livelihood may face greater difficulty when experiencing extreme weather events, which can exacerbate gender inequity. </li></ul>
                </span>
                </div>
      </div>
   </div>
</div>
@endsection
@section('scripts')
@endsection