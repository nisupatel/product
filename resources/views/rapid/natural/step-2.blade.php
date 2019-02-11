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
         <p class="step_desc">Infrastructure and physical assets in natural resources projects can be impacted by climate and geophysical hazards in a variety of ways. For instance, flooding and storms can damage fishery and aquaculture infrastructure and equipment, while changes in temperature and precipitation can shift the geographic range of species important to the forestry sector. For more examples click on the <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step2-info-icon"> for each subsector.</p>
         <form class="cpf-custom-dt" id="step2PhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}  
            <div>
               <div class="form-type-checkboxes form-item-dt-step2-impacts form-item form-group">
                  <label for="edit-dt-step2-impacts">a. Select the subsectors that pertain to your project.  </label>
                  <div id="edit-dt-step2-impacts" class="form-checkboxes">
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Irrigation-&amp;-Drainage form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-biodiversity" name="impact_sectors[]" value="Biodiversity" class="form-checkbox" @if(in_array("Biodiversity", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-biodiversity">Biodiversity <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#biodiversity_tooltip"></label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-livestock form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-forestry" name="impact_sectors[]" value="Forestry" class="form-checkbox" @if(in_array("Forestry", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-forestry">Forestry <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#forestry_precipitation_tooltip"> </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Storage-and-Processing form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-fisheries" name="impact_sectors[]" value="Fisheries / aquaculture" class="form-checkbox" @if(in_array("Fisheries / aquaculture", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-fisheries">Fisheries / aquaculture <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#fisheries_tooltip"> </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Crops-and-land-management form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-coastal" name="impact_sectors[]" value="Coastal Flood Protection" class="form-checkbox" @if(in_array("Coastal Flood Protection", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-coastal">Coastal Flood Protection <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#coastal_tooltip"> </label>
                     </div>
                     <input type="hidden" id="ss_limit" value="0">
                  </div>
               </div>
               <div class="step2_ques2">
                  <div class="step2head"><strong>b. Reflect on your project’s infrastructure and physical assets as currently designed under your selected subsectors.</strong></div>
                  <div class="step2head">
                     <ul style="padding-top: 6px;">
                        <li>Consider how climate and geophysical hazards directly or indirectly impact your project.</li>
                        <li>Consider whether the design takes into account recent trends and future projected changes in the hazards you have identified.</li>
                        <li>Consider how the structural integrity, materials, siting, longevity and overall effectiveness of your investments may be impacted.</li>
                        <li>Consider how future operation and maintenance costs may be affected.</li>
                        <li>Consider in particular, whether the design “locks in” certain decisions for the future.</li>        
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
                           <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step2-notes" name="impact_notes" cols="9" rows="7" placeholder='"Sample Text:

Biodiversity. In recent decades, dry conditions have reduced ecosystem productivity to some extent. There have been several episodes of drought, which have decreased crop yields and led more people to engage in illegal logging and poaching activities. Projections indicate an increase in average and extreme temperature and a decrease in average precipitation. There is likely to be an increase in the frequency, duration, and intensity of droughts. The level of potential impact is therefore rated as High.

Coastal Flood Protection – Built Infrastructure. In the past, heavy rainfall during the rainy season has eroded embankments along the coast. This history has been incorporated in the preliminary designs for the embankment structures to be built under this project. In addition, the design of the sea wall to be rehabilitated under this project is based on a previous feasibility study, which considered current high tides, future sea level rise and local subsidence, as well as storm surge. The height and width of the sea wall have been determined with sea level rise and storm surges in mind, making its sensitivity to these impacts low. For the embankment structures, future projections indicate that the proportion of rainfall that falls in heavy rains is likely to increase and that total annual precipitation is also likely to increase. Further, design decisions concerning this built infrastructure are long-lasting and costly to modify. The embankment structures may therefore still be sensitive to impacts from heavy rains. The design of the sea wall has a built-in safety margin to account for sea level rise in the future, so its sensitivity to sea level rise is low. Because of the remaining sensitivity of the embankment structures, the level of potential impact is rated as Moderate.

Coastal Flood Protection – Coastal Ecosystems. The location has low exposure to extreme precipitation and riverine flooding, and the mangrove ecosystems along the coast may benefit from increased rainfall. However, heavier downpours may slightly increase erosion. In addition, increasing sea level rise in future decades will increase impact on mangrove ecosystems. These ecosystems have also experienced some damage from salinity due to storm surges and from high winds due to hurricanes, which may intensify in the future. Because of the severity of potential impacts from sea level rise, storm surge and high winds, a High Potential Impact rating is selected.

