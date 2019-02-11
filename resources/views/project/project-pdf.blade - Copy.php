<?php
   $exposure_table_text = array('1' => 'There is insufficient knowledge about the project or  insufficient understanding of how to interpret information on climate and geophysical hazards to make a rating.', '2' => 'The project location has not experienced climate and geophysical hazards in the past and there is no indication that these may become more intense or more frequent in the future', '4' => 'The project location has experienced climate and geophysical hazards in the past and is expected to experience these in the future with moderate intensity, frequency, or duration.', '5' => 'The project location has experienced climate and geophysical hazards in the past and is expected to experience these in the future with high intensity, frequency, or duration');
   $impact_table_text = array('1' => 'There is insufficient knowledge about the project or  insufficient understanding of how to interpret information on climate and natural hazards to make a rating.', '2' => 'Climate and geophysical hazards are not likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of your investments', '4' => 'Climate and geophysical hazards are likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of your investments.', '5' => 'Climate and geophysical hazards are likely to significantly impact the structural integrity, materials, siting, longevity and overall effectiveness of your investments');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" version="XHTML+RDFa 1.0">
<head>
   <title>PDF | Climate &amp; Disaster Risk Screening Tools</title>
    <style>
  @font-face {
    font-family: 'Roboto';
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
  }
  body {
    font-family: 'Roboto', sans-serif;;
  }
  </style>
</head>
<body>
<div style="width: 100%;background-color: #890101;height: 50px;"><p style="padding-bottom: 10px;padding-top: 10px !important;font-size: 20px;color: #E7E7E7 !important;padding-left: 10px;">Climate & Disaster Risk Screening Tools</p></div>
<div style="width: 100%;margin: 5px;padding: 5px;text-align: center;padding-top: 50px;font-size: 20px;"><h3>Climate and Disaster Risk Screening Report for {{ $projectData->name }} in {{ $projectData->country_name }}.</h3></div>
<div style="width: 100%;margin: 5px;padding: 5px;text-align: center;font-size: 12px;"><b>Table 1: Project Information</b></div>
<div style="width: 100%;margin: 5px;padding: 5px;">
   <div style="padding-left: 10%;">
      <table style="width: 90%;border: 1px solid black;border-collapse: collapse;" border="1">
            <tbody>
               @if (isset($projectData->name) && $projectData->name != "") 
                  <tr>
                     <td style="width: 43%;font-size: 14px;padding-left: 5px;"><b>Project Title:</b></td>
                     <td style="font-size: 14px;padding-left: 5px;">{{ $projectData->name }}</td>
                  </tr>
               @endif
               @if (isset($projectData->project_number) && $projectData->project_number != "") 
                  <tr>
                     <td style="width: 43%;font-size: 14px;padding-left: 5px;"><b>Project Number:</b></td>
                     <td style="font-size: 14px;padding-left: 5px;">{{ $projectData->project_number }}</td>
                  </tr>
               @endif
               @if (isset($projectData->assessment_completed_by) && $projectData->assessment_completed_by != "") 
                  <tr>
                     <td style="width: 43%;font-size: 14px;padding-left: 5px;"><b>Assessment completed by:</b></td>
                     <td style="font-size: 14px;padding-left: 5px;">{{ $projectData->assessment_completed_by }}</td>
                  </tr>
               @endif
               @if (isset($projectData->estimated_timeline_PCN_year) && $projectData->estimated_timeline_PCN_year != "") 
                  <tr>
                     <td style="width: 43%;font-size: 14px;padding-left: 5px;"><b>Estimated timeline for PCN Year: </b></td>
                     <td style="font-size: 14px;padding-left: 5px;">{{ $projectData->estimated_timeline_PCN_year }}</td>
                  </tr>
               @endif
               @if (isset($projectData->estimated_timeline_PCN_quarter) && $projectData->estimated_timeline_PCN_quarter != "")
                  <tr>
                     <td style="width: 43%;font-size: 14px;padding-left: 5px;"><b>Estimated timeline for PCN Quarter: </b></td>
                     <td style="font-size: 14px;padding-left: 5px;">{{ $projectData->estimated_timeline_PCN_quarter }}</td>
                  </tr>
               @endif
               @if (isset($projectData['tool']->name) && $projectData['tool']->name != "")
                  <tr>
                     <td style="width: 43%;font-size: 14px;padding-left: 5px;"><b>Screening Tool Used:</b></td>
                     <td style="font-size: 14px;padding-left: 5px;">{{ $projectData['tool']->name }}</td>
                  </tr>
               @endif
            </tbody>
      </table>
   </div>
