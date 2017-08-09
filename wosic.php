<?php
set_time_limit(0);
ob_end_clean();
error_reporting("all~notice");
header("Content-Type: text/html; charset=utf-8");
include_once('data.php');
/**
 * 获取wos文献存入cache为文件
 *
 * @author lihailiang
 *
 */
class wos extends data
{
	 function getCounSession()
	 {
		$tmp_c = $this->get_head('http://www.webofknowledge.com');
		preg_match_all('/SID="(.*)"/siU',$tmp_c,$arr10);
		$isisession	= trim(strip_tags($arr10[1][0]));
	    //echo $isisession;exit;
		if(!empty($isisession))
		{
			$this->tmp_sid	= $isisession;
		}
		else
		{
			die("获取session失败，请重新开始!");
		}
		
	 }

	 function search()
	 {
	    $author = isset($_GET['author']) ? $_GET['author'] : '';
	    $address = isset($_GET['address']) ? $_GET['address'] : '';
		
		$tmp_sid	= $this->tmp_sid;
		$key	= 	$this->key	= urlencode($author);
		$key2  = $this->key2= urlencode($address);
		//print_r($key2);
        $tmp_url = 'http://apps.webofknowledge.com/WOS_GeneralSearch.do';
        $tmp_param = 'fieldCount=2&action=search&product=WOS&search_mode=GeneralSearch&SID='.$tmp_sid.'&max_field_count=25&max_field_notice=%E6%B3%A8%E6%84%8F%3A+%E6%97%A0%E6%B3%95%E6%B7%BB%E5%8A%A0%E5%8F%A6%E4%B8%80%E5%AD%97%E6%AE%B5%E3%80%82&input_invalid_notice=%E6%A3%80%E7%B4%A2%E9%94%99%E8%AF%AF%3A+%E8%AF%B7%E8%BE%93%E5%85%A5%E6%A3%80%E7%B4%A2%E8%AF%8D%E3%80%82&exp_notice=%E6%A3%80%E7%B4%A2%E9%94%99%E8%AF%AF%3A+%E4%B8%93%E5%88%A9%E6%A3%80%E7%B4%A2%E8%AF%8D%E5%8F%AF%E5%9C%A8%E5%A4%9A%E4%B8%AA%E5%AE%B6%E6%97%8F%E4%B8%AD%E6%89%BE%E5%88%B0+%28&input_invalid_notice_limits=+%3Cbr%2F%3E%E6%B3%A8%3A+%E6%BB%9A%E5%8A%A8%E6%A1%86%E4%B8%AD%E6%98%BE%E7%A4%BA%E7%9A%84%E5%AD%97%E6%AE%B5%E5%BF%85%E9%A1%BB%E8%87%B3%E5%B0%91%E4%B8%8E%E4%B8%80%E4%B8%AA%E5%85%B6%E4%BB%96%E6%A3%80%E7%B4%A2%E5%AD%97%E6%AE%B5%E7%9B%B8%E7%BB%84%E9%85%8D%E3%80%82&sa_params=WOS%7C%7C'.$tmp_sid.'%7Chttp%3A%2F%2Fapps.webofknowledge.com%7C%27&formUpdated=true&value%28input1%29='.$key.';&value%28select1%29=AU&value%28hidInput1%29=&value%28bool_1_2%29=AND&value%28input2%29='.$key2.'&value%28select2%29=AD&x=878&y=367&value%28hidInput2%29=&limitStatus=expanded&ss_lemmatization=On&ss_spellchecking=Suggest&SinceLastVisit_UTC=&SinceLastVisit_DATE=&period=Range+Selection&range=ALL&startYear=1986&endYear=2017&editions=SCI&update_back2search_link_param=yes&ssStatus=display%3Anone&ss_showsuggestions=ON&ss_numDefaultGeneralSearchFields=1&ss_query_language=&rs_sort_by=PY.D%3BLD.D%3BSO.A%3BVL.D%3BPG.A%3BAU.A';
        //$tmp_param = 'fieldCount=2&action=search&product=WOS&search_mode=GeneralSearch&SID='.$tmp_sid.'&max_field_count=25&max_field_notice=%E6%B3%A8%E6%84%8F%3A+%E6%97%A0%E6%B3%95%E6%B7%BB%E5%8A%A0%E5%8F%A6%E4%B8%80%E5%AD%97%E6%AE%B5%E3%80%82&input_invalid_notice=%E6%A3%80%E7%B4%A2%E9%94%99%E8%AF%AF%3A+%E8%AF%B7%E8%BE%93%E5%85%A5%E6%A3%80%E7%B4%A2%E8%AF%8D%E3%80%82&exp_notice=%E6%A3%80%E7%B4%A2%E9%94%99%E8%AF%AF%3A+%E4%B8%93%E5%88%A9%E6%A3%80%E7%B4%A2%E8%AF%8D%E5%8F%AF%E5%9C%A8%E5%A4%9A%E4%B8%AA%E5%AE%B6%E6%97%8F%E4%B8%AD%E6%89%BE%E5%88%B0+%28&input_invalid_notice_limits=+%3Cbr%2F%3E%E6%B3%A8%3A+%E6%BB%9A%E5%8A%A8%E6%A1%86%E4%B8%AD%E6%98%BE%E7%A4%BA%E7%9A%84%E5%AD%97%E6%AE%B5%E5%BF%85%E9%A1%BB%E8%87%B3%E5%B0%91%E4%B8%8E%E4%B8%80%E4%B8%AA%E5%85%B6%E4%BB%96%E6%A3%80%E7%B4%A2%E5%AD%97%E6%AE%B5%E7%9B%B8%E7%BB%84%E9%85%8D%E3%80%82&sa_params=WOS%7C%7C'.$tmp_sid.'%7Chttp%3A%2F%2Fapps.webofknowledge.com%7C%27&formUpdated=true&value%28input1%29='.$key.'&value%28select1%29=AU&value%28hidInput1%29=&value%28bool_1_2%29=AND&value%28input2%29='.$key2.'&value%28select2%29=AD&x=912&y=375&value%28hidInput2%29=&limitStatus=collapsed&ss_lemmatization=On&ss_spellchecking=Suggest&SinceLastVisit_UTC=&SinceLastVisit_DATE=&period=Range+Selection&range=ALL&startYear=1986&endYear=2017&editions=SCI&editions=SSCI&editions=ISTP&editions=ISSHP&editions=CCR&editions=IC&update_back2search_link_param=yes&ssStatus=display%3Anone&ss_showsuggestions=ON&ss_numDefaultGeneralSearchFields=1&ss_query_language=&rs_sort_by=PY.D%3BLD.D%3BSO.A%3BVL.D%3BPG.A%3BAU.A';
        //$tmp_param = 'fieldCount=2&action=search&product=WOS&search_mode=GeneralSearch&SID='.$tmp_sid.'&max_field_count=25&max_field_notice=%E6%B3%A8%E6%84%8F%3A+%E6%97%A0%E6%B3%95%E6%B7%BB%E5%8A%A0%E5%8F%A6%E4%B8%80%E5%AD%97%E6%AE%B5%E3%80%82&input_invalid_notice=%E6%A3%80%E7%B4%A2%E9%94%99%E8%AF%AF%3A+%E8%AF%B7%E8%BE%93%E5%85%A5%E6%A3%80%E7%B4%A2%E8%AF%8D%E3%80%82&exp_notice=%E6%A3%80%E7%B4%A2%E9%94%99%E8%AF%AF%3A+%E4%B8%93%E5%88%A9%E6%A3%80%E7%B4%A2%E8%AF%8D%E5%8F%AF%E5%9C%A8%E5%A4%9A%E4%B8%AA%E5%AE%B6%E6%97%8F%E4%B8%AD%E6%89%BE%E5%88%B0+%28&input_invalid_notice_limits=+%3Cbr%2F%3E%E6%B3%A8%3A+%E6%BB%9A%E5%8A%A8%E6%A1%86%E4%B8%AD%E6%98%BE%E7%A4%BA%E7%9A%84%E5%AD%97%E6%AE%B5%E5%BF%85%E9%A1%BB%E8%87%B3%E5%B0%91%E4%B8%8E%E4%B8%80%E4%B8%AA%E5%85%B6%E4%BB%96%E6%A3%80%E7%B4%A2%E5%AD%97%E6%AE%B5%E7%9B%B8%E7%BB%84%E9%85%8D%E3%80%82&sa_params=WOS%7C%7C'.$tmp_sid.'%7Chttp%3A%2F%2Fapps.webofknowledge.com%7C%27&formUpdated=true&value%28input1%29='.$key.'&value%28select1%29=AU&value%28hidInput1%29=&value%28bool_1_2%29=AND&value%28input2%29='.$key2.'&value%28select2%29=TS&x=874&y=363&value%28hidInput2%29=&limitStatus=collapsed&ss_lemmatization=On&ss_spellchecking=Suggest&SinceLastVisit_UTC=&SinceLastVisit_DATE=&period=Range+Selection&range=ALL&startYear=1986&endYear=2017&editions=SCI&editions=SSCI&editions=ISTP&editions=ISSHP&editions=CCR&editions=IC&update_back2search_link_param=yes&ssStatus=display%3Anone&ss_showsuggestions=ON&ss_numDefaultGeneralSearchFields=1&ss_query_language=&rs_sort_by=PY.D%3BLD.D%3BSO.A%3BVL.D%3BPG.A%3BAU.A';
        $this->cnt		= $this->vcurl($tmp_url,$tmp_param,'','','','','','0');
		//print_r($this->cnt);exit;
	 }

