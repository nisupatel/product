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
         <h3>Step 2A: Modulation of Risks by Soft Components</h3>
         @endif
         <p class="step_desc">Soft components in project design can help modulate risks from climate and geophysical hazards. Some examples include capacity building that increases the institutional and technical ability to plan for and respond to climate change impacts. Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step3-info-icon1"> </p>
         <form class="cpf-custom-dt" id="step3aPhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}  
            <div>
               <div class="form-type-checkboxes form-item-dt-softcom-types form-item form-group">
                  <label for="edit-dt-softcom-types">a. Select the soft components that pertain to your project. </label>
                  <div id="edit-dt-softcom-types" class="form-checkboxes">
                     <div class="form-type-checkbox form-item-dt-softcom-types-Policy-Development form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-policy-development" name="softcom_types[]" value="Energy, Laws, regulations, Policy analysis and development" class="form-checkbox" @if(in_array("Energy, Laws, regulations, Policy analysis and development", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-policy-development">Energy, Laws, regulations, Policy analysis and development </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-Capacity-building,-training-and-outreach form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-capacity-building-training-and-outreach" name="softcom_types[]" value="Strategic Energy System Planning" class="form-checkbox" @if(in_array("Strategic Energy System Planning", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-capacity-building-training-and-outreach">Strategic Energy System Planning </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-Data-gathering,-Monitoring-and-Information-management-systems form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-data-gathering-monitoring-and-information-management-systems" name="softcom_types[]" value="Operations Support" class="form-checkbox" @if(in_array("Operations Support", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-data-gathering-monitoring-and-information-management-systems">Operations Support </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-Long-term-strategic-planning form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-long-term-strategic-planning" name="softcom_types[]" value="Data gathering, monitoring and Information management Systems" class="form-checkbox" @if(in_array("Data gathering, monitoring and Information management Systems", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-long-term-strategic-planning">Data gathering, monitoring and Information management Systems </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-Emergency-Planning form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-emergency-planning" name="softcom_types[]" value="Feasibility, Design Studies" class="form-checkbox" @if(in_array("Feasibility, Design Studies", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-emergency-planning">Feasibility, Design Studies </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-Maintenance &amp;-Operations form-item checkbox">
                        <input type="checkbox" id="edit-dt-softcom-types-maintenance-operations" name="softcom_types[]" value="Capacity Building, technical Assistance and Outreach" class="form-checkbox" @if(in_array("Capacity Building, technical Assistance and Outreach", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-maintenance-operations">Capacity Building, technical Assistance and Outreach </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-softcom-types-institutional form-item checkbox">
                      <input type="checkbox" id="edit-dt-softcom-types-institutional" name="softcom_types[]" value="Institutional Strengthening,Training,Knowledge Exchange" class="form-checkbox" @if(in_array("Institutional Strengthening,Training,Knowledge Exchange", $decisionTree->softcom_types)) checked @endif>  <label for="edit-dt-softcom-types-institutional">Institutional Strengthening,Training,Knowledge Exchange </label>
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
                     <p><b>c. As part of the gender mainstreaming considerations for your project, have you identified women as particularly vulnerable to risks from climate and geophysical hazards?</b> For instance, in areas facing increasing frequency of extreme events, women are disproportionally vulnerable to climate-induced shocks at the household level due to reliance on natural resource-based livelihoods.</p>
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
                     <p><b>d. Does your project include components designed to help alleviate the risks to women from climate and geophysical hazards? </b> For example, the transition to clean energy through climate mitigation efforts, can lead to improved opportunities for women’s health, economic opportunities, and agency if provisions are to ensure access to sustainable energy services that addresses women’s and men’s energy needs and interests. Click here for examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step3-info-icon2"></p>
                     <div id="edit-dt-step3-ques3" class="form-checkboxes">
                        <div class="form-type-checkbox form-item-dt-step3-ques3-Yes form-item checkbox">
                           <input type="checkbox" id="edit-dt-step3-ques3-yes" name="softcom_vul_alleviate" value="Yes" class="form-checkbox" @if('Yes' == $decisionTree->softcom_vul_alleviate) checked @endif>  <label for="edit-dt-step3-ques3-yes">Yes </label>
                        </div>
                        <div class="form-type-checkbox form-item-dt-step3-ques3-No form-item checkbox">
                           <input type="checkbox" id="edit-dt-step3-ques3-no" name="softcom_vul_alleviate" value="No" class="form-checkbox" @if('No' == $decisionTree->softcom_vul_alleviate) checked @endif>  <label for="edit-dt-step3-ques3-no">No </label>
                        </div>
                     </div>
                     Other groups such as <b>migrants and displaced populations</b> may also be especially vulnerable. For instance, the energy sector is affected by droughts and floods that may damage electricity sources and dislocate people. <br>You are encouraged to reflect considerations related to vulnerable groups in your analysis below. Click here for examples of how project components can help alleviate risks to migrants <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_dt tooltipstered" data-tooltip-content="#step3-info-icon3">
                  </div>
               </div>
               <div class="form-type-textarea form-item-dt-step3-notes form-item form-group">
                  <label for="edit-dt-step3-notes">You can capture your analysis here. </label>
                  <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step3-notes" name="softcom_notes" cols="9" rows="7" placeholder="Sample Text: Training activities and capacity building put in place increase the institutional and technical ability to plan for and respond to climate-change impacts, thus reducing the risk from climate and geophysical hazards.">{{$decisionTree->softcom_notes}}</textarea></div>
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
            
            <li>Planning for redundancy and options that could accommodate disruptions in service due to natural disasters and changing climatic conditions</li>
            <li>Operational changes, such as increased maintenance that could reduce the vulnerability of infrastructure to climate variability and extremes</li>
            
            </ul>
            </span>
            
            <span id="step3-info-icon2">
            Other examples of how project components can help alleviate climate and disaster-related risks to women include:
                 <ul> 
            <li>Investment in complementary services (such as business development services, credit and agricultural extension) that can help women take advantage of investment in energy access, through e.g., productive use applications in mini-grid and off-grid projects.</li>
            <li>Support to development of women’s energy enterprises (including in solar lanterns and other technologies) using tested retail distribution methodologies focused on women’s technology and pricing preferences.</li>
            <li>Gender-responsive pricing and affordability in energy operations (for example, targeting subsidies for connection fees to female-headed households).</li>
            <li>Expanding coverage of clean cookstove technologies in those countries with poor energy access, in order to reduce pressure on biomass, reduce indoor air pollution that disproportionately affected women and children; and reducing women’s time poverty and pressures on household budgets, through reduced need for fuelwood collection and for purchase of charcoal, and improved stove efficiency.</li>
            <li>Long-term planning and laborforce development for women’s increased formal sector employment in the renewable energy industry through support to girls’ STEM education, and energy industry apprenticeships.</li>
            <li>Participation requirements or beneficiary contributions for these households.</li>
            
                  </ul>
            </span>
            
            <span id="step3-info-icon3">
            Some examples of how project components can help alleviate climate and disaster-related risks to migrants include:
                <ul> 
                <li>Incorporating changing climate and migration patterns in population projections when estimating the population to be served by the respective energy source (wind, solar, water,etc.)</li>
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