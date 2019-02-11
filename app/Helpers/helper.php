<?php
function getCCKPLink($countries){
    //$linkData = '';
    $links = [];
    $countCountry = count($countries);
    $countryCode3Arr = ["AFG", "DZA", "BHS", "BGD", "BRB", "BLZ", "BEN", "BOL", "BFA", "BDI", "KHM", "CMR", "CAF", "TCD", "COL", "COM", "COG", "CRI", "CIV", "DJI", "DMA", "ECU", "EGY", "ETH", "GMB", "GHA", "GRD", "GTM", "GIN", "GNB", "GUY", "HTI", "HND", "IND", "IDN", "IRQ", "JOR", "KAZ", "KEN", "KWT", "KGZ", "LAO", "LBN", "LSO", "LBR", "LBY", "MDG", "MWI", "MDV", "MLI", "MHL", "MRT", "MEX", "MDA", "MNG", "MAR", "MOZ", "NPL", "NER", "NGA", "OMN", "PAK", "PAN", "PNG", "PHL", "QAT", "RWA", "WSM", "STP", "SAU", "SEN", "SLE", "SLB", "SSD", "LKA", "KNA", "LCA", "VCT", "SUR", "SYR", "TJK", "TZA", "TLS", "TGO", "TON", "TKM", "VUT", "VNM", "YEM", "ZMB"];
	// if(count($countries) > 1){
    //     $linkData .='Climate Change Knowledge Portal';
    // }
    foreach($countries as $k => $country){
        if (in_array($country->iso3, $countryCode3Arr)) {
			$url = 'http://sdwebx.worldbank.org/climateportal/countryprofile/home.cfm?page=country_profile&CCode='.$country->iso3.'&ThisTab=RiskOverview';
		}else {
			$url = 'http://sdwebx.worldbank.org/climateportal/index.cfm?page=country_historical_climate&ThisRegion='.$country->region_name.'&ThisCCode='.$country->iso3;
        }
        if($countCountry == 1){
            $links[] ='<a class="table-data-link" href="'.$url.'" target="_blank">Climate Change Knowledge Portal</a>';
        }else{
            $links[] = '<a class="table-data-link" href="'.$url.'" target="_blank">('.$country->name.')</a>';
        }
        
    }

	return $links;
}
?>