	 function daochu()
	 {
		$qid			= '';
		$tmp_sid		= $this->tmp_sid;
		//echo $tmp_sid;exit;
		$cnt	= $this->cnt;
	    //echo $cnt;exit;
		preg_match_all('/&qid=(.*)&/siU',$cnt,$qid);
		//print_r($qid);exit;
		$qid			= $qid[1][0];
		$start = '1';
		
		$author = $this->key;
		$address = $this->key2;
		//echo $qid,$author,$address;exit;
		//$pagesize		= 10;
            
		//获取总页数
		 $end			= '';
		preg_match_all("/id='footer_formatted_count'>(.*)</siU",$cnt,$num);
		$end			= trim(strip_tags($num[1][0]));
			
			$tmp_url		= 'http://apps.webofknowledge.com/OutboundService.do?action=go&&';
			//(全记录与引用的参考文献txt)
			$tmp_param = 'displayCitedRefs=true&displayTimesCited=true&displayUsageInfo=true&viewType=summary&product=WOS&rurl=http%253A%252F%252Fapps.webofknowledge.com%252Fsummary.do%253FSID%253D'.$tmp_sid.'%2526product%253DWOS%2526qid%253D40%2526search_mode%253DGeneralSearch&mark_id=WOS&colName=WOS&search_mode=GeneralSearch&locale=zh_CN&view_name=WOS-summary&sortBy=PY.D%3BLD.D%3BSO.A%3BVL.D%3BPG.A%3BAU.A&mode=OpenOutputService&qid='.$qid.'&SID='.$tmp_sid.'&format=saveToFile&filters=PMID+USAGEIND+AUTHORSIDENTIFIERS+ACCESSION_NUM+FUNDING+SUBJECT_CATEGORY+JCR_CATEGORY+LANG+IDS+PAGEC+SABBR+CITREFC+ISSN+PUBINFO+KEYWORDS+CITTIMES+ADDRS+CONFERENCE_SPONSORS+DOCTYPE+ABSTRACT+CONFERENCE_INFO+SOURCE+TITLE+AUTHORS++&selectedIds=&mark_to='.$end.'&mark_from='.$start.'&queryNatural=%3Cb%3E%E4%BD%9C%E8%80%85%3A%3C%2Fb%3E+%28'.$author.'%29+%3Ci%3EAND%3C%2Fi%3E+%3Cb%3E%E4%B8%BB%E9%A2%98%3A%3C%2Fb%3E+%28'.$address.'%29&count_new_items_marked=0&use_two_ets=false&IncitesEntitled=no&value%28record_select_type%29=range&fields_selection=PMID+USAGEIND+AUTHORSIDENTIFIERS+ACCESSION_NUM+FUNDING+SUBJECT_CATEGORY+JCR_CATEGORY+LANG+IDS+PAGEC+SABBR+CITREFC+ISSN+PUBINFO+KEYWORDS+CITTIMES+ADDRS+CONFERENCE_SPONSORS+DOCTYPE+ABSTRACT+CONFERENCE_INFO+SOURCE+TITLE+AUTHORS++&save_options=fieldtagged&markFrom='.$start.'&markTo='.$end;
            $cnt			= $this->vcurl($tmp_url,$tmp_param,'','','','','','0');
            //print_r($cnt);exit;   
			//判断内容正确性
			if(preg_match('/FN Thomson/siU',$cnt))
			{
			    $str = str_replace('%2C', '', $author);
			    $str2 = str_replace('%2C', '', $address);
			    $path = __DIR__.'/cachesci/'.'wos_'.$str.'_'.$str2.'.txt';
			    //echo $path;exit;
				file_put_contents($path, $cnt);
				echo '>>>>>>>>'.$author.$address.'<br>';
				//flush();
			}else{
			    
			   echo '>>>>>>>>>false'.'<br>';
			    //flush();
			}
			
	 }

	//按照刊抓取wos期刊文章
	function run()
	{
		$this->getCounSession();
		$this->search();
		$this->daochu();
	}
}
$test=new wos();
$test->run();
