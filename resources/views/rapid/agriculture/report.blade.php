<?php
   $exposure_table_text = array('1' => 'There is insufficient knowledge about the project or  insufficient understanding of how to interpret information on climate and geophysical hazards to make a rating.', '2' => 'The project location has not experienced climate and geophysical hazards in the past and there is no indication that these may become more intense or more frequent in the future', '4' => 'The project location has experienced climate and geophysical hazards in the past and is expected to experience these in the future with moderate intensity, frequency, or duration.', '5' => 'The project location has experienced climate and geophysical hazards in the past and is expected to experience these in the future with high intensity, frequency, or duration');
   $impact_table_text = array('1' => 'There is insufficient knowledge about the project or  insufficient understanding of how to interpret information on climate and natural hazards to make a rating.', '2' => 'Climate and geophysical hazards are not likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of your investments', '4' => 'Climate and geophysical hazards are likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of your investments.', '5' => 'Climate and geophysical hazards are likely to significantly impact the structural integrity, materials, siting, longevity and overall effectiveness of your investments');
   $gender_attention="";
   $risk_alleviate="";
   $softcom_rating="";
   $context_rating=""; 
   $softcom_type="";
?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
"http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd"> -->
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width">
   <title>Report - {{ $projectData->tool->name }} | Climate &amp; Disaster Risk Screening Tools</title>
   <!-- Styles -->
   <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
   <!-- <link href="{{ asset('assets/styles/bootstrap.css') }}" rel="stylesheet"> -->
   <!-- <link href="{{ asset('assets/styles/all.css') }}" rel="stylesheet"> -->
   <style>
      @font-face {
      font-family: 'Roboto';
      font-weight: normal;
      font-style: normal;
      font-variant: normal;
        src: url({{ asset('assets/fonts/Roboto-Regular.ttf') }})
      }
      @font-face {
      font-family: 'Roboto-Medium';
      font-weight: bold;
      font-style: normal;
      font-variant: normal;
        src: url({{ asset('assets/fonts/Roboto-Medium.ttf') }})
      }
      body {
      font-family: 'Roboto' !important;
      }
      ul.box {
      margin: 0;
      padding: 0;
      list-style: none;
      width: 100%;
      display: block;
      /*background: red;*/
      }
      ul.box li {
      padding: 7px;
      border: 1px solid #d3d3d3;
      font-size: 19px !important;
      vertical-align: top;
      margin-bottom: 10px;
      /*float: left;*/
      display: inline;
      margin-right: 10px;
      margin-top: 20px;
      }
      .header {
      background-color: #890101;
      border-color: #E7E7E7;
      border-radius: 0px;
      margin: 0 auto;
      width: 100%;
      }
      .header.header-second a {
      bottom: 3px;
      position: relative;
      color: white;
      }
   </style>
