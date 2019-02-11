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
                                 <p style="background-color: #f0f0f0; font-size: 20px;">The Climate and Disaster Risk Screening Tool provides high-level screening to help consider short- and long-term climate and
                                    disaster risks at an early stage of project design. The tool applies an Exposure–Impact–Adaptive capacity framework to characterize
                                    risks. Potential risks are identified by connecting information on climate and geophysical hazards with users’ subject matter
                                    expertise of project components (both physical and non-physical) and understanding of the broader sector and development
                                    context.
                                 </p>
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
                                 <div style="font-size:23px;padding-left: 10px;padding-top: 5px; padding-right: 10px; padding-bottom: 10px; border: 1px solid #c0c0c0;background-color: #fff;">1. Exposure of the project location: <span style="font-size: 19px;">This step assesses the current and future exposure of the project location to relevant
                                    climate and geophysical hazards as an aggregate.</span>
                                 </div>
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
                                 <div style="font-size:23px;padding-left: 10px;padding-top: 5px; padding-right: 10px; padding-bottom: 10px; border: 1px solid #c0c0c0;background-color: #fff;">2. Impacts on the project’s physical infrastructure and assets: <span style="font-size: 19px;">This step assesses the current and future impacts of
                                    identified climate and geophysical hazards on the project's physical infrastructure and assets as currently designed.</span>
                                 </div>
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
                              3. Modulation of risks by the project's soft components and development context: <span style="font-size: 19px;">This step assesses how the
                              project’s soft components as currently designed, together with the project’s broader development context, modulate the risk from
                              climate and geophysical hazards. This step also considers particularly vulnerable groups, namely women, migrants and displaced
                              populations.
                              </span>
                           </div>
                           @else
                           <div class="report-summary-step3" style="font-size:23px;padding-left: 10px;padding-top: 5px; padding-right: 10px; padding-bottom: 10px; border: 1px solid #c0c0c0;background-color: #fff;">
                              2. Modulation of risks by the project's soft components and development context: <span style="font-size: 19px;">This step assesses how the
                              project’s soft components as currently designed, together with the project’s broader development context, modulate the risk from
                              climate and geophysical hazards. This step also considers particularly vulnerable groups, namely women, migrants and displaced
                              populations.</span>
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
                                 <div style="font-family: 'Roboto-Medium' !important; margin-bottom: 10px; width: 100%; text-align: center;font-size: 20px !important;"><b>Modulation of risks by the project`s soft components</b>
                                 </div>
                                 {!! $softcom_rating !!}
                                 <div style="font-family: 'Roboto-Medium' !important; margin-bottom: 10px; width: 100%; text-align: center;font-size: 20px !important;"><b>Selected soft components</b></div>
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
                              <div style="font-family: 'Roboto-Medium' !important; margin-bottom: 10px; width: 100%; text-align: center;font-size: 19px !important;"><b>Outcome / Service Delivery Rating</b>
                              </div>
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
                                       <p style="font-size: 20px;line-height: 1.2;">This step provides information on exposure to climate and geophysical hazards at the project location. <b style="font-family: 'Roboto-Medium' !important;">The Exposure rating is {{ config('colors.colors_text')[$projectData->rapid->exposure_rating] }}.{{ $exposure_table_text[$projectData->rapid->exposure_rating] }}.</b> The rating is based on climate information drawing on global, quality controlled data sets from the <a href="http://sdwebx.worldbank.org/climateportal/" style="color: #217fca;" target="_blank"><u>Climate Change Knowledge Portal</u></a>. It is useful, for example to understand the temperature range and the rate of annual or decadal increase in a region; or precipitation patterns for historical and future time frames and seasonality shifts. Understanding the trends of hazards is important as they act individually and collectively on project components/subsectors.</p>
                                    </div>
                                    <div style="font-size: 20px;margin-top: 10px;color: #404040;">
                                       The following guiding questions are used to assess exposure:
                                       <ul style="padding-left: 19px;margin: 0;margin-top: 5px;">
                                          <li>What have been the historical trends in temperature, precipitation and drought conditions?</li>
                                          <li>How are these trends projected to change in the future in terms of intensity, frequency and duration?</li>
                                          <li>Has the location experienced strong winds, seal level rise, storm surge, and/or geophysical hazards in the past that may occur again in the future?</li>
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
                                       <p style="font-size: 20px;line-height: 1.2;">This step provides an indication of the potential impacts of climate and geophysical hazards on the project’s physical infrastructure and assets as currently designed under relevant subsectors.<b style="font-family: 'Roboto-Medium' !important;"> The Impact rating is {{ config('colors.colors_text')[$projectData->rapid->impact_rating] }}.{{ $impact_table_text[$projectData->rapid->impact_rating] }}</b> The impact rating is based on the exposure rating and the understanding of the project’s sensitivity by the user. Please note that for this step the tool is helping judge the effect these impacts may have on the investment, and the ability of the project to sustain and enhance physical infrastructures and assets under a changing climate. Understanding where risks may exist and identifying where further work may be required to reduce or manage these risks can help inform the process of dialogue, consultation and analysis during project design.</p>
                                    </div>
                                    <div style="font-size: 20px;margin-top: 10px;color: #404040;">
                                       The following guiding questions are used to assess potential impacts:
                                       <ul style="padding-left: 19px;margin: 0;margin-top: 5px;">
                                          <li>Does the project design take into account recent trends and future projected changes in identified climate and geophysical hazards?</li>
                                          <li>Does the project design consider how the structural integrity, materials, siting, longevity and overall effectiveness of investments may be impacted?</li>
                                          <li>Does the project consider how future operation and maintenance costs may be affected?</li>
                                          <li>In particular, does the design “lock in” certain decisions for the future?</li>
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
                                    <div style="font-size:23px;font-weight:bold; margin-left: 10px; margin-top: 6px; margin-bottom: 6px;display: block;color: #404040;font-family: 'Roboto-Medium' !important;">3. Modulation of risks by the project’s soft components and development context</div>
                                    @else 
                                    <div style="font-size:23px;font-weight:bold; margin-left: 10px; margin-top: 6px; margin-bottom: 6px;display: block;color: #404040;font-family: 'Roboto-Medium' !important;">2. Modulation of risks by the project’s soft components and development context</div>
                                    @endif
                                 </div>
                              </div>
                              <div class="sec-process-note-impact-body" style="clear: both;margin-top: 10px;margin-bottom: 10px;">
                                 <div class="sec-process-note-impact-body-desc">
                                    <p style="font-size: 20px;line-height: 1.2;margin-bottom: 10px;">This step provides information on how the potential impact on key components/subsectors due to exposure from hazards is modulated by
                                       the project’s soft components and broader development context. This step also takes into account particularly vulnerable groups including
                                       women, migrants and displaced populations.
                                    </p>
                                 </div>
                                 <div style="width: 100%; margin-top: 20px;">
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
                                    <div style="width: 46%; border: 1px solid #f0f0f0; float: right; padding: 10px;">
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
                              <div style="color: #222222!important;text-align:center; font-size: 19px; padding-bottom: 5px; padding-top: 5px;font-family: 'Roboto-Medium' !important;"><b>Table 1: General Guidance Based on Risk Ratings for Outcome/Service Delivery</b></div>
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
                              <div style="color: #222222!important;text-align:center; font-size: 19px; padding-bottom: 5px; padding-top: 5px;font-family: 'Roboto-Medium' !important;"><b>Table 2: Types of Climate Risk Management Measures for Typical Natural Resources Projects</b></div>
                              <div class="sec-guidance-body-cont3body">
                                 <table width="100%" border="1" style="page-break-inside:auto !important;">
                                    <tbody>
                                       <tr>
                                          <th width="20%" style="font-size: 19px; color: #303030;font-family: 'Roboto-Medium' !important;">OBJECTIVE </th>
                                          <th width="80%" style="font-size: 19px; color: #303030;font-family: 'Roboto-Medium' !important;">EXAMPLES</th>
                                       </tr>
                                       <tr>
                                          <td width="20%" style="font-size: 19px; color: #454545;">Support new livelihood opportunities </td>
                                          <td width="80%" style="font-size: 19px; color: #454545;">
                                             <ul>
                                                <li>Develop alternative livelihoods where existing climate-sensitive livelihoods may no longer be viable.</li>
                                                <li>Ensure new livelihood opportunities are available for women and other marginalized populations, and look out for unintended consequences, such as increasing women’s unpaid work burden and/or increasing the length of their work day.</li>
                                                <li>Encourage fishing communities to take advantage of fish species that are becoming more abundant due to climate change.</li>
                                                <li>Explore opportunities for payment for ecosystem services that support the conservation or restoration of areas that provide key services. </li>
                                                <li>Ensure that women-led businesses have access to financing opportunities.</li>
                                             </ul>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td width="20%" style="font-size: 19px; color: #454545;">Promote ecosystem-based approaches to adaptation</td>
                                          <td width="80%" style="font-size: 19px; color: #454545;">
                                             <ul>
                                                <li>Reduce the vulnerability of related sectors, such as agriculture and water, to climate impacts through support for conservation efforts, which provide co-benefits for ecosystems and their services. </li>
                                                <li>Protect ecosystems that buffer or mitigate climate impacts for stakeholders in related sectors.</li>
                                                <li>Promote climate-smart agricultural practices, including agro-forestry systems.</li>
                                                <li>Support the use of green infrastructure for flood management or coastal protection.</li>
                                                <li>Explore opportunities to increase water security through protecting and restoring watersheds.</li>
                                                <li>Maintain and expand large intact landscapes and seascapes.</li>
                                                <li>Protect key, representative habitats within landscapes and seascapes.</li>
                                                <li>Conserve biodiversity and manage natural resources in ways that maintain their long-term viability.</li>
                                                <li>Increase connectivity between protected areas.</li>
                                                <li>Increase conservation outside of protected areas, and incorporate mixed natural systems (e.g. agroforests).</li>
                                                <li>Protect areas that are likely to become refugia as temperatures increase and sea levels rise.</li>
                                                <li>Achieve co-benefits for ecosystems and climate change mitigation through sustainable land and forest management.</li>
                                             </ul>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td width="20%" style="font-size: 19px; color: #454545;">Build information collection and management systems</td>
                                          <td width="80%" style="font-size: 19px; color: #454545;">
                                             <ul>
                                                <li>Support research that assesses future potential impacts of climate change on biodiversity.</li>
                                                <li>Incorporate climate information into landscape-level conservation, land-use planning, and protected area management.</li>
                                                <li>Seek information from women, indigenous peoples, and other marginalized populations who are often the custodians of local knowledge about wild plants, seeds, and other elements of biodiversity.</li>
                                             </ul>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td width="20%" style="font-size: 19px; color: #454545;">Reduce Other Human Stressors that Exacerbate Climate Change Impacts</td>
                                          <td width="80%" style="font-size: 19px; color: #454545;">
                                             <ul>
                                                <li>Reduce the effects of non-climate stressors, such as pollution, overexploitation, land use change, urbanization, and invasive species.</li>
                                                <li>Account for predicted changes in demand for ecosystem services that may exacerbate climate impacts.</li>
                                                <li>Consider whether human adaptation to climate risks is going to increase or create new stresses on ecosystems and biodiversity.</li>
                                             </ul>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td width="20%" style="font-size: 19px; color: #454545;">Strengthen policies, planning and systems</td>
                                          <td width="80%" style="font-size: 19px; color: #454545;">
                                             <ul>
                                                <li>Strengthen institutions that are responsible for conservation and management of ecosystems and natural resources, including their ability to incorporate climate change into their activities.</li>
                                                <li>Support conservation efforts in related sectors, such as agriculture and water.</li>
                                                <li>Support the use of carbon finance to monetize future cash flows from the advanced sale of carbon credits, as means to finance conservation costs. </li>
                                                <li>Encourage partnerships between governments and private business to protect forests and promote climate change mitigation (e.g., manufacture and distribute fuel-efficient cook stoves, which reduce emissions while also providing an alternative to burning fuel wood).</li>
                                                <li>Promote zoning restrictions on coastal development to allow coastal wetlands to migrate inland as sea levels rise, protecting the goods and services they provide.</li>
                                                <li>Support REDD+ to help achieve climate change mitigation goals while also providing conservation-based, income-generating opportunities.</li>
                                                <li>Work with governments to design gender-informed policies that address climate impacts that affect women and men differently, encourage women’s participation and leadership, leverage women’s knowledge and perspectives, and reduce risk of further gender inequality caused by climate change.</li>
                                             </ul>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <div style="width: 100%; text-align: center;margin-top: 20px;">
                                    <p style="font-size: 19px; color: #454545;">Sources: <a href="https://www.climatelinks.org/sites/default/files/2017-05-24 USAID CRM Tool Environment and Biodiversity Annex.pdf" style="color: #217fca;">USAID Climate Risk Screening and Management Tools: </a><a href="https://www.climatelinks.org/sites/default/files/2017-05-24 USAID CRM Tool Environment and Biodiversity Annex.pdf" style="color: #217fca;">Environment and Biodiversity Annex;</a><a href="https://www.ipcc.ch/pdf/technical-papers/climate-changes-biodiversity-en.pdf" style="color: #217fca;">IPCC Technical Paper on Climate Change and Biodiversity</a></p>
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