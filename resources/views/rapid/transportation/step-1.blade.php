@extends('layouts.app')
@section('styles')
<link href="{{ asset('../assets/styles/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/styles/tooltipster.bundle.min.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/styles/style.css') }}" rel="stylesheet">
@endsection
@section('content')
<?php
$cckplink = implode(', ', $cckpLinks);
?>
<div id="top-container">
   <div class="main-container container">
      <section class="col-sm-12 p-0">
         @if('physical' == $decisionTree->component_type)
         <h1 class="page-header">Project Type: Physical infrastructure and soft components</h1>
         @else
         <h1 class="page-header">Project Type: Soft components only</h1>
         @endif
         <h3 class="dt_top_title dt_first">
            Step 1: Exposure of the Project Location
            <div class="dt_top_btn"><a href="{{ route('rapid.dashboard',$project_id) }}">Back to Screening Dashboard</a></div>
         </h3>
         <div class="Content mt10">
            <div class="">
               <div class="contentDiv">
                  <p class="step_desc">
                  @if('physical' == $decisionTree->component_type)
                  Transportation sector projects can be exposed to several climate geophysical hazards. For instance, extreme temperatures have a variety of effects on the performance and durability of transport infrastructure depending on the level of temperature and the duration of the event. Furthermore, prolonged extreme temperatures may also affect the human operation and maintenance of roadways, railways, and runways. Click here for more examples.
                     <img src="{{ asset('assets/images/tooltip_i.png') }}" class="tooltip_dt tooltipstered" data-tooltip-content="#step1-info-icon" style="padding: 5px;"> 
                  @else
                  Transportation sector projects can be exposed to several climate geophysical hazards. For instance, extreme temperatures have a variety of effects on transport infrastructure depending on the magnitude of the temperature and the duration of the event. Extreme temperatures can affect the performance and durability of the physical components of the transport infrastructure (e.g., asphalt) themselves. Furthermore, prolonged extreme temperatures may also affect the human operation and maintenance of roadways, railways, and runways.
                     <img src="{{ asset('assets/images/tooltip_i.png') }}" class="tooltip_dt tooltipstered" data-tooltip-content="#step1-soft-info-icon" style="padding: 5px;"> 
                  @endif
                  </p>
                  <form class="cpf-custom-dt" id="step1PhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
                     {{ csrf_field() }}   
                     <div>
                        <div class="step1_ques1">
                           <div class="hazard-prefix">
                              <b>a. Select the climate and geophysical hazards that are likely to be relevant to your project location both now and in the future.</b>
                              <p style="margin-bottom: 0;padding: 10px 0 !important;">Visit the {!! ((count($cckpLinks) > 1) ? 'Climate Change Knowledge Portal '.$cckplink : $cckplink) !!}  for information on historical trends and future projections for climate and geophysical hazards for your project country.</p>
                              As you view the information, bear in mind the following guiding questions: 
                              <ul>
                                 <li>What have been the historical trends in temperature, precipitation and drought conditions?</li>
                                 <li>How are these trends projected to change in the future in terms of intensity, frequency and duration?</li>
                                 <li>Has the location experienced strong winds and/or geophysical hazards in the past that may occur again in the future?</li>
                                 <li>Will the location be exposed to sea level rise and storm surge in the future?</li>
                              </ul>
                           </div>
                           <div id="edit-dt-step1-hazards" class="form-checkboxes">
                              <div class="form-type-checkbox form-item-dt-step1-hazards-Extreme-Temperature form-item checkbox">
                                 <input type="checkbox" id="edit-dt-step1-hazards-extreme-temperature" name="exposure_types[]" value="Extreme Temperature" class="form-checkbox"  @if(in_array("Extreme Temperature", $decisionTree->exposure_types)) checked @endif>  <label for="edit-dt-step1-hazards-extreme-temperature">Extreme Temperature <img src="{{ asset('assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#extreme_temperature_tooltip"></label>
                              </div>
                              <div class="form-type-checkbox form-item-dt-step1-hazards-Extreme-Precipitation-and-Flooding form-item checkbox">
                                 <input type="checkbox" id="edit-dt-step1-hazards-extreme-precipitation-and-flooding" name="exposure_types[]" value="Extreme Precipitation and Flooding" class="form-checkbox" @if(in_array("Extreme Precipitation and Flooding", $decisionTree->exposure_types)) checked @endif>  <label for="edit-dt-step1-hazards-extreme-precipitation-and-flooding">Extreme Precipitation and Flooding <img src="{{ asset('assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#extreme_precipitation_tooltip"></label>
                              </div>
                              <div class="form-type-checkbox form-item-dt-step1-hazards-Drought form-item checkbox">
                                 <input type="checkbox" id="edit-dt-step1-hazards-drought" name="exposure_types[]" value="Drought" class="form-checkbox" @if(in_array("Drought", $decisionTree->exposure_types)) checked @endif>  <label for="edit-dt-step1-hazards-drought" >Drought <img src="{{ asset('assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#drought_tooltip"></label>
                              </div>
                              <div class="form-type-checkbox form-item-dt-step1-hazards-Storm-Surge form-item checkbox">
                                 <input type="checkbox" id="edit-dt-step1-hazards-storm-surge" name="exposure_types[]" value="Storm Surge" class="form-checkbox" @if(in_array("Storm Surge", $decisionTree->exposure_types)) checked @endif>  <label for="edit-dt-step1-hazards-storm-surge">Storm Surge <img src="{{ asset('assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#storm_surge_tooltip"></label>
                              </div>
                              <div class="form-type-checkbox form-item-dt-step1-hazards-Strong-Winds form-item checkbox">
                                 <input type="checkbox" id="edit-dt-step1-hazards-strong-winds" name="exposure_types[]" value="Strong Winds" class="form-checkbox" @if(in_array("Strong Winds", $decisionTree->exposure_types)) checked @endif>  <label for="edit-dt-step1-hazards-strong-winds">Strong Winds <img src="{{ asset('assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#strong_winds_tooltip"></label>
                              </div>
                              <div class="form-type-checkbox form-item-dt-step1-hazards-Sea-Level-Rise form-item checkbox">
                                 <input type="checkbox" id="edit-dt-step1-hazards-sea-level-rise" name="exposure_types[]" value="Sea Level Rise" class="form-checkbox" @if(in_array("Sea Level Rise", $decisionTree->exposure_types)) checked @endif>  <label for="edit-dt-step1-hazards-sea-level-rise">Sea Level Rise <img src="{{ asset('assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#sea_level_rise_tooltip"></label>
                              </div>
                              <div class="form-type-checkbox form-item-dt-step1-hazards-Geophysical-Hazards form-item checkbox">
                                 <input type="checkbox" id="edit-dt-step1-hazards-geophysical-hazards" name="exposure_types[]" value="Geophysical Hazards" class="form-checkbox" @if(in_array("Geophysical Hazards", $decisionTree->exposure_types)) checked @endif>  <label for="edit-dt-step1-hazards-geophysical-hazards">Geophysical Hazards <img src="{{ asset('assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#geophysical_hazards_tooltip"></label>
                              </div>
                              <div class="tooltip_templates" style="display: none;">
                                 <span id="extreme_temperature_tooltip"><b>Extreme Temperature:</b> This hazard includes changes in average temperatures as well as extreme events, such as heat waves and cold snaps.</span>
                                 <span id="extreme_precipitation_tooltip"><b>Extreme Precipitation and Flooding:</b> This hazard includes changes in average precipitation, changes in rainfall seasonality, and intense rainfall events.</span>
                                 <span id="drought_tooltip"><b>Drought: </b>Drought refers to extended periods of abnormally low rainfall. Drought may occur in any climatic zone.</span>
                                 <span id="sea_level_rise_tooltip"><b>Sea Level Rise:</b> Sea level rise is only applicable to projects near the coast.</span>
                                 <span id="storm_surge_tooltip"><b>Storm Surge:</b> Storm surge refers to a temporary rise in sea level due to the passage of a storm. Storm surges originate on the coast but may travel many miles inland.</span>
                                 <span id="strong_winds_tooltip"><b>Strong Winds:</b> This hazard includes high-speed winds from any source, including tropical cyclones, thunderstorms, tornadoes, and dust storms.</span>
                                 <span id="geophysical_hazards_tooltip"><b>Geophysical Hazards:</b> Earthquakes, tsunamis, landslides, or volcanic eruptions.</span>
                              </div>
                           </div>
                           <div class="hazard-suffix">
                              You may also visit:
                              <ul>
                                 <li><a href="http://thinkhazard.org/" target="_blank">ThinkHazard!</a>  for more detailed information on cyclones, river and coastal floods, and geophysical hazards.</li>
                              </ul>
                           </div>
                        </div>
                        <div class="notes_rating_wrapper">
                           <div class="step1_ques2">
                              <p><b>b. Rate the extent of your project location's exposure to these hazards as an aggregate.</b> Please note: If your project location is highly exposed to even one hazard either in the present or in the future, then select the High rating. Also select a High rating if exposure is low/moderate in the present but is projected to become High in the future.</p>
                           </div>
                           <div class="dt_rating_container">
                              <div class="dt_rating_left">
                                 <div class="form-type-select form-item-dt-step1-rating form-item form-group">
                                    <label for="edit-dt-step1-rating">Select Exposure Rating:&nbsp;&nbsp;&nbsp;<img src="{{ asset('assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#select-exposure-dt-info-icon"> </label>
                                    <select class="form-control form-select" id="edit-dt-step1-rating" name="exposure_rating">
                                    <option value="0" @if('NULL' == $decisionTree->exposure_rating) selected @endif>Please select rating</option>
                                    <option value="1" @if('1' == $decisionTree->exposure_rating) selected @endif>Insufficient Understanding</option>
                                    <option value="2" @if('2' == $decisionTree->exposure_rating) selected @endif>No / Low</option>
                                    <option value="4" @if('4' == $decisionTree->exposure_rating) selected @endif>Moderate</option>
                                    <option value="5" @if('5' == $decisionTree->exposure_rating) selected @endif>High</option>
                                    </select>
                                 </div>
                                 <div class="rating_dropdown_suffix">
                                    <ul class="dt_rating_button">
                                       <li id="dt_rating_high" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#high-exposer">High</li>
                                       <li id="dt_rating_moderate" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#moderate-exposer">Moderate</li>
                                       <li id="dt_rating_not_exposed" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#no-low-exposer">No / Low</li>
                                       <li id="dt_rating_insufficient" class="dt_rating_button_item last tooltip_matrix tooltipstered" data-tooltip-content="#insufficient-exposer">Insufficient Understanding</li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="dt_rating_right">
                                 <div class="form-type-textarea form-item-dt-step1-notes form-item form-group">
                                    <label for="edit-dt-step1-notes">You can capture your analysis here.  </label>
                                    <div class="form-textarea-wrapper">
                                       <textarea class="form-control form-textarea" id="edit-dt-step1-notes" name="exposure_notes" cols="9" rows="7" 
                                       placeholder="Sample Text: Mean annual temperature in the project location is projected to increase by 1℃ by 2050 with similar projected rate of warming for all seasons. A temperature rise of 1C is projected to increase the number of heatwaves by 100 to 180%, while the number of cold surges would decrease by 20 to 40%. Substantial increase is expected in the frequency of days and nights that are considered “hot” under current climate and decrease in the number of days and nights considered “cold” under current climate. Projected increase in inter-annual rainfall variability is likely to exacerbate drought risk in the future. Projected increases in seasonal rainfall, total runoff, and the proportion of rainfall in heavy events will have profound implications for flooding. The risk is rated as High since projections clearly indicate an increase in extreme temperature and precipitation as well as intensified droughts in future decades.">{{$decisionTree->exposure_notes}}</textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="saveBtnBlock">
                           <button type="submit" class="SaveBtn" id="step1PhysicalSubmit">Save</button>
                        </div>
                     </div>
                  </form>
                  <!--Tooltip content-->
                  <div class="tooltip_templates" style="display: none;">
                     <span id="no-low-exposer">
                     <strong>No / Low:</strong> The project location has not experienced climate and geophysical hazards in the past and there is no indication that these may become more intense or more frequent in the future. Remember, if your project location is highly exposed to even one hazard either in the present or in the future, then select the High rating. Also select a High rating if exposure is low/moderate in the present but is projected to become High in the future. 
                     </span>
                     <span id="moderate-exposer">
                     <strong>Moderate:</strong> The project location has experienced climate and geophysical hazards in the past and is expected to experience these in the future with moderate intensity, frequency, or duration. Remember, if your project location is highly exposed to even one hazard either in the present or in the future, then select the High rating. Also select a High rating if exposure is low/moderate in the present but is projected to become High in the future. 
                     </span>
                     <span id="high-exposer">
                     <strong>High:</strong> The project location has experienced climate and geophysical hazards in the past and is expected to experience these in the future with high intensity, frequency, or duration. Remember, if your project location is highly exposed to even one hazard either in the present or in the future, then select the High rating. Also select a High rating if exposure is low/moderate in the present but is projected to become High in the future. 
                     </span>
                     <span id="insufficient-exposer">
                     <strong>Insufficient Understanding:</strong> There is insufficient knowledge about the project or insufficient understanding of how to interpret information on climate and geophysical hazards to make a rating.
                     </span>
                     <span id="step1-info-icon">
                         <ul>
                           <li><strong>Extreme temperatures</strong> can impact some types of pavement binder and can cause buckling of railway tracks, airport runways, paved surfaces, and access roads. There is also an employee health and safety risk possible above 30°C and a high risk above 40°C.</li>
                           <li><strong>Extreme precipitation and flooding</strong> can affect the performance, durability and accessibility of transport infrastructure, resulting in temporary or permanent suspension of transport services. Significant or regular flooding can prevent access to roads by motorists or maintenance crews and damage railway tracks, bus ways, bridges, airport runways and parked aircraft, lots, electrical equipment, or other facilities or assets.</li>
                           <li><strong>Droughts</strong> can affect river transportation by causing low water levels that decrease cargo limits, restrict ship navigability and berthing, and potentially require additional dredging.</li>
                           <li><strong>Sea level rise, storm surge and high winds</strong> can cause coastal flooding that takes transport infrastructure out of service temporarily or permanently or affect its durability. One threshold is when storm surge nears the low-chord elevation of bridges. Storm surges also pose risks to tunnels and drainage systems by overwhelming them with water and storm debris.</li>
                           <li><strong>Strong winds</strong> can destroy road signage, cause damage to transit structures, disrupt power lines, and stress bridges if the winds are sufficiently strong or frequent.</li>
                           <li><strong>Geophysical hazards,</strong> including seismic activity, landslides, volcanic eruptions, and tsunamis, can destroy road infrastructure entirely if they are significant in magnitude. Smaller-scale geophysical events still have the potential to cause extensive damage to transport infrastructure depending on its location and the physical components chosen.</li>
                         </ul>
                     </span>
                     <span id="step1-soft-info-icon">
                         <ul>
                           <li><strong>Extreme temperatures</strong> can significantly reduce operational capacity of transport mode due to impacts on both the infrastructure and vehicle operation</li>
                           <li><strong>Extreme precipitation and flooding</strong> can damage the transport infrastructure and drainage systems, resulting in temporary or permanent suspension of transport services</li>
                           <li><strong>Sea level rise, storm surge and high winds</strong> can affect the durability of transport infrastructure, and in extreme cases, can wash away roads and rail bridges</li>
                           <li><strong>Geophysical hazards</strong> such as earthquakes, tsunamis, volcanic eruptions, and landslides can cause physical damage to transport infrastructure</li>
                         </ul>
                     </span>
                     <span id="select-exposure-dt-info-icon">
                        <p>You can mouseover each rating to see a description.</p>
                     </span>
                     <span id="step1-sample-text-dt-info-icon">
                     Mean annual temperature in the project location is projected to increase by 1℃ by 2050 with similar projected rate of warming for all seasons. A temperature rise of 1C is projected to increase the number of heatwaves by 100 to 180%, while the number of cold surges would decrease by 20 to 40%. Substantial increase is expected in the frequency of days and nights that are considered “hot” under current climate and decrease in the number of days and nights considered “cold” under current climate. Projected increase in inter-annual rainfall variability is likely to exacerbate drought risk in the future. Projected increases in seasonal rainfall, total runoff, and the proportion of rainfall in heavy events will have profound implications for flooding. The risk is rated as High since projections clearly indicate an increase in extreme temperature and precipitation as well as intensified droughts in future decades.
                     </span>
                  </div>
               </div>
            </div>
         </div>
   </div>

   </section>
</div>
</div>
@endsection
@section('scripts')
@endsection