</head>
<body>
   <div class="">
      <div id="top-container">
         <div class="main-container container">
            <header role="banner" id="page-header">
               <div class="header header-second">
                  <span class="topbannertxt"><a href="#" style="font-family: 'Roboto';font-size: 30px !important;">Climate & Disaster Risk Screening Tools</a></span>                     
               </div>
            </header>
            <div class="row AddNewProject">
               <section class="col-sm-12">
                  <div class="reportdata">
                     <div class="sec-proj-info">
                        <div class="sec-proj-info-head" style="font-family: 'Roboto-Medium' !important; font-size: 35px; margin-top: 80px!important; margin-bottom: 15px; padding: 15px 10px 10px;text-align: center; color: #414141;"><strong>Climate and Disaster Risk Screening Report for {{ $projectData->name }} in {{ $projectData->country_name }}.</strong></div>
                        <div class="sec-proj-info-body">
                           <div style="text-align:center; padding-bottom: 5px; font-size: 20px; padding-top: 5px; color: #404040;font-family: 'Roboto-Medium' !important;"><b>Table 1: Project Information</b></div>
                           <div class="sec-proj-info-data">
                              <table align="center" style="font-size: 20px !important; width: 80% !important; page-break-inside:auto !important;font-family: 'Roboto' !important;" border="1">
                                 <tbody>
                                    @if (isset($projectData->name) && $projectData->name != "") 
                                    <tr>
                                       <th style="font-size: 13px; color: #222222!important;font-family: 'Roboto-Medium' !important; page-break-inside:auto !important;" width="40%">Project Title:</th>
                                       <td style="font-size: 13px; color: #404040!important;">{{ $projectData->name }}</td>
                                    </tr>
                                    @endif
                                    @if (isset($projectData->project_number) && $projectData->project_number != "") 
                                    <tr>
                                       <th style="font-size: 13px; color: #222222!important;font-family: 'Roboto-Medium' !important;">Project Number:</th>
                                       <td style="font-size: 13px; color: #404040!important;">{{ $projectData->project_number }}</td>
                                    </tr>
                                    @endif
                                    @if (isset($projectData->assessment_completed_by) && $projectData->assessment_completed_by != "") 
                                    <tr>
                                       <th style="font-size: 13px; color: #222222!important;font-family: 'Roboto-Medium' !important;">Assessment completed by:</th>
                                       <td style="font-size: 13px; color: #404040!important;">{{ $projectData->assessment_completed_by }}</td>
                                    </tr>
                                    @endif
                                    @if (isset($projectData->estimated_timeline_PCN_year) && $projectData->estimated_timeline_PCN_year != "") 
                                    <tr>
                                       <th style="font-size: 13px; color: #222222!important;font-family: 'Roboto-Medium' !important;">Estimated timeline for PCN 
                                          Year: 
                                       </th>
                                       <td style="font-size: 13px; color: #404040!important;">{{ $projectData->estimated_timeline_PCN_year }}</td>
                                    </tr>
                                    @endif
                                    @if (isset($projectData->estimated_timeline_PCN_quarter) && $projectData->estimated_timeline_PCN_quarter != "")
                                    <tr>
                                       <th style="font-size: 13px; color: #222222!important;font-family: 'Roboto-Medium' !important;">Estimated Timeline For PCN Quarter:</th>
                                       <td style="font-size: 13px; color: #404040!important;">{{  $projectData->estimated_timeline_PCN_quarter }}</td>
                                    </tr>
                                    @endif
                                    @if (isset($projectData->tool->name) && $projectData->tool->name != "")
                                    <tr>
                                       <th style="font-size: 13px; color: #222222!important;font-family: 'Roboto-Medium' !important;">Screening Tool Used:</th>
                                       <td style="font-size: 13px; color: #404040!important;">{{ $projectData->tool->name }}</td>
                                    </tr>
                                    @endif
                                 </tbody>
                              </table>
                           </div>
                           <div class="sec-proj-info-desc" style="margin-top: 40px; background-color: #f0f0f0; padding: 10px;">
                              <p style="background-color: #f0f0f0; font-size: 20px;">The Climate and Disaster Risk Screening Tool provides high-level screening to help consider short- and long-term climate and disaster risks at an early stage of project design. The tool applies an Exposure–Impact–Adaptive capacity framework to characterize risks (Annex 1). Potential risks are identified by connecting information on climate and geophysical hazards with users’ subject matter expertise of project components (both physical and non-physical) and understanding of the broader sector and development context. </p>
                              <p style="background-color: #f0f0f0; font-size: 20px; margin-top: 20px!important;">The tool does not provide a detailed risk analysis. Rather, it is intended to help inform the need for further consultations, dialogue with local and other experts and analytical work at the project location to strengthen resilience measures in the course of project design.</p>
                           </div>
                           <div class="pdf-footnotes" style="margin-top: 250px; font-size: 17px !important; color: #404040;">
                              <div style="width: 100% !important; height: 3px; border-top:1px solid #454545;"></div>
                              <sup style="font-size: 15px;">1</sup> This is the output report from applying the World Bank Group's Climate and Disaster Risk Screening Project Level Tool (Global website:climatescreeningtools.worldbank.org; World Bank users: wbclimatescreeningtools.worldbank.org). The findings, interpretations, and conclusions expressed from applying this tool are those of the individual that applied the tool and should be in no way attributed to the World Bank, to its affiliated institutions, to the Executive Directors of The World Bank or the governments they represent. The World Bank does not guarantee the accuracy of the information included in the screening and this associated output report and accepts no liability for any consequence of its use.
                           </div>
                        </div>
                     </div>
                     <div style="page-break-after: always;"></div>
                     <div class="sec-summery-results">
                        <div class="sec-sr-main-head" style="text-align: center;">
                           <h2 style="font-size:30px;color: #303030;font-family: 'Roboto-Medium' !important;">Summary Climate and Disaster Risk Screening Report</h2>
                        </div>
                        <div class="sec-sr-main-body">
                           @if (isset($projectData->rapid->exposure_rating) && $projectData->rapid->exposure_rating != "") 
                           <div class="report-summary-step1" style="background-color: #f0f0f0 !important; padding: 10px; border: 1px solid #c0c0c0;display: block; clear: both; color: #404040;">
                              <div style="font-size:23px;padding-left: 10px;padding-top: 5px; padding-right: 10px; padding-bottom: 10px; border: 1px solid #c0c0c0;background-color: #fff;">1. Exposure of the project location: <span style="font-size: 19px;">This step assesses the current and future exposure of the project location to relevant climate and geophysical hazards.</span></div>
                              <div style="width: 100%; display: block; font-size: 11px !important;padding-top:5px;padding-bottom:5px;margin-top:8px;">
                                 <div style="width: 18%; display: inline-block; vertical-align: top; border: 1px solid #c0c0c0; text-align: center !important;background-color: #fff;">
                                    <div style="margin-bottom: 5px;font-size: 19px !important; margin-top: 10px; text-align: center;font-family: 'Roboto-Medium' !important;"><b>Exposure Rating</b></div>
                                    <div class="report-summary-rating-box" style="background-color:{{ config('colors.colors')[$projectData->rapid->exposure_rating] }}; font-size: 18px !important; text-align: center; width: 80%; margin-left: 10px; padding: 10px; display: block; min-height: 42px; line-height: 1; margin: 0 auto; margin-bottom: 10px;"> {{ config('colors.colors_text')[$projectData->rapid->exposure_rating] }}</div>
                                 </div>
                                 <div style="width: 80%; display: inline-block; vertical-align: top; border: 1px solid #c0c0c0; padding: 5px;background-color: #fff; max-width: 80%;">
                                    @if (isset($decisionTree->exposure_types) && $decisionTree->exposure_types != "") 
                                    <div style="padding: 10px;" class="repory-summary-exposure-types">
                                       <b style="font-size: 19px !important;line-height: 1; margin-bottom: 10px;display: block;font-family: 'Roboto-Medium' !important;">Climate and geophysical hazards that are likely to be relevant to the project location both in present and in the future</b>
                                       <!-- <div style="clear: both;"></div> -->
                                       <div style="display: block;">
                                          <?php $countExp = count($decisionTree->exposure_types);?>
                                          <ul class="box">
                                             @foreach($decisionTree->exposure_types as $key => $value) 
                                             <!-- <span class="box" style="width: 100%;">{{ $value }}</span>   -->
                                             <li>{{ $value }}</li>
                                             <!-- <div style="clear: both;"></div>                              -->
                                             @endforeach
                                          </ul>
                                       </div>
                                       <div style="clear: both;"></div>
                                    </div>
                                    @endif
                                 </div>
                                 <div style="clear: both;"></div>
                              </div>
                           </div>
                           <div style="margin-top:10px;background-color: #fff;padding: 5px;width:100%;"></div>
                           @endif
                           @if($projectData->rapid->exposure_rating != 1 && $projectData->rapid->exposure_rating != 2) 
                             @if (isset($projectData->rapid->impact_rating) && $projectData->rapid->impact_rating != "") 
                             <div style="background-color: #f0f0f0 !important; padding: 10px; border: 1px solid #c0c0c0;display: block; clear: both; color: #404040;">
                               <div style="font-size:23px;padding-left: 10px;padding-top: 5px; padding-right: 10px; padding-bottom: 10px; border: 1px solid #c0c0c0;background-color: #fff;">2. Impacts on the project’s physical infrastructure and assets: <span style="font-size: 19px;">This step assesses the current and future impacts of identified climate and geophysical hazards on the project’s physical infrastructure and assets as currently designed.</span></div>
                               <div style="width: 100%; display: block; font-size: 19px !important;padding-top:5px;padding-bottom:5px;">
                                   <div style="width: 18%; display: inline-block; vertical-align: top; border: 1px solid #c0c0c0; text-align: center !important;background-color: #fff;">
                                     <div style="margin-bottom: 5px;font-size: 19px !important; margin-top: 10px; text-align: center;font-family: 'Roboto-Medium' !important;"><b>Impact Rating</b></div>
                                     <div class="report-summary-rating-box" style="background-color: {{ config('colors.colors')[$projectData->rapid->impact_rating] }} ; font-size: 18px !important; text-align: center; width: 80%; margin-left: 10px; padding: 10px; display: block; min-height: 42px; line-height: 1; margin: 0 auto; margin-bottom: 10px;">{{ config('colors.colors_text')[$projectData->rapid->impact_rating] }}</div>
                                   </div>
                                   <div style="width: 80%; display: inline-block; vertical-align: top; border: 1px solid #c0c0c0; padding: 5px;background-color: #fff; max-width: 80%;">
                                     <div style="padding: 10px;" class="repory-summary-exposure-types">
                                         <div style="font-size: 19px !important;line-height: 1; margin-bottom: 10px;display: block;font-family: 'Roboto-Medium' !important;"><b>Relevant project subsectors</b></div>
                                         <div style="display: block;">                                             
                                           <ul class="box">
                                               @foreach($decisionTree->impact_sectors as $key => $value) 
                                               <!-- <span class="box" style="width: 100%;">{{ $value }}</span>   -->
                                               <li>{{ $value }}</li>
                                               <!-- <div style="clear: both;"></div>                              -->
                                               @endforeach
                                           </ul>
                                         </div>
                                         <div style="clear: both;"></div>
                                     </div>
                                   </div>
                               </div>
                                 <div style="clear: both;"></div>
                             </div>
                             @endif
                           @endif
                        </div>
                        <div style="margin-top:10px;background-color: #fff;padding: 5px;width:100%;"></div>
                     </div>
                     <div style="clear: both;"></div>
                     @if($projectData->rapid->exposure_rating != 1 && $projectData->rapid->exposure_rating != 2)
                     @if (($projectData->rapid->component_type == "physical" && $projectData->rapid->impact_rating != 1) || $projectData->rapid->component_type == "soft")
                     <div style="background-color: #f0f0f0 !important; padding: 10px; border: 1px solid #c0c0c0; display: block; clear: both; color: #404040; margin-bottom: 10px;">
                        @if (isset($projectData->rapid->impact_rating) && $projectData->rapid->impact_rating != "") 
                        <div class="report-summary-step3" style="font-size:23px;padding-left: 10px;padding-top: 5px; padding-right: 10px; padding-bottom: 10px; border: 1px solid #c0c0c0;background-color: #fff;">
                           3. Modulating of risks by the project's soft components and development context: <span style="font-size: 19px;">This step assesses how the project’s soft components as currently designed, together with the project’s broader development context, modulate potential impacts from climate and geophysical hazards. This step also considers particularly vulnerable groups, namely women, migrants and displaced populations.</span>
                        </div>
                        @else
                        <div class="report-summary-step3" style="font-size:23px;padding-left: 10px;padding-top: 5px; padding-right: 10px; padding-bottom: 10px; border: 1px solid #c0c0c0;background-color: #fff;">
                           2. Modulating of risks by the project's soft components and development context: <span style="font-size: 19px;">This step assesses how the project’s soft components as currently designed, together with the project’s broader development context, modulate potential impacts from climate and geophysical hazards. This step also considers particularly vulnerable groups, namely women, migrants and displaced populations.</span>
                           <div style="clear: both;"></div>
                        </div>
                        @endif
                        <div style="clear: both;display: block;vertical-align: top; padding: 5px;width:100%;"></div>
                        <?php 
                           if (isset($projectData->rapid->softcom_rating) && $projectData->rapid->softcom_rating != "") {
                              if ($projectData->rapid->softcom_rating == "Increase Risk")
                                 $softcom_rating = '<div style="border: 1px solid #c0c0c0; padding: 10px; width: 200px;text-align:center;margin: 0 auto;"><img src="' . $icon_path .'up-arrow.png" title="Increase Risk" /><br>Increase Risk</div>';
                              elseif ($projectData->rapid->softcom_rating == "Reduce Risk")
                                 $softcom_rating = '<div style="border: 1px solid #c0c0c0; padding: 10px; width: 200px;text-align:center;margin: 0 auto;"><img src="' . $icon_path .'down-arrow.png" title="Reduce Risk" /><br />Reduce Risk</div>';
                           }
                           if (isset($projectData->rapid->softcom_types) && $projectData->rapid->softcom_types != "") {
                              
                              $softcom_type = '<div style="margin-top: 10px;">';
                              foreach($decisionTree->softcom_types as $value) {
                                 $softcom_type .= '<div style="width: 80%; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 10px; padding-right: 10px; border: 1px solid #c0c0c0; margin-bottom: 10px; margin-left: 10px;">'. $value . '</div>';
                              }
                              $softcom_type .= '</div>';
                           }
                           
                           if (isset($projectData->rapid->context_rating) && $projectData->rapid->context_rating != "") {
                           if ($projectData->rapid->context_rating == "Increases Risk")
                           $context_rating = '<div style="border: 1px solid #c0c0c0; padding: 10px; width: 200px;text-align:center;margin: 0 auto;"><img src="' . $icon_path .'up-arrow.png" title="Increases Risk" /><br />Increase Risk</div>';
                           elseif ($projectData->rapid->context_rating == "Reduce Risk")
                           $context_rating = '<div style="border: 1px solid #c0c0c0; padding: 10px; width: 200px;text-align:center;margin: 0 auto;"><img src="' . $icon_path .'down-arrow.png" title="Reduce Risk" /><br />Reduce Risk</div>';
                           }
                           
                           if (isset($projectData->rapid->softcom_vulnerability) && $projectData->rapid->softcom_vulnerability == "Yes")
                           $gender_attention = '<div style="border: 1px solid #c0c0c0; padding: 10px; width: 70px;text-align:center;margin: 0 auto;"><img src="' . $icon_path .'tic-mark-arrow.png" title="Yes" /></span><br /></div>';
                           elseif (isset($projectData->rapid->softcom_vulnerability) && $projectData->rapid->softcom_vulnerability == "No")
                           $gender_attention = '<div style="border: 1px solid #c0c0c0; padding: 10px; width: 70px;text-align:center;margin: 0 auto;"><img src="' . $icon_path .'x-arrow-red.png"  title="No" /></span><br /></div>';
                           
                           if (isset($projectData->rapid->softcom_vul_alleviate) && $projectData->rapid->softcom_vul_alleviate == "Yes")
                           $risk_alleviate = '<div style="border: 1px solid #c0c0c0; padding: 10px; width: 70px;text-align:center;margin: 0 auto;"><img src="' . $icon_path .'tic-mark-arrow.png" title="Yes" /><br /></div>';
                           elseif (isset($projectData->rapid->softcom_vul_alleviate) && $projectData->rapid->softcom_vul_alleviate == "No")
                           $risk_alleviate = '<div style="border: 1px solid #c0c0c0; padding: 10px; width: 70px;text-align:center;margin: 0 auto;"><img src="' . $icon_path .'x-arrow-red.png" style="height: 15px; width: 20px;" title="No" /><br /></div>';
                           ?>
                        <div style="width: 100%;display: block; font-size: 19px !important;padding:10px 0; ">
                           <div style="width: 35%; vertical-align: top; display: inline-block;margin-top: 0; border: 1px solid #c0c0c0; padding: 10px; background-color: #fff;">
                              <div style="font-family: 'Roboto-Medium' !important; margin-bottom: 10px; width: 100%; text-align: center;font-size: 20px !important;"><b>Modulation of risks by soft components</b>
                              </div>
                              {!! $softcom_rating !!}
                              {!! $softcom_type !!}
                           </div>
                           <div style="width: 29%;display: inline-block; border: 1px solid #c0c0c0; padding: 10px;background-color: #fff;vertical-align: top;">
                              <div style="font-family: 'Roboto-Medium' !important; margin-bottom: 10px; width: 100%; text-align: center;font-size: 20px !important;line-height: 1.2;"><b>Modulation of risks by the project's development context</b></div>
                              {!! $context_rating !!}
                           </div>
                           <div style="width: 29%;display: inline-block; border: 1px solid #c0c0c0; padding: 10px;background-color: #fff;vertical-align: top;">
                              <div style="font-family: 'Roboto-Medium' !important; margin-bottom: 10px; width: 100%; text-align: center;font-size: 20px !important;"><b>Women identified as particularly vulnerable to impacts from climate and geophysical hazards</b></div>
                              <?php echo $gender_attention ;?>
                              <div style="font-family: 'Roboto-Medium' !important; margin-bottom: 10px; width: 100%; text-align: center;font-size: 20px !important; margin-top: 30px;"><b>Components designed to help alleviate the risks to women from climate and geophysical hazards</b></div>
                              <?php echo $risk_alleviate ;?>
                           </div>
                        </div>
                     </div>
                     <div style="clear: both;"></div>
                     @endif
                     @endif
                     <div style="margin-top:10px;display: block; background-color: #fff;padding: 5px;width:100%;"></div>
                     @if (isset($projectData->rapid->outcome_rating) && $projectData->rapid->outcome_rating != "") 
                     <div class="report-summary-step4" style="background-color: #f0f0f0 !important;border: 1px solid #c0c0c0;width: 100%;padding: 10px; margin-top:20px;  color: #404040;">
                        @if (isset($projectData->rapid->impact_rating) && $projectData->rapid->impact_rating != "") 
                        <div style="font-size:23px;padding-left: 10px;padding-top: 5px; padding-right: 10px; padding-bottom: 10px; border: 1px solid #c0c0c0;background-color: #fff;">4. Risk to the outcome/service delivery of the project: <span style="font-size: 19px;">This step assesses the level of risk to the outcome/service delivery that the project is aiming to provide based on previous ratings.</span></div>
                        @else 
                        <div style="font-size:23px;padding-left: 10px;padding-top: 5px; padding-right: 10px; padding-bottom: 10px; border: 1px solid #c0c0c0;background-color: #fff;">3. Risk to the outcome/service delivery of the project: <span style="font-size: 19px;">This step assesses the level of risk to the outcome/service delivery that the project is aiming to provide based on previous ratings.</span></div>
                        @endif
                        <div style="width: 100%;background-color: #fff;padding:5px;margin-top: 10px;">
                           <div class="report-summary-rating-box" style="background-color: {{  config('colors.colors')[$projectData->rapid->outcome_rating] }}; padding-top: 5px; padding-bottom:5px; text-align: center; margin: 0 auto; min-width: 150px; max-width: 350px;">{{  config('colors.colors_text')[$projectData->rapid->outcome_rating] }}</div>
                        </div>
                     </div>
                     @endif
                     <div style="page-break-after: always;"></div>
                     <div class="sec-process-note">
                        <div class="sec-sr-main-head" style="text-align: center; margin-bottom: 15px;">
                           <h2 style="font-size:30px;font-weight:bold;color: #303030;font-family: 'Roboto-Medium' !important;">Notes from the Screening Process</h2>
                        </div>
                        <div class="sec-process-note-body">
                           @if (isset($projectData->rapid->exposure_rating) && $projectData->rapid->exposure_rating != "") 
                           <div class="sec-process-note-exposure">
                              <div class="sec-process-note-exposure-head">
                                 <div style="width: 100%; border: 1px solid #c0c0c0; margin-bottom: 10px;">
                                    <div style="display:inline-block;width: 60%;">
                                       <div style="font-size:23px;font-weight:bold; margin-left: 10px; margin-top:10px; display: block;color: #404040;font-family: 'Roboto-Medium' !important; position: relative;top: 4px;">1. Exposure of the project location</div>
                                    </div>
                                    <div style="float:right; margin-top:3.5px;margin-right:5px;width: 38%;color: #404040;">
                                       <div style="border: 1px solid #c0c0c0; padding:2px; height: 30px; padding-top: 5px;">
                                          <div style="font-size: 16px;width:60%;text-align: left; float: left; margin-top: 1px; margin-left: 5px;font-family: 'Roboto-Medium' !important;"><b>Exposure Rating</b></div>
                                          <div style="background-color: {{ config('colors.colors')[$projectData->rapid->exposure_rating] }}; display: block; text-align: center;font-size: 16px; padding: 2px 20px; float:right; min-width: 20%; border: 1px solid #c0c0c0;">{{ config('colors.colors_text')[$projectData->rapid->exposure_rating] }}</div>
                                          <div style="clear: both;"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="sec-process-note-exposure-body">
                                 <div class="sec-process-note-exposure-body-desc">
                                    <p style="font-size: 20px;line-height: 1.2;">This step provides information on exposure to climate and geophysical hazards at the project location. <b style="font-family: 'Roboto-Medium' !important;">The Exposure rating is {{ config('colors.colors_text')[$projectData->rapid->exposure_rating] }}.{{ $exposure_table_text[$projectData->rapid->exposure_rating] }}.The project location has experienced climate and geophysical hazards in the past and is expected to experience these in the future with moderate intensity, frequency, or duration.</b> The rating is based on climate information drawing on global, quality controlled data sets from the <a href="http://sdwebx.worldbank.org/climateportal/" style="color: #217fca;" target="_blank"><u>Climate Change Knowledge Portal</u></a>. It is useful, for example to understand the temperature range and the rate of annual or decadal increase in a region; or precipitation patterns for historical and future time frames and seasonality shifts. Understanding the trends of hazards is important as they act individually and collectively on project components/subsectors.</p>
                                 </div>
                                 <div style="font-size: 20px;margin-top: 10px;color: #404040;">
                                     The following guiding questions were used to assess exposure:
                                    <ul style="padding-left: 19px;margin: 0;margin-top: 5px;">
                                       <li>What have been the historical trends of climate geophysical hazards?</li>
                                       <li>How are these trends projected to change in the future in terms of intensity, frequency and duration?</li>
                                    </ul>
                                 </div>
                                 <div class="sec-process-note-exposure-body-unote" style="margin-top: 15px;font-size: 20px;color: #404040; margin-bottom: 20px;font-family: 'Roboto-Medium' !important;"><strong>User Notes: </strong>
                                    <span style="font-size: 17px;font-family: 'Roboto' !important;">
                                    @if($projectData->rapid->exposure_notes == "")
                                    No notes added
                                    @else 
                                    {{ $projectData->rapid->exposure_notes }}
                                    @endif
                                    </span>
                                 </div>
                              </div>
                           </div>
                           <div style="clear: both;"></div>
                           @endif
                           @if (isset($projectData->rapid->impact_rating) && $projectData->rapid->impact_rating != "") 
                           <div class="sec-process-note-impact" style="margin-top: 10px;">
                              <div class="sec-process-note-impact-head">
                                 <div style="width: 100%; border: 1px solid #c0c0c0; margin-bottom: 5px; line-height: 1; vertical-align: middle; ">
                                    <div style="display:inline-block; width: 60%;">
                                       <div style="font-size:23px;font-weight:bold; margin-left: 10px; margin-top: 15px; margin-bottom: 5px;display: block;color: #404040; position: relative;top: 4px;font-family: 'Roboto-Medium' !important;">2. Impacts on the project’s physical infrastructure and assets</div>
                                    </div>
                                    <div style="float:right; margin-top:3.5px;margin-right:5px;width: 38%;color: #404040;">
                                       <div style="border: 1px solid #c0c0c0; padding:2px; height: 30px; padding-top: 7px;">
                                          <div style="font-size: 16px;width:60%;text-align: left; float: left; margin-top: 1px; margin-left: 5px;font-family: 'Roboto-Medium' !important;"><b>Impact Rating</b></div>
                                          <div style="background-color: {{ config('colors.colors')[$projectData->rapid->impact_rating] }}; display: block; text-align: center;font-size: 16px; padding: 2px 20px; float:right; min-width: 20%; border: 1px solid #c0c0c0;">{{ config('colors.colors_text')[$projectData->rapid->impact_rating] }}</div>
                                       </div>
                                    </div>
                                 </div>
                                 <div style="clear: both;"></div>
                              </div>
                              <div class="sec-process-note-impact-body">
                                 <div class="sec-process-note-impact-body-desc">
                                    <p style="font-size: 20px;line-height: 1.2;">This step provides an indication of the potential impacts of climate and geophysical hazards on the project’s physical infrastructure and assets as currently designed under relevant subsectors.<b style="font-family: 'Roboto-Medium' !important;"> The Impact rating is {{ config('colors.colors_text')[$projectData->rapid->impact_rating] }}.{{ $impact_table_text[$projectData->rapid->impact_rating] }}.</b> The impact rating is based on the exposure rating and the understanding of the project’s sensitivity by the user. Please note that for this step the tool is helping judge the effect these impacts may have on the investment, and the ability of the project to sustain and enhance physical infrastructures and assets under a changing climate. Understanding where risks may exist and identifying where further work may be required to reduce or manage these risks can help inform the process of dialogue, consultation and analysis during project design.</p>
                                 </div>
                                 <div style="font-size: 20px;margin-top: 10px;color: #404040;">
                                     The following guiding questions were used to assess impact:
                                    <ul  style="padding-left: 19px;margin: 0;margin-top: 5px;">
                                       <li>In the past have climate and geophysical hazards damaged physical infrastructure and/or assets?
                                         </li>
                                       <li>Consider how the structural integrity, materials, siting, longevity and overall effectiveness of your investments may be impacted. Do
                                           investments in the design of your project “lock in” certain decisions for decades to come?</li>
                                       <li>How might changes in climate affect those decisions?
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="sec-process-note-exposure-body-unote" style="margin-top: 15px;font-size: 20px;color: #404040; margin-bottom: 25px; font-family: 'Roboto-Medium' !important;"><strong>User Notes: </strong>
                                    <span style="font-size: 17px;font-family: 'Roboto' !important;">
                                    @if($projectData->rapid->impact_notes == "")
                                    No notes added
                                    @else 
                                    {{ $projectData->rapid->impact_notes }}
                                    @endif
                                    </span>
                                 </div>
                              </div>
                           </div>
                           <div style="clear: both;"></div>
                           @endif
                           @if ((isset($softcom_rating) && $softcom_rating != "") && (isset($context_rating) && $context_rating != "")) 
                           <div class="sec-process-note-adaptive" style="display: block; margin-top: 15px; border: 1px solid #c0c0c0;">
                              <div class="sec-process-note-adaptive-head">
                                 @if (isset($projectData->rapid->impact_rating) && $projectData->rapid->impact_rating != "") 
                                 <div style="font-size:23px;font-weight:bold; margin-left: 10px; margin-top: 6px; margin-bottom: 6px;display: block;color: #404040;font-family: 'Roboto-Medium' !important;">3. Modulating of risks by the project’s soft components and development context</div>
                                 @else 
                                 <div style="font-size:23px;font-weight:bold; margin-left: 10px; margin-top: 6px; margin-bottom: 6px;display: block;color: #404040;font-family: 'Roboto-Medium' !important;">2. Modulating of risks by the project’s soft components and development context</div>
                                 @endif
                              </div>
                           </div>
                           <div class="sec-process-note-impact-body" style="clear: both;margin-top: 10px;margin-bottom: 10px;">
                              <div class="sec-process-note-impact-body-desc">
                                 <p style="font-size: 20px;line-height: 1.2;margin-bottom: 10px;">This step provides information on how the potential impact on key components/subsectors due to exposure from hazards is modulated by the project’s soft components and broader development context. In doing this, this step also takes into account particularly vulnerable groups including women, migrants and displaced populations. </p>
                              </div>
                              <div style="width: 100%; margin-top: 10px;">
                                 <div style="width: 46%; border: 1px solid #f0f0f0; float: left; padding: 10px;">
                                    <div style="font-size: 23px;color: #404040;">Modulation of risks by the project’s soft components</div>
                                    <div style="margin-top: 0; margin-bottom: 5px; margin-left: 55px; font-size: 19px; width: 100%; "><?php echo $softcom_rating ;?></div>
                                    <div>
                                       <p style="font-size: 19px;">This rating reflects how the project's soft components (enabling and capacity building activities) can modulate risks. The right kind of capacity building measures could increase preparedness and long-term resilience and reduce risk.</p>
                                    </div>
                                    <div class="sec-process-note-exposure-body-unote" style="margin-top: 0;font-size: 20px;color: #404040;font-family: 'Roboto-Medium' !important;"><strong>User Notes: </strong>
                                       <span style="font-size: 17px;font-family: 'Roboto' !important;">
                                       @if($projectData->rapid->softcom_notes == "")
                                       No notes added
                                       @else 
                                       {{ $projectData->rapid->softcom_notes }}
                                       @endif
                                       </span>
                                    </div>
                                 </div>
                                 <div style="width: 50%; border: 1px solid #f0f0f0; float: right; padding: 10px;">
                                    <div style="font-size: 23px;color: #404040;">Modulation of risks by the project's development context</div>
                                    <div style="margin-top: 0; margin-bottom: 5px; margin-left: 55px; font-size: 19px;"><?php echo $context_rating; ?></div>
                                    <div>
                                       <p style="font-size: 19px;">This rating reflects how the larger development context, including sector context and other social, economic and political factors can modulate risks.</p>
                                    </div>
                                    <div class="sec-process-note-exposure-body-unote" style="margin-top: 15px;font-size: 20px;color: #404040; font-family: 'Roboto-Medium' !important;"><strong>User Notes: </strong>
                                       <span style="font-size: 17px;font-family: 'Roboto' !important;">
                                       @if($projectData->rapid->context_notes == "")
                                       No notes added
                                       @else 
                                       {{ $projectData->rapid->context_notes }}
                                       @endif
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <div style="clear: both;"></div>
                           </div>
                           @endif
                           @if (isset($projectData->rapid->outcome_rating) && $projectData->rapid->outcome_rating != "") 
                           <div class="sec-process-note-outcome" style="clear:both; display: block; margin-top: 20px; border: 1px solid #c0c0c0;">
                              <div class="sec-process-note-outcome-head">
                                 <div style="width: 100%; border: margin-bottom: 10px;vertical-align: middle;">
                                    <div style="display:inline-block; width: 53%;">
                                       @if (isset($projectData->rapid->impact_rating) && $projectData->rapid->impact_rating != "") 
                                       <div style="font-size:23px;font-weight:bold; margin-left: 10px; margin-top: 15px; margin-bottom: 5px;display: block;color: #404040; position: relative;top: 4px;font-family: 'Roboto-Medium' !important;">4. Risk to the outcome/service delivery of the project</div>
                                       @else 
                                       <div style="font-size:23px;font-weight:bold; margin-left: 10px; margin-top: 15px; margin-bottom: 5px;display: block;color: #404040; position: relative;top: 4px;font-family: 'Roboto-Medium' !important;">3. Risk to the outcome/service delivery of the project</div>
                                       @endif
                                    </div>
                                    <div style="float:right;margin-top:5.5px;margin-right:5px;width: 45%;color: #404040;">
                                       <div style="border: 1px solid #c0c0c0; padding:2px; height: 33px; display: block; padding-top: 7px;">
                                          <div style="font-size: 16px;width:50%;text-align: left; float: left; margin-top: 1px; margin-left: 5px;font-family: 'Roboto-Medium' !important;"><b>Outcome/Service Delivery Rating</b></div>
                                          <div style="background-color:  {{ config('colors.colors')[$projectData->rapid->outcome_rating] }}; display: block; text-align: center;font-size: 16px; padding: 2px 10px; float:right; min-width: 20%; border: 1px solid #c0c0c0;">{{ config('colors.colors_text')[$projectData->rapid->outcome_rating] }} </div>
                                          <div style="clear: both;"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div style="clear: both;"></div>
                           </div>
                           <div class="sec-process-note-outcome-body" style="margin-top: 10px;">
                              <div class="sec-process-note-outcome-body-desc">
                                 <p style="font-size: 19px;">This step provides an indication of the level of risk to the outcome/service delivery that the project is aiming to provide. <b style="font-family: 'Roboto-Medium' !important;">The risk to the outcome/service delivery of your project is  {{ config('colors.colors_text')[$projectData->rapid->outcome_rating] }}.</b> This rating is derived from hazard information, subject matter expertise, contextual understanding of the project, and modulated on the basis of the project’s soft components and broader development context. Keep in mind that in considering resilience measures for risk management, each element of risk should be taken into account, not just the collective risk rating at the outcome/service delivery level.</p>
                              </div>
                              <div class="sec-process-note-exposure-body-unote" style="margin-top: 15px;font-size: 20px;color: #404040; font-family: 'Roboto-Medium' !important;"><strong>User Notes: </strong>
                                 <span style="font-size: 17px;font-family: 'Roboto' !important;">
                                 @if($projectData->rapid->outcome_notes == "")
                                 No notes added
                                 @else 
                                 {{ $projectData->rapid->outcome_notes }}
                                 @endif
                                 </span>
                              </div>
                           </div>
                        </div>
                        @endif
                     </div>
                  </div>
                  <div style="page-break-after: always;"></div>
                  <div class="sec-guidance" style="font-size: 12px;">
                     <div class="sec-sr-main-head" style="text-align: center; margin-bottom: 15px;">
                        <h2 style="font-size:30px;font-weight:bold;color: #303030;font-family: 'Roboto-Medium' !important;">Guidance on Managing Climate Risks through Enhanced Project Design</h2>
                     </div>
                     <div class="sec-guidance-body">
                        <div class="sec-guidance-body-cont1">
                           <p style="font-size: 19px;color: #404040;">By understanding which of your project components are most at risk from climate change and other natural hazards through initial screening, you can begin to take measures to avoid impacts by: </p>
                           <ul style="padding-left: 19px;margin: 0;margin-top: 5px;margin-bottom: 10px;font-size: 19px;color: #404040;">
                              <li>Enhancing the consideration of climate and disaster risks early in project design.</li>
                              <li>Using your risk screening analysis to inform follow-up feasibility studies and technical assessments.</li>
                              <li>Encouraging local stakeholder consultations and dialogue to enhance resilience measures and overall success of the project.</li>
                           </ul>
                           <p style="color: #404040; font-size: 19px; margin-top: 10px !important; display: block;">Table 1 provides some general guidance based on the risk ratings for Outcome/Service Delivery, and Table 2 lists some climate risk management measures for your consideration. Visit the "Screening Resources" page of the tool for additional guidance and a list of useful resources</p>
                           <p style="color: #404040; font-size: 19px; text-decoration: underline;margin-top: 10px!important;">Note: Please recall that that this is a high-level screening tool, and that the characterization of risks should be complemented with more detailed work.</p>
                        </div>
                        <div class="sec-guidance-body-cont2" style="margin-top: 20px;">
                           <div style="color: #222222!important;text-align:center; font-size: 19px; padding-bottom: 5px; padding-top: 5px;font-family: 'Roboto-Medium' !important;"><b>Table 1: General Guidance Based on Risk Ratings for Exposure, Impact and Outcome/Service Delivery</b></div>
                           <div class="sec-guidance-body-cont2body">
                              <table width="100%" border="1">
                                 <tbody>
                                    <tr>
                                       <td style="background-color: #c0c0c0 !important; font-size: 19px;" width="20%">Insufficient Understanding</td>
                                       <td width="80%" style="font-size: 19px; color: #454545">Gather more information to improve your understanding of climate and geophysical hazards and their relationship to your project.</td>
                                    </tr>
                                    <tr>
                                       <td style="background-color: #92d050 !important;font-size: 19px;" width="20%">No/Low Risk </td>
                                       <td width="80%" style="font-size: 19px;color: #454545">If you are confident that climate and geophysical hazards pose no or low risk to the project, continue with project development. However, keep in mind that this is a high-level risk screening at an early stage of project development. Therefore, you are encouraged to monitor the level of climate and geophysical risks to the project as it is developed and implemented.</td>
                                    </tr>
                                    <tr>
                                       <td style="background-color: #ffff00 !important;font-size: 19px;" width="20%">Moderate Risk </td>
                                       <td width="80%" style="font-size: 19px; color: #454545">For areas of Moderate Risk, you are encouraged to build on this screening through additional studies, consultation, and dialogue. This initial screening may be supplemented with a more detailed risk assessment to better understand the nature of the risk to the project.</td>
                                    </tr>
                                    <tr>
                                       <td style="background-color: #ff0000 !important;font-size: 19px;" width="20%">High Risk </td>
                                       <td width="80%" style="font-size: 19px;color: #454545;">For areas of High Risk, you are strongly encouraged to conduct a more detailed risk assessment and to explore measures to manage or reduce those risks.</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="sec-guidance-body-cont3" style="margin-top: 20px;">
                           <div style="color: #222222!important;text-align:center; font-size: 19px; padding-bottom: 5px; padding-top: 5px;font-family: 'Roboto-Medium' !important;"><b>Table 2: Types of Climate Risk Management Measures for Typical Agriculture Projects</b></div>
                           <div class="sec-guidance-body-cont3body">
                              <table width="100%" border="1" style="page-break-inside:auto !important;">
                                 <tbody>
                                     <tr>
                                         <th width="20%" style="font-size: 19px; color: #303030;font-family: 'Roboto-Medium' !important;">OBJECTIVE </th>
                                         <th width="80%" style="font-size: 19px; color: #303030;font-family: 'Roboto-Medium' !important;">EXAMPLES</th>
                                      </tr>
                                      <tr>
                                         <td width="20%" style="font-size: 19px; color: #454545;">Improved Irrigation and Drainage</td>
                                         <td width="80%" style="font-size: 19px; color: #454545;">
                                            <ul>
                                               <li>Prioritize drought-sensitive farming and ecosystems for irrigation </li>
                                               <li>Build capacity to integrate climate change scenarios in water resources policy planning</li>
                                               <li>Employ technical measures to improve water use efficiency in rainfed and irrigated agriculture</li>
                                               <li>Employment of high efficiency irrigation, including drip and trickle irrigation</li>
                                               <li>Explore water re-use techniques, rainwater harvesting and sustainable drainage</li>
                                               <li>Use of farm ponds, farm drainage and upscaling micro irrigation</li>
                                               <li>Consider investments on small and medium reservoirs and projects for water supply and irrigation</li>
                                               <li>Improvement of water supplies for agriculture</li>
                                            </ul>
                                         </td>
                                      </tr>
                                      <tr>
                                         <td width="20%" style="font-size: 19px; color: #454545;">Optimize crops and land management practices</td>
                                         <td width="80%" style="font-size: 19px; color: #454545;">
                                            <ul>
                                               <li>Adjusting cropping practices to fit selected crops and targeted rainfall</li>
                                               <li>Encouraging investments in sustainable land use practices</li>
                                               <li>Diversifying agricultural production where farming communities are dependent on rainfed crops</li>
                                               <li>Promote land tenure and property rights reform to strengthen local natural resource management. </li>
                                               <li>Provide farmers with new cultivars that are drought and heat-tolerant. </li>
                                               <li>Develop new insurance instruments to address climate risks. </li>
                                               <li>Help smallholders diversify crops to increase resilience to variable climate conditions </li>
                                               <li>Restrict harmful agricultural practices that increase erosion and reduce soil fertility. </li>
                                               <li>Investing in early control and detection systems for pests and diseases </li>
                                            </ul>
                                         </td>
                                      </tr>
                                      <tr>
                                         <td width="20%" style="font-size: 19px; color: #454545;">Improve livestock practices</td>
                                         <td width="80%" style="font-size: 19px; color: #454545;">
                                            <ul>
                                               <li>Strengthening national animal health services</li>
                                               <li>Promote adoption of breeds better adapted to the prevailing climate. </li>
                                               <li>Encourage mixed crop-livestock systems and water, feed, and animal management to increase livestock productivity. </li>
                                            </ul>
                                         </td>
                                      </tr>
                                      <tr>
                                         <td width="20%" style="font-size: 19px; color: #454545;">Accommodate / Manage </td>
                                         <td width="80%" style="font-size: 19px; color: #454545;">
                                            <ul>
                                               <li>Increase repair and maintenance budgets for physical infrastructure, such as storage facilities and access roads</li>
                                               <li>Increase inspection frequency to ensure structures are enduring climate change pressures</li>
                                            </ul>
                                         </td>
                                      </tr>
                                      <tr>
                                         <td width="20%" style="font-size: 19px; color: #454545;">Protect / Harden</td>
                                         <td width="80%" style="font-size: 19px; color: #454545;">
                                            <ul>
                                               <li>Update design standards to integrate projected sea level rise and storm surge</li>
                                               <li>Implementing wind protection measures</li>
                                               <li>Revegetation of unstable slopes</li>
                                               <li>Expanding drainage capacity to cope with heavy rainfall and flooding</li>
                                            </ul>
                                         </td>
                                      </tr>
                                      <tr>
                                         <td width="20%" style="font-size: 19px; color: #454545;">Retreat / Relocate</td>
                                         <td width="80%" style="font-size: 19px; color: #454545;">
                                            <ul>
                                               <li>Evaluate elevating key facilities to prevent overflows and inundation</li>
                                               <li>Plan for community relocation</li>
                                               <li>Relocating crops to different plots of land </li>
                                               <li>Moving infrastructure further inland</li>
                                            </ul>
                                         </td>
                                      </tr>
                                      <tr>
                                         <td width="20%" style="font-size: 19px; color: #454545;">Build training and information systems </td>
                                         <td width="80%" style="font-size: 19px; color: #454545;">
                                            <ul>
                                               <li>Build capacity to better understand and cope with climate change impacts on institutions and rural communities</li>
                                               <li>Increasing access to climate information, including long-term weather forecasting and better seasonal forecasts to guide the selection and timing of seasonal crops</li>
                                               <li>Develop early warning systems that provide daily weather predictions and seasonal forecasts</li>
                                               <li>Improve training and education efforts related to sustainable agriculture and the use of more efficient irrigation techniques </li>
                                            </ul>
                                         </td>
                                      </tr>
                                      <tr>
                                         <td width="20%" style="font-size: 19px; color: #454545;">Strengthen policies, planning and systems </td>
                                         <td width="80%" style="font-size: 19px; color: #454545;">
                                            <ul>
                                               <li>Integrate climate information into system planning</li>
                                               <li>Improved coordination of policies and programs between agriculture ministries and other government agencies on ways to deal with climate change</li>
                                               <li>Strengthen departments of disaster risk management and meteorology to improve information on which to make decision</li>
                                            </ul>
                                         </td>
                                      </tr>
                                 </tbody>
                              </table>
                              <div style="width: 100%; text-align: center;margin-top: 20px;">
                                 <p style="font-size: 19px; color: #454545;">Sources: <a href="https://www.climatelinks.org/sites/default/files/2017-03-14 USAID CRM Tool Water Supply and Sanitation Annex.pdf" style="color: #217fca;">: USAID Climate Risk Screening and Management Tools: Agriculture Annex;</a>  <a href="https://docs.google.com/a/ccrdproject.com/viewer?a=v&amp;pid=sites&amp;srcid=Y2NyZHByb2plY3QuY29tfGNjcmR8Z3g6NmYyZDYxZDdiZTQwZmI0NA" style="color: #217fca;">USAID Addressing Climate Impacts on Infrastructure;</a> <a href="https://www.adb.org/sites/default/files/institutional-document/33720/files/guidelines-climate-proofing-investment.pdf" style="color: #217fca;">ADB Guidelines for Climate Proofing Investments in Agriculture</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
         </section>
      </div>
   </div>
   </div>
   </div>
</body>
</html>