</div>
<div style="width: 100%;background-color: #f0f0f0;margin-top: 30px;padding: 5px;line-height: 16px;" align="justify">
   <p style="background-color: #f0f0f0;font-size: 12px;">The Climate and Disaster Risk Screening Tool provides high-level screening to help consider short- and long-term climate and disaster risks at an early stage of project design. The tool applies an Exposure–Impact–Adaptive capacity framework to characterize risks (Annex 1). Potential risks are identified by connecting information on climate and geophysical hazards with users’ subject matter expertise of project components (both physical and non-physical) and understanding of the broader sector and development context.</p>
   <p style="background-color: #f0f0f0;font-size: 12px;">The tool does not provide a detailed risk analysis. Rather, it is intended to help inform the need for further consultations, dialogue with local and other experts and analytical work at the project location to strengthen resilience measures in the course of project design.</p>
</div>

<div style="padding: 5px;margin-top: 200px;">
   <p style="font-size: 10px; font-weight: normal !important;border-top: 1px solid black;"><sup>1</sup> This is the output report from applying the World Bank Group\'s Climate and Disaster Risk Screening Project Level Tool (Global website:climatescreeningtools.worldbank.org; World Bank users: wbclimatescreeningtools.worldbank.org). The findings, interpretations, and conclusions expressed from applying this tool are those of the individual that applied the tool and should be in no way attributed to the World Bank, to its affiliated institutions, to the Executive Directors of The World Bank or the governments they represent. The World Bank does not guarantee the accuracy of the information included in the screening and this associated output report and accepts no liability for any consequence of its use.</p>
</div>
<div style="page-break-after: always;"></div>
<div style="width: 100%;padding: 5px;">
   <div style="text-align: center;font-size: 12px;">
      <h2 style="font-size:17px;font-weight:bold;">Summary Climate and Disaster Risk Screening Report</h2>
   </div>
   @if (isset($projectData->rapid->exposure_rating) && $projectData->rapid->exposure_rating != "") 
   <div style="background-color: #f0f0f0 !important; padding-left: 10px;padding-right: 10px; padding-top: 5px;padding-bottom: 10px; border: 1px solid #c0c0c0; height: 150px;">
      <div style="font-size:15px;padding-left: 10px;padding-top: 5px; padding-right: 10px; padding-bottom: 10px; border: 1px solid #c0c0c0;background-color: #fff;">
         1. Exposure of the project location: <span style="font-size: 12px;">This step assesses the current and future exposure of the project location to relevant climate and geophysical hazards.</span>
      </div>
      <div style=" width: 100%;font-size: 11px !important;padding-top:5px;padding-bottom:5px;">
         <div style="width: 20%; float: left; border: 1px solid #c0c0c0; text-align: center !important;background-color: #fff;">
            <div style="margin-bottom: 5px; margin-top: 10px; text-align: center;"><b>Exposure Rating</b></div>
            <div style="background-color: {{ $colors[$projectData->rapid->exposure_rating] }}; padding: 2px 5px; text-align: center; width: 100px; margin-left: 10px; margin-bottom: 10px; padding-top: 15px; padding-bottom: 15px;">{{ $colors_text[$projectData->rapid->exposure_rating] }}</div>
         </div>
         <div style="width: 75%; float: right; border: 1px solid #c0c0c0; padding: 5px;background-color: #fff;">
            @if (isset($decisionTree->exposure_types) && $decisionTree->exposure_types != "") 
            <div>
               <b>Climate and geophysical hazards that are likely to be relevant to the project location both in present and in the future</b>
               <div style="margin-top: 5px;">
                  @foreach($decisionTree->exposure_types as $key => $value) 
                     <div style="float: left;border: 1px solid #c0c0c0; padding-left: 5px; padding-right: 5px; padding-top: 5px; padding-bottom: 5px; width: 125px;margin-bottom:4px;">{{ $value }}</div>
                     <div style="float: left; width: 10px;">&nbsp;</div>
                  @endforeach
               </div>
               @endif
            </div>
            <div style="clear: both; margin: 0pt; padding: 0pt; "></div>
         </div>
      </div>
   </div>
   @endif
</div>


</body>
</html>