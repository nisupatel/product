@extends('layouts.app')
@section('styles')
<link href="{{ asset('../assets/styles/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/styles/tooltipster.bundle.min.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/styles/style.css') }}" rel="stylesheet">
@endsection
@section('content')
<h1 class="page-header">
  {{-- @if('physical' == $decisionTree->component_type)
         <span>Project Type: Physical infrastructure and soft components</span>
         @else
         <span class="page-header">Project Type: Soft components only</span>
         @endif --}}
         &nbsp;
   <div class="dt_top_btn"><a href="{{ route('rapid.dashboard',$project_id) }}">Back to Screening Dashboard</a></div>
 </h1>
</h1>
<div class="Content">
   <div class="">
      <div class="contentDiv">
         
         <div class="previous-rating-container">
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
         <div class="step-separator"></div>
         <h3>Step 2: Impacts on the Project's Physical Infrastructure and Assets</h3>
         <p class="step_desc">Infrastructure and physical assets in energy projects can be impacted by climate and geophysical hazards in a variety of ways. For instance, extreme precipitation and flooding may damage transmission and distribution infrastructure, it may disrupt extraction activities such as coal mining and oil and gas extraction.Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step2-info-icon"> </p>
         <form class="cpf-custom-dt" id="step2PhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}  
            <div>
               <div class="form-type-checkboxes form-item-dt-step2-impacts form-item form-group">
                  <label for="edit-dt-step2-impacts">a. Select the subsectors that pertain to your project.  </label>
                  <div id="edit-dt-step2-impacts" class="form-checkboxes">
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Roads form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-roads" name="impact_sectors[]" value="Oil, Gas and Coal Mining" class="form-checkbox" @if(in_array("Oil, Gas and Coal Mining", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-roads">Oil, Gas and Coal Mining</label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Multi-modal-and-Transit-Systems form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-multi-modal-and-transit-systems" name="impact_sectors[]" value="Hydropower" class="form-checkbox" @if(in_array("Hydropower", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-multi-modal-and-transit-systems">Hydropower </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Rail form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-rail" name="impact_sectors[]" value="Transmission & Distribution" class="form-checkbox" @if(in_array("Transmission & Distribution", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-rail">Transmission & Distribution</label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Aviation form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-aviation" name="impact_sectors[]" value="Thermal Power Generation" class="form-checkbox" @if(in_array("Thermal Power Generation", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-aviation">Thermal Power Generation</label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Marine-Transportation form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-marine-transportation" name="impact_sectors[]" value="Other Renewable Energy" class="form-checkbox" @if(in_array("Other Renewable Energy", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-marine-transportation">Other Renewable Energy</label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-River-Transportation form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-river-transportation" name="impact_sectors[]" value="Energy Efficiency in Heat & Power" class="form-checkbox" @if(in_array("Energy Efficiency in Heat & Power", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-river-transportation">Energy Efficiency in Heat & Power</label>
                     </div>
                     <input type="hidden" id="ss_limit" value="3">
                  </div>
               </div>
               <div class="step2_ques2">
                  <div class="step2head"><strong>b. Reflect on your project’s infrastructure and physical assets as currently designed under your selected subsectors.</strong></div>
                  <div class="step2head">
                     <ul style="padding-top: 6px;">
                        <li>Consider whether the design takes into account recent trends and future projected changes in the climate and geophysical hazards you have identified.</li>
                        <li>Consider how the structural integrity, materials, siting, longevity and overall effectiveness of your investments may be impacted. </li>
                        <li>Consider in particular, whether the design “locks in” certain decisions for the future. </li>
                     </ul>
                  </div>
               </div>
               <div class="notes_rating_wrapper">
                  <div class="step2_ques2">
                     <p><b>c. Rate the impact of climate and geophysical hazards on your project's infrastructure and physical assets as currently designed.</b> Please note: If infrastructure and assets may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.</p>
                  </div>
                  <div class="dt_rating_container">
                     <div class="dt_rating_left">
                        <div class="form-type-select form-item-dt-step2-rating form-item form-group">
                           <label for="edit-dt-step2-rating">Select Impact Rating:&nbsp;&nbsp;&nbsp;<img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#select-impact-dt-info-icon"> </label>
                           <select class="form-control form-select" id="edit-dt-step2-rating" name="impact_rating">
                           <option value="0" @if('NULL' == $decisionTree->impact_rating) selected @endif>Please select rating</option>
                           <option value="1" @if('1' == $decisionTree->impact_rating) selected @endif>Insufficient Understanding</option>
                           <option value="2" @if('2' == $decisionTree->impact_rating) selected @endif>No / Low</option>
                           <option value="4" @if('4' == $decisionTree->impact_rating) selected @endif>Moderate</option>
                           <option value="5" @if('5' == $decisionTree->impact_rating) selected @endif>High</option>
                           </select>
                        </div>
                        <div class="rating_dropdown_suffix">
                           <ul class="dt_rating_button_step2">
                              <li id="dt_rating_high" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#high-exposer">High</li>
                              <!--<li id="dt_rating_slight" class="dt_rating_button_item">Slightly Exposed</li>-->
                              <li id="dt_rating_moderate" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#moderate-exposer">Moderate</li>
                              <li id="dt_rating_not_exposed" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#no-low-exposer">No / Low</li>
                              <li id="dt_rating_insufficient" class="dt_rating_button_item tooltip_matrix last tooltipstered" data-tooltip-content="#insufficient-exposer">Insufficient Understanding</li>
                           </ul>
                        </div>
                     </div>
                     <div class="dt_rating_right">
                        <div class="form-type-textarea form-item-dt-step2-notes form-item form-group">
                           <label for="edit-dt-step2-notes">You can capture your analysis here. </label>
                           <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step2-notes" name="impact_notes" cols="9" rows="7" placeholder="Sample Text: In the past, extreme temperature has increased water loss due to evaporation in the reservoir. This has reduced the amount of power generated. There are no plans for the design to be modified to reduce evaporation losses. However, the location’s exposure to high temperature is projected to increase, with the number of “hot days” and “warm nights” projected to increase. Future temperatures are thus likely to further increase evaporation rates and reduce water storage in the reservoir, which in turn will reduce generation. The impact rating is High because the projected increase in extreme temperature increases the level of potential impact.">{{$decisionTree->impact_notes}}</textarea></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="saveBtnBlock">
                  <button type="submit" class="SaveBtn" id="step2PhysicalSubmit">Save</button>
               </div>
            </div>
         </form>
         <div class="tooltip_templates" style="display: none;">
          <span id="no-low-exposer">
            <strong>No / Low:</strong> Climate and geophysical hazards are not likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of project investments. Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.
    
        </span>
        <span id="moderate-exposer">
            <strong>Moderate:</strong> Climate and geophysical hazards are likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of project investments. Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.
     
        </span>
        <span id="high-exposer">
            <strong>High:</strong> Climate and geophysical hazards are likely to significantly impact the structural integrity, materials, siting, longevity and overall effectiveness of project investments. Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future. 
        </span>
        <span id="insufficient-exposer">
            <strong>Insufficient Understanding:</strong> There is insufficient knowledge about the project or insufficient understanding of how to interpret information on climate and geophysical hazards to make a rating.
        </span>
            <span id="step2-info-icon">
              <ul>
                <li><strong>Extreme temperature  </strong>can increase cooling water requirements, affect renewable sources, such as bioenergy, hydropower, and solar, cause peak energy demand to spike (during heat waves) and can increase health and safety risks for workers.
                </li><li><strong>Extreme precipitation and flooding  </strong>may disrupt extraction activities, such as coal mining and oil and gas production; heavy downpours and floods may impair the transport of fuel for energy generation, changes in rainfall patterns may affect the amount of energy that may be generated from hydropower plants. 
                </li><li><strong>Drought and wildfire </strong> may create short-term peaks in demand and diminish system flexibility and supply, which may limit the ability to respond to that demand. Decreasing water availability may affect oil and gas production, barge transport of raw materials, and availability of cooling water. Drought may significantly diminish hydropower generation capacity and may also affect the growth of crops for both traditional and second-generation bioenergy production. 
                </li><li><strong>Sea level rise and storm surge </strong>  may damage equipment and power plants on the coast. Higher storm surge may disrupt oil and gas production, refining, and distribution.
                </li><li><strong>Strong winds</strong>  may damage or temporarily shut down nuclear power units, petroleum/natural gas refineries and pipelines, and petroleum terminals. Power generation from wind power plants may be reduced from winds that exceed the designed wind speed of the plant.
                </li><li><strong>Earthquakes </strong> may damage hydropower and nuclear plants as well as electricity systems. A breach in a dam may become a larger disaster, flooding an entire area. <strong>Tsunamis</strong> may reduce the ability to conduct project activities or restrict access to energy services within the run-up areas. <strong>Volcanic ash</strong> may damage a wide range of infrastructure, including engines and electrical equipment.</li>
               </ul>
            </span>
            <span id="select-impact-dt-info-icon">
            You can mouseover each rating to see a description.
            </span>
            <span id="step2-sample-text-dt-info-icon">
              Projections for the high flow volume in the river indicate an increase in future decades. The dam has experienced cracks during periods of high flow that have significantly increased the cost of maintenance in the past. Under this project, the dam will be reinforced with additional concrete to improve resilience but given future projections of increased flow, the potential impact is Moderate.
            </span>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
@section('scripts')
@endsection