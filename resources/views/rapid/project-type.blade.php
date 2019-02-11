<?php
if(Session::get('project')->tool_id == 1){
    $physicalText = '<ul>
                        <li><strong>Physical infrastructure, assets, goods and works </strong> related to irrigation & drainage, crops and land management, livestock, rural transport and storage and processing including rehabilitation of existing items and construction of new ones.</li>
                        <li><strong>Soft components</strong> related to policy development, long-term strategic planning, capacity building, training and outreach, information management systems, awareness raising, institutional strengthening, etc.</li>
                    </ul>';
    $sofText = '<strong>Soft components</strong> related to policy development, long-term strategic planning, capacity building, training and outreach, information management systems, awareness raising, institutional strengthening, etc.';
}
elseif(Session::get('project')->tool_id == 2){
    $physicalText = '<ul>
                        <li><strong>Physical infrastructure, assets, goods and works</strong> related to land use and watershed management, dams and reservoirs, water supply, wastewater, sanitation, and riverine flood protection including rehabilitation of existing items and construction of new ones.</li>
                        <li><strong>Soft components</strong> related to policy development, long-term strategic planning, capacity building, training and outreach, information management systems, awareness raising, institutional strengthening, etc.</li>
                    </ul>';
    $sofText = '<strong>Soft components</strong> related to policy development, long-term strategic planning, capacity building, training and outreach, information management systems, awareness raising, institutional strengthening, etc.';
}
elseif(Session::get('project')->tool_id == 3){
    $physicalText = '<ul>
                        <li><strong>Physical infrastructure, assets, goods and works</strong> related to oil, gas and coal mining, thermal power generation, hydropower, other renewable energy, transmission & distribution and energy efficiency in heat & power including rehabilitation of existing items and construction of new ones</li>
                        <li><strong>Soft components</strong> related to energy laws, regulations, policy analysis and development, feasibility, design studies, institutional strengthening/training/knowledge exchange, strategic energy system planning, data gathering, monitoring and information management systems, operations support, capacity building, technical assistance and outreach.</li>
                    </ul>';
    $sofText = '<strong>Soft components</strong> related to energy laws, regulations, policy analysis and development, feasibility, design studies, institutional strengthening/training/knowledge exchange, strategic energy system planning, data gathering, monitoring and information management systems, operations support, capacity building, technical assistance and outreach, etc.';
}
elseif(Session::get('project')->tool_id == 4){
    $physicalText = '<ul>
                        <li><strong>Physical infrastructure, assets, goods and works</strong> related to:<br><ul><li><b>Biodiversity conservation</b> including support to protected areas, integration of biodiversity conservation into production landscapes, design of sustainable financing schemes to promote nature tourism, fighting wildlife crime, addressing the challenge of invasive species, priority actions for grasslands and meadow conservation, habitat restoration, conservation of native plant species, stabilization of endangered populations, pilot projects to reduce conflicts between humans and wildlife, and preservation of wetland habitats.</li>
                        <li><b>Coastal flood protection</b> including built infrastructure which includes man-made coastal defense barriers that keep water from entering and flooding an area and other physical investments, such as hydro-meteorological gauges and monitoring system, and any project investments to protect, reinforce, or mimic natural coastal ecosystem features. Built infrastructure can involve the construction and rehabilitation of revetments, sea walls, detached breakwaters, groins, tide gates, pumping and drainage systems, fences, tide gauges and other hydro-meteorological observation systems, drainage systems, and rip-rap. Coastal ecosystem features can include beaches, sand dunes, barrier islands, spits, cliffs, wetlands, mangroves, marshes, mudflats, seagrass, coral reefs, estuaries, deltas, and measures can include beach nourishment, wetland or marsh restoration, reforestation or re-vegetation, preservation or reforestation of mangroves, and the construction or preservation of coral reefs.</li><li><b>Fisheries</b> including marine and freshwater fisheries and aquaculture. </li>
                        <li><b>Forestry</b> including caring for and cultivating forests, management of timber production, afforestation, reforestation, and improvement of forest management, logging and related service activities, developing timber forests and management of non-timber forest products.</li></ul></li><li><strong>Soft components </strong>related to policy development, long-term strategic planning, capacity building, training and outreach, information management systems, awareness raising, and institutional strengthening, among others.</li>
                    </ul>';
    $sofText = '<strong>Soft components only</strong><br>Soft components related to policy development, long-term strategic planning, capacity building, training and outreach, information management systems, awareness raising, and institutional strengthening, among others.';
}
elseif(Session::get('project')->tool_id == 5){
    $physicalText = '<ul>
                        <li><strong>Physical infrastructure, assets, goods and works </strong> related to roads, multi-modal and transit systems, rail, aviation, marine transportation, and river transportation.</li>
                        <li><strong>Soft components</strong> related to policy development, long-term strategic planning, capacity building, training and outreach, information management systems, awareness raising, institutional strengthening, etc.</li>
                    </ul>';
    $sofText = '<strong>Soft components</strong> related to policy development, long-term strategic planning, capacity building, training and outreach, information management systems, awareness raising, institutional strengthening, etc.';
}else{
    $physicalText = $sofText = '';
}
?>
@extends('layouts.app')
@section('styles')
<link href="{{ asset('../assets/styles/tooltipster.bundle.min.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/styles/style.css') }}" rel="stylesheet">
@endsection
@section('content')
<div id="top-container">
   <div class="main-container container">
      <div class="row">
         <section class="col-sm-12">
            <h1 class="page-header">
               Select Project Type
               <div class="dt_top_btn"><a href="@if($rapidData->component_type) {{ route('rapid.dashboard',$project_id) }} @else {{ route('home') }} @endif">Back to Screening Dashboard</a></div>
            </h1>
            <div class="Content">
               <div class="">
                  <div class="contentDiv">
                     <form id="projectTypeForm" method="POST" action="{{ route('rapid.projectType.update', $rapidData->id) }}">
                        {{ csrf_field() }}  
                        <div>
                           <div class="form-type-radios form-item-comp-type form-item form-group">
                              <label for="edit-comp-type">What types of components does your project include? <span class="form-required" title="This field is required.">*</span></label>
                              <div id="edit-comp-type" class="form-radios">
                                 <div class="form-type-radio form-item-comp-type form-item radio">
                                    <input type="radio" id="edit-comp-type-physical" name="component_type" value="physical" checked="checked" class="form-radio">  <label for="edit-comp-type-physical">Physical Infrastructure and Soft Components <img src="../assets/images/tooltip_i.png" class="tooltip_matrix tooltipstered" data-tooltip-content="#physical_radio_tooltip-1"></label>
                                    <div class="tooltip_templates" style="display: none;">
                                       <span id="physical_radio_tooltip-1"> {!! $physicalText !!} </span>
                                       {{-- <span id="soft_radio_tooltip-2"> {!! $sofText !!} </span> --}}
                                    </div>
                                 </div>
                                 <div class="form-type-radio form-item-comp-type form-item radio">
                                    <input type="radio" id="edit-comp-type-soft" name="component_type" value="soft" class="form-radio" @if($rapidData->component_type == 'soft') checked @endif>  <label for="edit-comp-type-soft">Soft Components only <img src="../assets/images/tooltip_i.png" class="tooltip_matrix tooltipstered" data-tooltip-content="#soft_radio_tooltip-2"></label>
                                    <div class="tooltip_templates" style="display: none;">
                                       <span id="soft_radio_tooltip-2">{!! $sofText !!}</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="transportation_dt_edit_desc">
                              <p>By selecting "Soft components only" you will skip the "Impacts" step of the Rapid Screening Assessment, which includes evaluation of potential impacts on physical infrastructure and assets of a project. You will go through the "Exposure" followed by the "Adaptive Capacity" and "Outcome/Service Delivery" steps.</p>
                           </div>
                           <input type="hidden" name="project_id" value="{{ $project_id }}">
                           <div class="saveBtnBlock">
                              <button type="submit" class="SaveBtn">Save</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
</div>
@endsection
@section('scripts')
@endsection