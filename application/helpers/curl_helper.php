<?php
function curl_request($key)
{
    $url ='https://www.consumerfinance.gov/data-research/consumer-complaints/search/api/v1/?search_term='.$key;
    $curl=curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);//CURLOPT to return string response rather than outputting the values
    $result=curl_exec($curl);
    curl_close($curl);
    $company =json_decode($result,true);
   global $companydata;
   $companydata='';
   $HITS = $company['hits'];
   $HITS_2 = $HITS['hits'];
    for($i=0;$i<5;$i++)
    {
      
        $HITS_source = $HITS_2[$i];
        $source = $HITS_source['_source'];
        $company_name = $source['company'];
        $companydata = $companydata.$company_name.'|';
    }
   return $companydata;
    // print_r($result);
}