Fisheries. In the past, heavy rainfall events have slightly increased nutrient runoff and modestly increased eutrophication. This was accompanied by warmer temperatures than average, which further reduced water quality. Fish yields were moderately reduced as a result. Projections indicate an increase in average and extreme temperature as well as potential increases in the frequency and intensity of extreme precipitation events. Because of projected changes in average and extreme temperature and precipitation, the level of potential impact is rated High.

Forestry. In the past, dry and hot conditions have led to wildfires. Drought has also weakened trees and made them susceptible to insect outbreaks, which have damaged large areas of the forest. Climate projections indicate an increase in average and extreme temperature and a decrease in average precipitation. Because dry and hot conditions are projected to increase, the level of potential impact is rated High."'>{{$decisionTree->impact_notes}}</textarea></div>
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
                    <strong>No / Low:</strong> Climate and geophysical hazards are not likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of project investments. <p style="padding: 5px 0 !important;color:#000 !important;"> For example:</p>
               <b>Biodiversity</b>
                    <ul>
                         <li>Sea level rise could affect mangrove ecosystems, but there are areas for mangroves to naturally migrate further inland. Anthropogenic drivers of ecosystem and biodiversity loss could slightly increase.</li>
                    </ul>
               <b>Coastal Flood Protection</b>
                    <ul>
                         <li>Minor erosion of embankments may occur on occasion, but structural integrity will not be affected.</li>
                         <li>Extreme high tides may damage levees. However, design measures are in place to counteract erosion from sea level rise, so the potential impact is reduced.</li>
                         <li>Embankments may be slightly eroded by storm surge and/or strong winds.</li>
                         <li>Runoff from heavy rainfalls may increase the contamination of estuaries.</li>
                         <li>Sea level rise may increase salt stress on wetland plants.</li>
                         <li>Strong winds may defoliate trees along the shoreline.</li>
                    </ul>
                 <b>Fisheries</b>
                    <ul>
                         <li>Warmer water temperatures could slightly affect water quality and cause minor reductions in fish yields. Anthropogenic drivers of damage to fishery resources may be slightly affected.</li>
                    </ul>
                  <b>Forestry</b>
                    <ul>
                         <li>Warmer temperatures may increase the length of the growing season, increasing tree growth rates and timber production in plantation forests that do not face major water constraints.</li>
                    </ul>
            Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.
                </span>
            
                <span id="moderate-exposer">
                    <strong>Moderate:</strong> Climate and geophysical hazards are likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of project investments. <p style="padding: 5px 0 !important; color:#000 !important;">For example:</p>
             <b>Biodiversity</b>
            <ul>
                 <li>The spread of invasive species could moderately increase, but an effort to remove invasive species could reduce their spread. Anthropogenic drivers of ecosystem and biodiversity loss could moderately increase.</li>
            </ul>
             <b>Coastal Flood Protection</b>
            <ul>
                 <li>Maintenance costs may increase slightly due to more frequent and extensive damage from extreme precipitation and/or storm surge. </li> 
                 <li>Breakwaters may be somewhat less effective due to increased frequency of overtopping.</li>
                 <li>Revetments may be damaged from wave impacts.</li>
                 <li>Extreme precipitation and riverine flooding may destroy coastal vegetation and trees.</li>
                 <li>Sea level rise and/or strong winds may somewhat increase erosion of beaches and sand dunes.</li>
            </ul>
             <b>Fisheries</b>
            <ul>
                 <li>Flooding from heavy rainfall events or storm surge may moderately damage aquaculture stock and infrastructure without wiping out the entire investment. Anthropogenic drivers of damage to fishery resources may be moderately affected.</li>
            </ul>
             <b>Forestry</b>
            <ul>
                 <li>Lower water availability could affect tree growth without leading to increased wildfire risk. Anthropogenic drivers of damage to forest ecosystems could moderately increase.</li>
            </ul>
            Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future
            
             
                </span>
                <span id="high-exposer">
                    <strong>High:</strong> Climate and geophysical hazards are likely to significantly impact the structural integrity, materials, siting, longevity and overall effectiveness of project investments. <p style="padding: 5px 0 !important;color:#000 !important;">For example:</p> <b>Biodiversity</b>
            <ul>
                 <li>Warmer ocean temperatures and increased ocean acidity could lead to total loss of coral reef ecosystems. Anthropogenic drivers of ecosystem and biodiversity loss could significantly increase.</li>
            </ul>
             <b>Coastal Flood Protection</b>
            <ul>
                 <li>Riverine flooding is likely to weaken the structural integrity of engineered flood defenses.</li>
                 <li>High tides exacerbated by sea level rise may overtop built infrastructure, leading to inundation.</li>
                 <li>Storm surge may breach embankments, inundating nearby communities.</li>
                 <li>Winds from tropical cyclones are likely to threaten the structural integrity of engineered defenses.</li>
                 <li>Extreme precipitation and riverine flooding may extensively erode beaches in the project location.</li>
                 <li>Sea level rise may submerge existing barrier islands.</li>
                 <li>Strong winds may uproot trees and cause extensive damage to mangroves.</li>
            </ul>
             <b>Fisheries</b>
            <ul>
                 <li>Sea level rise and storm surge could result in significant loss of coastal ecosystems, such as mangroves and salt marshes on which many fish and shellfish species depend and which may provide protection to coastal aquaculture facilities. Anthropogenic drivers of damage to fishery resources may be significantly affected.</li>
            </ul>
             <b>Forestry</b>
            <ul>
                 <li>Higher temperatures could exacerbate insect outbreaks and increase wildfire frequency and intensity, which could damage or destroy large areas of forest. Anthropogenic drivers of damage to forest ecosystems could significantly increase.</li>
            </ul>
            Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.
            
                </span>
                <span id="insufficient-exposer">
                    <strong>Insufficient Understanding:</strong> There is insufficient knowledge about the project or insufficient understanding of how to interpret information on climate and geophysical hazards to make a rating.
                </span>
            <span id="select-impact-dt-info-icon">
              You can mouseover each rating to see a description.
            </span>
            
            <span id="biodiversity_tooltip">
            Climate and geophysical hazards can affect ecosystems and reduce biodiversity directly or indirectly by increasing the anthropogenic drivers of ecosystem and biodiversity loss. Other examples include: 
            <ul>
            <li>Changes in temperature or precipitation can cause shifts in the geographic ranges of species. Species' ranges can shift outside protected areas, which can reduce their range and increase the risk of extinction for certain species. Such changes can also increase the spread of invasive species as well as the spread of pathogens, parasites, and diseases, with negative impacts on biodiversity. Impacts on a particular species can ripple through a food web and affect other organisms.</li>
            <li>Changes in temperature or precipitation can affect the relative timing of species life-cycle events. Such changes can upset existing species interactions, dependencies, and predator-prey interactions important for ecosystem function and services.</li>
            <li>Sea level rise can cause saltwater intrusion into freshwater systems, forcing some key species to relocate or suffer population loss.</li>
            <li>Storm surge and strong winds and waves can damage or destroy coastal ecosystems such as mangroves and salt marshes.</li>
            <li>Climate and other natural hazards can affect anthropogenic driver(s) of damage to ecosystems and biodiversity, such as deforestation and overfishing.</li>
            </ul>
            </span>
            
            <span id="forestry_precipitation_tooltip">
            Climate and geophysical hazards can directly damage forest ecosystems, reduce forest productivity, or disrupt forestry operations. Other examples include:
            <ul>
            <li>Warmer temperatures can increase the length of the growing season, which can increase tree growth rates and timber production in plantation forests where water is sufficient. By contrast, drought or flooding from extreme precipitation can damage or destroy forests.</li>
            <li>Higher temperatures can increase the extent, intensity, and frequency of insect outbreaks and increase the spread of invasive plants. Dry and hot conditions can increase wildfire risks.
            </li><li>Drought can weaken trees and make the forest more susceptible to insect outbreaks or wildfires.</li>
            <li>Some forest types are especially sensitive to climate change impacts. For example, plantation forests with low species diversity are more vulnerable to changes in climatic conditions than natural forests.
            </li><li>Extreme climate or geophysical events can affect the transportation of forest products to market.</li>
            <li>Climate and other natural hazards can affect anthropogenic drivers of forest damage and destruction, such as deforestation or overexploitation of non-timber-forest products. For example, drought can reduce agricultural productivity and force more people to engage in illegal logging to make up for the income loss.</li>
            </ul>
            </span>
            
            <span id="fisheries_tooltip">
            Changing climatic conditions can affect the fisheries sector in a variety of ways, with direct impacts on the health of aquatic ecosystems and on the distribution, composition, and abundance of freshwater and marine fish stocks. Reduced fish stocks in turn can impact food security. Climate change is projected to affect freshwater fisheries through changes in water temperature, nutrient levels, and lower dry-season water levels. Other examples include:
            <ul>
            <li>Reduced water quality induced by warmer inland water temperatures can increase the range and abundance of predators and pathogens, and introduce invasive species, which can reduce wild fish stocks and affect seed availability for aquaculture.</li>
            <li>Warmer sea surface temperatures and increased ocean acidity can lead to coral loss and bleaching, which can affect reef fisheries. They can also increase harmful algal blooms, impacting the health of consumers.</li>
            <li>Low water levels in lakes and rivers can alter the distribution, composition, and abundance of fish stocks. Drought can result in loss of wild and cultured stock and increase the production costs of aquaculture.</li>
            <li>Sea level rise can make fisheries in deltas, coral atolls, and ice-dominated coasts more vulnerable to flooding and coastal erosion.</li> 
            <li>Climate and other natural hazards can affect anthropogenic drivers of damage to fishery resources such as overfishing and damming of rivers. For example, climate change can lead to an increase in the damming of rivers to meet rising water and energy needs, but increased damming, in turn, can harm fisheries.</li>
            </ul>
            </span>
            
            <span id="coastal_tooltip">
            Climate and geophysical hazards can impact the operation of coastal infrastructure and ecosystem defenses. Examples include:
            <ul>
            <li><b>Built infrastructure – </b>temperature and precipitation can affect the integrity of soil that supports flood defense infrastructure, or the materials used to construct that infrastructure. In addition, scouring, sedimentation, and erosion due to flooding and heavy precipitation can damage infrastructure. Disruptions can lead to more frequent and costly maintenance such as dredging. Sea level rise can result in permanent inundation of assets, such as embankments or lead to land subsidence or uplift. Strong storm surges can overpower and damage structures that do not consider the potential changes in storm surge strength in their design. Geophysical hazards (such as earthquakes, tsunamis, volcanic eruptions and landslides) can also affect built infrastructure and productive services. Earthquakes and tsunamis can damage and weaken coastal flood infrastructure such as processing plants, silos, levees and dams. Landslides can destroy coastal areas and infrastructure, including roads. Ash from volcanic eruptions can travel hundreds of miles downwind and can damage a wide range of coastal infrastructure near to and far from the active volcano site. Lava flows can cause fires and destruction of structures in its path, damaging or destroying coastal flood protection infrastructure.</li>
            <li><b>Beaches, barriers, and sand dunes</b> are prone to erosion and inundation from sea level rise and storms. Extreme storms can completely remove dunes. Storms can erode and narrow barrier islands. Strong winds can increase wave heights and strength, also causing coastal erosion or shifting of beaches and sand dunes. When eroding beaches meet hard structures such as sea walls or cliffs, “coastal squeeze” may occur, destroying habitats and causing dunes to disappear altogether. Coastal squeeze is expected to accelerate with rising sea level. Tsunamis can also destroy natural barriers.</li>
            <li><b>Coastal aquifers</b> are highly sensitive to climate hazards. Higher temperatures and changes in precipitation patterns can reduce aquifer recharge. Rising sea levels and storm surge can also affect coastal aquifers.</li>
            <li><b>Coral reefs </b>act as natural coastal defenses by dissipating wave energy. However, they are highly sensitive to changes in ocean temperature and acidity, which induce reef disintegration. Tropical cyclone activity also contributes to loss of coral reefs. Coral bleaching and mortality are projected to increase in future decades. Present threat levels from thermal stress and acidification to coral reefs at specific locations can be found in the Reefs at Risk report, in Maps 3.2 and 3.4.</li>
            <li><b>Estuaries and lagoons –</b> changes in sea level, precipitation and storms can affect sedimentation and erosion in coastal lagoons. Salinity may also fluctuate. As a result, the function and services of lagoon and estuary ecosystems may suffer.</li>
            <li><b>Rocky coasts –</b> sea level rise and storms will increase erosion of rocky coasts, but the extent of erosion depends on whether the shoreline is hard rock or unconsolidated soft rock. Both soft rock coasts and cliffs are prone to recede at faster rates due to sea level rise. In addition, ocean warming and acidification affect the biodiversity of rocky shores, leading to changes in species distribution and abundance.</li>
            <li><b>Wetlands, seagrass beds, mangroves –</b> vegetated coastal habitats provide critical protection on shorelines, but they are declining globally due to increased sea level rise and wave action. The loss of these habitats leaves shorelines more vulnerable to erosion. In addition, ocean warming is leading to shifts in the range of vegetated coastal habitats. For example, mangrove forests have been migrating toward the poles. Seagrass meadows and kelp forests are also degrading under higher air temperatures and ocean warming. In addition, extreme precipitation and riverine flooding can destroy marshlands and wetland natural habitats, while strong winds can uproot or defoliate mangroves.</li>
            <li><b>Deltas</b> are strongly affected by river floods and storm surge. Tropical cyclones cause significant damage to deltas. Both extreme precipitation and sea level rise are projected to increase the flooding of deltas in future decades.</li>
            </ul>
            </span>
            </div>
      </div>
   </div>
</div>
</div>
@endsection
@section('scripts')
@endsection