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
         <p class="step_desc">Infrastructure and physical assets in transportation projects can be impacted by climate and geophysical hazards in a variety of ways. For instance, extreme precipitation and flooding can affect the performance, durability and accessibility of transport infrastructure, resulting in temporary or permanent suspension of transport services. Click here for more examples. <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step2-info-icon"> </p>
         <form class="cpf-custom-dt" id="step2PhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}  
            <div>
               <div class="form-type-checkboxes form-item-dt-step2-impacts form-item form-group">
                  <label for="edit-dt-step2-impacts">a. Select the subsectors that pertain to your project.  </label>
                  <div id="edit-dt-step2-impacts" class="form-checkboxes">
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Roads form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-roads" name="impact_sectors[]" value="Roads" class="form-checkbox" @if(in_array("Roads", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-roads">Roads</label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Multi-modal-and-Transit-Systems form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-multi-modal-and-transit-systems" name="impact_sectors[]" value="Multi-modal and Transit Systems" class="form-checkbox" @if(in_array("Multi-modal and Transit Systems", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-multi-modal-and-transit-systems">Multi-modal and Transit Systems </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Rail form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-rail" name="impact_sectors[]" value="Rail" class="form-checkbox" @if(in_array("Rail", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-rail">Rail</label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Aviation form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-aviation" name="impact_sectors[]" value="Aviation" class="form-checkbox" @if(in_array("Aviation", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-aviation">Aviation</label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Marine-Transportation form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-marine-transportation" name="impact_sectors[]" value="Marine Transportation" class="form-checkbox" @if(in_array("Marine Transportation", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-marine-transportation">Marine Transportation</label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-River-Transportation form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-river-transportation" name="impact_sectors[]" value="River Transportation" class="form-checkbox" @if(in_array("River Transportation", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-river-transportation">River Transportation</label>
                     </div>
                     <input type="hidden" id="ss_limit" value="5">
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
                           <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step2-notes" name="impact_notes" cols="9" rows="7" placeholder="Sample Text: Extreme temperature conditions are projected to increase in the future, thus increasing the risk of damage to road assets. However, pavement binder can be modified easily in the future, so the decisions made today are not locked in for future decades. Pavement binder can be adjusted as temperatures change. Projected increases in extreme precipitation, namely heavy downpours, may expand damage from flooding. Sea level rise is also projected to increase over the project lifetime. At the high end of the projections, waters could overtop the levee, and the road would be inundated. This would erode the road base and cause extensive physical damage. More extreme storm surge events can exacerbate these damages. Design decisions concerning the road bed and the elevation of the road are long-lasting and costly to modify. Regarding strong winds, even if historical wind events were to become more frequent, the level of physical damage would not escalate significantly. Overall, to reflect the increased potential physical damage from flooding, sea level rise and storm surge, the Future rating is High Potential Impact.">{{$decisionTree->impact_notes}}</textarea></div>
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
            <strong>No / Low:</strong> Climate and geophysical hazards are not likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of your investments. Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.
            </span>
            <span id="moderate-exposer">
            <strong>Moderate:</strong> Climate and geophysical hazards are likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of project investments. Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.
            </span>
            <span id="high-exposer">
            <strong>High:</strong> Climate and geophysical hazards are likely to significantly impact the structural integrity, materials, siting, longevity and overall effectiveness of your investments. Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.
 
            </span>
            <span id="insufficient-exposer">
            <strong>Insufficient Understanding:</strong> There is insufficient knowledge about the project or insufficient understanding of how to interpret information on climate and geophysical hazards to make a rating.
            </span>
            <span id="step2-info-icon">
               <strong>Roads</strong>
               <ul>
                  <li>Extreme temperature can affect the durability of road infrastructure – some types of asphalt binder have exhibited sensitivity beginning at 42°C, particularly if combined with truck traffic. There is also potential for significantly reduced operational capacity above 46°C due to impacts on both road surface and vehicle operation.</li>
                  <li>Extreme precipitation and flooding pose risks to tunnels and drainage systems by overwhelming them with water and storm debris. Thresholds for damage to roads and drainage systems are often observed at the 50 to 100 year flood level. Bridges, which are often designed with higher thresholds in mind, may be susceptible to 100-500 year floods.</li>
                  <li>Sustained strong winds have the potential to create significant debris that can disrupt drainage systems as well as pose a risk to motorists and maintenance crews. Strong winds have been observed to impact the usability of roads above 62 km/hr and pose a significant hazard above 119 km/hr. Winds over 150 km/hr may cause damage to permanent road signage. Winds over 225 km/hr may cause stress to bridges.</li>
               </ul>
              <strong>Multi-modal and transit systems</strong>
               <ul>
                <li>Extreme temperatures can cause buckling of tracks and paved surfaces. </li>
                <li>Heavy precipitation and urban flooding can result in service disruption, including loss of access to critical destination (e.g., hospitals, shelters).</li>
               </ul>
              <strong>Rail</strong>
                <ul>
                <li>High temperatures may decrease the service life of runways and other critical infrastructure. </li>
                <li>Heavy rainfall events can cause flight delays and cancellations, even if there is no physical damage to airport infrastructure.</li>
                </ul>
            <strong>Aviation</strong>
              <ul>
                <li>High temperatures may decrease the service life of runways and other critical infrastructure.</li>
                <li>Heavy rainfall events can cause flight delays and cancellations, even if there is no physical damage to airport infrastructure.</li>
              </ul>
           <strong>Marine Transportation</strong>
            <ul>
              <li>Extreme precipitation and flooding can increase erosion and sedimentation around harbors and access channels.</li>
           <li>Sea level rise and storm surge can damage marine port buildings and equipment, including from increased wave and water loads and increased corrosion due to exposure to salt water.</li>
            </ul>
           <strong>River Transportation</strong>
             <ul>
               <li>Heavy precipitation and inland flooding can disrupt inland shipping channels due to increased silt deposition.</li>
               <li>Sea level rise can cause water to back up and increase upstream flooding in nearby rivers, which can damage port infrastructure and alter navigation channels, or lower the clearance under waterway bridges.</li>
               <li>Drought can reduce shipping navigability due to lower water levels in navigable rivers.</li>
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