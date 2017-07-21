<?php
/*
pubmed搜索接口
search_list($keywords,$action=array(),$sorttype,$page,$pagesize=20)
http://pubmed.cc/pubmed_interface/controller.php?control=search&action=search_list&keywords=life&act=&page=1&sorttype=2
*/
class control extends base
{
	function search_list()
	{
	    //echo 132132;exit;
		$this->page		= $_REQUEST['page'];
		$page	        = $this->page;
		$sorttype	    = $_REQUEST['sorttype'];
		$action			= $_REQUEST['act'];
		$this->pagesize	= 20;
		$keycom			= urlencode($_REQUEST['keywords']);//高级检索前台用户填写检索词
		//echo $keycom;exit;
		/*******排序*******/
		switch($sorttype)
		{
			case 1:
				$px	= "";break;
			case 2:
				$px	= "[relevance]";break;
			case 3:
				$px	= "PublicationDate";break;
			case 4:
				$px	= "Author";break;
			case 5:
				$px	= "LastAuthor";break;
			case 6:
				$px	= "JournalName";break;
			case 7:
				$px	= "Title";break;
			default:
				$px	= "";break;
		}
		
		$px		= urlencode($px);
		$px2	= $px;
		//echo $px2;exit;
		if(!empty($action))
		{
		    //echo $action;exit;
			/* foreach($action as $key=>$value)
			{
				$jlstring	.= implode(';',$value).';';
			}
			$jlstring	= urlencode(preg_replace('/;$/siU','',$jlstring)); */
		    $jlstring = $action;
			//echo $jlstring;exit;
			if($page==1)
			{
				$tmp_url	= 'https://www.ncbi.nlm.nih.gov/pubmed';
				$tmp_param	= 'https://www.ncbi.nlm.nih.gov/pubmed?term='.$keycom.'+&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.PreviousPageName=results&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.SpecialPageName=&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetsUrlFrag=filters%3D%3B'.$jlstring.'&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetSubmitted=true&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.BMFacets=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort=&email_format=docsum&email_sort=&email_count=20&email_start=1&email_address=&email_subj=life+-+PubMed&email_add_text=&EmailCheck1=&EmailCheck2=&coll_start=1&citman_count=20&citman_start=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Presentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Sort='.$px2.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Format=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevSort=&CollectionStartIndex=1&CitationManagerStartIndex=1&CitationManagerCustomRange=false&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.CurrPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.ResultCount=1049458&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.RunLastQuery=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize2=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort2='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort2=&email_format2=docsum&email_sort2=&email_count2=20&email_start2=1&email_address2=&email_subj2=life+-+PubMed&email_add_text2=&EmailCheck1=&EmailCheck2=&coll_start2=1&citman_count2=20&citman_start2=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailReport=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailCount=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailStart=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Email=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSubject=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailText=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailQueryKey=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailHID=1DQKMXIzOF_4GEPhCZOdONIeSmpj8qg3i5m9v8eti7vMpdgFxja5p_LjMMAgFEWJLNA5SAHzVbi3tk41Pwsn2XRo3_KV13OkN&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.QueryDescription=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Key=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Answer=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Holding=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingFft=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingNdiSet=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.OToolValue=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.SubjectList=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.CurrTimelineYear=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.BlobID=NCID_1_360318965_130.14.22.215_9001_1438753823_1418884895_0MetA0_S_MegaStore_F_1&EntrezSystem2.PEntrez.DbConnector.Db=pubmed&EntrezSystem2.PEntrez.DbConnector.LastDb=pubmed&EntrezSystem2.PEntrez.DbConnector.Term='.$keycom.'&EntrezSystem2.PEntrez.DbConnector.LastTabCmd=&EntrezSystem2.PEntrez.DbConnector.LastQueryKey='.$_SESSION['ncbi_pubmed_LastQueryKey'].'&EntrezSystem2.PEntrez.DbConnector.IdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LastIdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LinkName=&EntrezSystem2.PEntrez.DbConnector.LinkReadableName=&EntrezSystem2.PEntrez.DbConnector.LinkSrcDb=&EntrezSystem2.PEntrez.DbConnector.Cmd=search&EntrezSystem2.PEntrez.DbConnector.TabCmd=&EntrezSystem2.PEntrez.DbConnector.QueryKey=&p%24a=&p%24l=EntrezSystem2&p%24st=pubmed';

				$tmp_content=$this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','80','','dd');
				$this->WebJx2($tmp_content);
				//$this->daochu($tmp_content);

				preg_match_all('/<input name="EntrezSystem2\.PEntrez\.DbConnector\.LastQueryKey".*value="(.*)" \/>/siU',$tmp_content,$key);
				$_SESSION['ncbi_pubmed_LastQueryKey']=$key[1][0];
			}
			else
			{
				$tmp_url='https://www.ncbi.nlm.nih.gov/pubmed';
				$tmp_param	= 'term='.$keycom.'&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.PreviousPageName=results&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.SpecialPageName=&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetsUrlFrag=filters%3D&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetSubmitted=false&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.BMFacets=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort=&email_format=docsum&email_sort=&email_count=20&email_start=1&email_address=&email_subj=life+-+PubMed&email_add_text=&EmailCheck1=&EmailCheck2=&coll_start=1&citman_count=20&citman_start=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Presentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Sort='.$px2.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Format=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevSort=&CollectionStartIndex=1&CitationManagerStartIndex=1&CitationManagerCustomRange=false&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.CurrPage='.$page.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.ResultCount=1046428&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.RunLastQuery=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize2=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort2=none&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort2=&email_format2=docsum&email_sort2=&email_count2=20&email_start2=1&email_address2=&email_subj2=life+-+PubMed&email_add_text2=&EmailCheck1=&EmailCheck2=&coll_start2=1&citman_count2=20&citman_start2=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailReport=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailCount=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailStart=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Email=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSubject=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailText=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailQueryKey=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailHID=1Da7F382F_SXRpzNqrzfFRK8YXLlSCTTXLRmHTl5em5h7v0sOCDpIY0kYFGRZQLqA3I4xfj5zqj8uviX2UHp3JPy1T42vatQ6&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.QueryDescription=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Key=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Answer=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Holding=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingFft=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingNdiSet=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.OToolValue=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.SubjectList=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.CurrTimelineYear=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.BlobID=NCID_1_180291629_130.14.22.215_9001_1437700970_1541711030_0MetA0_S_MegaStore_F_1&EntrezSystem2.PEntrez.DbConnector.Db=pubmed&EntrezSystem2.PEntrez.DbConnector.LastDb=pubmed&EntrezSystem2.PEntrez.DbConnector.Term=life&EntrezSystem2.PEntrez.DbConnector.LastTabCmd=&EntrezSystem2.PEntrez.DbConnector.LastQueryKey='.$_SESSION['ncbi_pubmed_LastQueryKey'].'&EntrezSystem2.PEntrez.DbConnector.IdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LastIdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LinkName=&EntrezSystem2.PEntrez.DbConnector.LinkReadableName=&EntrezSystem2.PEntrez.DbConnector.LinkSrcDb=&EntrezSystem2.PEntrez.DbConnector.Cmd=PageChanged&EntrezSystem2.PEntrez.DbConnector.TabCmd=&EntrezSystem2.PEntrez.DbConnector.QueryKey=&p%24a=EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.Page&p%24l=EntrezSystem2&p%24st=pubmed';
				$tmp_content=$this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','80','','dd');
				$this->WebJx2($tmp_content);
				//$this->daochu($tmp_content);
			}
		}
		else
		{	
		    //echo 123213;exit;
		    //echo $page;exit;
			if($page==1)
			{	
			    //echo $px;exit;     
				if(empty($px))
				{	
				    //echo 'fsdfds';exit;
					$_SESSION['pubmedcookie'] = 'cache_file/pubcookie.'.rand(000000,999999).'.txt';
					//print_r($_SESSION['pubmedcookie']);exit;
					$tmp_url		= 'https://www.ncbi.nlm.nih.gov/pubmed/?term='.$keycom;	
				    //echo $tmp_url;exit;
					$tmp_content	= $this->vcurl($tmp_url,'','',$_SESSION['pubmedcookie'],'','40','','dfds');
		            //echo  $tmp_content;exit;
					preg_match_all('/<input name="EntrezSystem2\.PEntrez\.DbConnector\.LastQueryKey".*value="(.*)" \/>/siU',$tmp_content,$key);
					//echo $key[1][0];exit;
					$_SESSION['ncbi_pubmed_LastQueryKey']=$key[1][0];
					$this->WebJx2($tmp_content);
					//unlink($_SESSION['pubmedcookie']);
					//$this->daochu($tmp_content);
				}
				else
				{
					$tmp_url	= 'https://www.ncbi.nlm.nih.gov/pubmed';
					$tmp_param	= 'term='.$keycom.'&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.PreviousPageName=results&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.SpecialPageName=&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetsUrlFrag=filters%3D&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetSubmitted=false&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.BMFacets=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort='.$px.'&email_format=docsum&email_sort=%5Brelevance%5D&email_count=20&email_start=1&email_address=&email_subj=life+-+PubMed&email_add_text=&EmailCheck1=&EmailCheck2=&coll_start=1&citman_count=20&citman_start=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Presentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Sort='.$px2.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastSort=%5Brelevance%5D&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileSort=%5Brelevance%5D&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Format=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevSort=%5Brelevance%5D&CollectionStartIndex=1&CitationManagerStartIndex=1&CitationManagerCustomRange=false&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.CurrPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.ResultCount=1050969&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.RunLastQuery=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize2=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort2=none&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort2=%5Brelevance%5D&email_format2=docsum&email_sort2=%5Brelevance%5D&email_count2=20&email_start2=1&email_address2=&email_subj2=life+-+PubMed&email_add_text2=&EmailCheck1=&EmailCheck2=&coll_start2=1&citman_count2=20&citman_start2=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailReport=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailCount=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailStart=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Email=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSubject=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailText=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailQueryKey=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailHID=1PQSMQPtQsizuz-o8vgchVrDrfnX9ciz88r51BDEVPZ41LNxH_PyY4LvOQ-7ueXDOvuJAR88r3IVNZ1mNCT7ILVavfq7mlH&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.QueryDescription=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Key=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Answer=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Holding=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingFft=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingNdiSet=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.OToolValue=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.SubjectList=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.CurrTimelineYear=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.BlobID=NCID_1_438897323_130.14.22.215_9001_1439256973_827875778_0MetA0_S_MegaStore_F_1&EntrezSystem2.PEntrez.DbConnector.Db=pubmed&EntrezSystem2.PEntrez.DbConnector.LastDb=pubmed&EntrezSystem2.PEntrez.DbConnector.Term='.$keycom.'&EntrezSystem2.PEntrez.DbConnector.LastTabCmd=&EntrezSystem2.PEntrez.DbConnector.LastQueryKey=1&EntrezSystem2.PEntrez.DbConnector.IdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LastIdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LinkName=&EntrezSystem2.PEntrez.DbConnector.LinkReadableName=&EntrezSystem2.PEntrez.DbConnector.LinkSrcDb=&EntrezSystem2.PEntrez.DbConnector.Cmd=displaychanged&EntrezSystem2.PEntrez.DbConnector.TabCmd=&EntrezSystem2.PEntrez.DbConnector.QueryKey=&p%24a=EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort&p%24l=EntrezSystem2&p%24st=pubmed';


	
					//echo $tmp_param;exit;
					$tmp_content	= $this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','80','','dd');	
					//echo $tmp_content;exit;
					if(preg_match('/Error \- PubMed/siU',$tmp_content))
					{
						//echo 'dddddddd';exit;
					$_SESSION['pubmedcookie']	= 'cache_file/pubcookie.'.rand(000000,999999).'.txt';
					$tmp_url		= 'https://www.ncbi.nlm.nih.gov/pubmed/?term='.$keycom;
					$this->vcurl($tmp_url,'','',$_SESSION['pubmedcookie'],'','80','','dd');
					$tmp_content=$this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','80','','dd');
					}else{}
					$this->WebJx2($tmp_content);
					//$this->daochu($tmp_content);
				}
			}
			else
			{	
			    //echo 'page2';exit;
				$tmp_url='https://www.ncbi.nlm.nih.gov/pubmed';
				//$tmp_param	= 'term='.$keycom.'&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.PreviousPageName=results&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.SpecialPageName=&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetsUrlFrag=filters%3D&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetSubmitted=false&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.BMFacets=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort=&email_format=docsum&email_sort=&email_count=20&email_start=1&email_address=&email_subj=life+-+PubMed&email_add_text=&EmailCheck1=&EmailCheck2=&coll_start=1&citman_count=20&citman_start=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Presentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Sort='.$px2.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Format=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevSort=&CollectionStartIndex=1&CitationManagerStartIndex=1&CitationManagerCustomRange=false&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.CurrPage='.$page.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.ResultCount=1046428&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.RunLastQuery=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize2=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort2=none&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort2=&email_format2=docsum&email_sort2=&email_count2=20&email_start2=1&email_address2=&email_subj2=life+-+PubMed&email_add_text2=&EmailCheck1=&EmailCheck2=&coll_start2=1&citman_count2=20&citman_start2=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailReport=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailCount=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailStart=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Email=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSubject=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailText=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailQueryKey=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailHID=1Da7F382F_SXRpzNqrzfFRK8YXLlSCTTXLRmHTl5em5h7v0sOCDpIY0kYFGRZQLqA3I4xfj5zqj8uviX2UHp3JPy1T42vatQ6&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.QueryDescription=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Key=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Answer=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Holding=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingFft=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingNdiSet=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.OToolValue=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.SubjectList=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.CurrTimelineYear=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.BlobID=NCID_1_180291629_130.14.22.215_9001_1437700970_1541711030_0MetA0_S_MegaStore_F_1&EntrezSystem2.PEntrez.DbConnector.Db=pubmed&EntrezSystem2.PEntrez.DbConnector.LastDb=pubmed&EntrezSystem2.PEntrez.DbConnector.Term=life&EntrezSystem2.PEntrez.DbConnector.LastTabCmd=&EntrezSystem2.PEntrez.DbConnector.LastQueryKey='.$_SESSION['ncbi_pubmed_LastQueryKey'].'&EntrezSystem2.PEntrez.DbConnector.IdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LastIdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LinkName=&EntrezSystem2.PEntrez.DbConnector.LinkReadableName=&EntrezSystem2.PEntrez.DbConnector.LinkSrcDb=&EntrezSystem2.PEntrez.DbConnector.Cmd=PageChanged&EntrezSystem2.PEntrez.DbConnector.TabCmd=&EntrezSystem2.PEntrez.DbConnector.QueryKey=&p%24a=EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.Page&p%24l=EntrezSystem2&p%24st=pubmed';	
				$tmp_param	= 'term='.$keycom.'+&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.PreviousPageName=results&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.SpecialPageName=&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetsUrlFrag=filters%3D&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetSubmitted=false&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.BMFacets=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort=&email_format=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.email_sort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.email_count=20&email_start=1&email_address=&email_subj=life+-+PubMed&email_add_text=&EmailCheck1=&EmailCheck2=&coll_start=1&citman_count=20&citman_start=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Presentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Sort='.$px2.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Format=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevSort=&CollectionStartIndex=1&CitationManagerStartIndex=1&CitationManagerCustomRange=false&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.ResultCount=1206119&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.RunLastQuery=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_Pager.CurrPage='.$page.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailReport=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailCount=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailStart=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Email=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSubject=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailText=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailQueryKey=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailHID=1RIFUXIyWGGdNAOBUGITTP0pDENPFVBDYXk5iZXQOM47LAXUPDJiCQwhkAXLWRHnBRL_HZJLI2DqC3FARGSbAGDIID3CM3O9BO&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.QueryDescription=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Key=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Answer=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Holding=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingFft=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingNdiSet=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.OToolValue=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.SubjectList=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.CurrTimelineYear=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.BlobID=NCID_1_27558349_130.14.18.34_9001_1487035389_1003298567_0MetA0_S_MegaStore_F_1&EntrezSystem2.PEntrez.DbConnector.Db=pubmed&EntrezSystem2.PEntrez.DbConnector.LastDb=pubmed&EntrezSystem2.PEntrez.DbConnector.Term=life&EntrezSystem2.PEntrez.DbConnector.LastTabCmd=&EntrezSystem2.PEntrez.DbConnector.LastQueryKey='.$_SESSION['ncbi_pubmed_LastQueryKey'].'&EntrezSystem2.PEntrez.DbConnector.IdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LastIdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LinkName=&EntrezSystem2.PEntrez.DbConnector.LinkReadableName=&EntrezSystem2.PEntrez.DbConnector.LinkSrcDb=&EntrezSystem2.PEntrez.DbConnector.Cmd=PageChanged&EntrezSystem2.PEntrez.DbConnector.TabCmd=&EntrezSystem2.PEntrez.DbConnector.QueryKey=&p%24a=EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_Pager.Page&p%24l=EntrezSystem2&p%24st=pubmed';
				
				$tmp_content=$this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','80','','dd');
                //echo $tmp_content;exit;
				if(preg_match('/Error \- PubMed/siU',$tmp_content))
				{

					$_SESSION['pubmedcookie']	= 'cache_file/pubcookie.'.rand(000000,999999).'.txt';
					$tmp_url		= 'https://www.ncbi.nlm.nih.gov/pubmed/?term='.$keycom;
					$this->vcurl($tmp_url,'','',$_SESSION['pubmedcookie'],'','80','','dd');
					$tmp_content=$this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','80','','dd');
				}else{}
				$this->WebJx2($tmp_content);
				//$this->daochu($tmp_content);
			}
		}
	}
	
	//相似文献
	function similar_article(){
	    $url			= $_REQUEST['pmid'];
	    $this->page		= $_REQUEST['page'];
	    $page	        = $this->page;
	    $sorttype	    = $_REQUEST['sorttype'];
	    switch($sorttype)
	    {
	        case 1:
	            $px	= "";break;
	        case 2:
	            $px	= "[relevance]";break;
	        case 3:
	            $px	= "PublicationDate";break;
	        case 4:
	            $px	= "Author";break;
	        case 5:
	            $px	= "LastAuthor";break;
	        case 6:
	            $px	= "JournalName";break;
	        case 7:
	            $px	= "Title";break;
	        default:
	            $px	= "";break;
	    }
	    
	    $px		= urlencode($px);
	    $px2	= $px;
	    
	    if($page==1)
	    {
	        //echo $px;exit;
	        if(empty($px))
	        {
				$tmp_url	= 'https://www.ncbi.nlm.nih.gov/pubmed?linkname=pubmed_pubmed&from_uid='.$url;
	            
	            $tmp_content	= $this->vcurl($tmp_url,'','','','','40','','dfds');
	            $this->WebJx2($tmp_content);
	        }
	        
	    }
	    
	    
	}
	//直接在网页上拿数据解析
	function WebJx2($tmp_content='')
	{
		//one num    --/>See 1 citation found by title matching your search:</siU
	    preg_match_all('/name="ncbi_resultcount.*content="(.*)"/siU', $tmp_content, $arra);
	    //echo '<pre>';
	    //print_r($arra);exit;
	    //echo $arra[1][0];exit;
		if($arra[1][0] == 1)
		{
			$fun_pagenum='1';
			$this->result_contents['totalnum']	= $fun_pagenum;
			$tmp_array	= array();
			preg_match_all('/<title>(.*)\- PubMed \- NCBI.*<\/title>/siU',$tmp_content,$arr10);
			$tmp_array['title']	= trim(strip_tags($arr10[1][0]));
            //echo $tmp_array['title'];exit;
			preg_match_all('/<div class="auths">(.*)<\/div>/siU',$tmp_content,$arr10);
			$tmp_array['author']	= trim(strip_tags($arr10[1][0]));

			preg_match_all('/PMID:<\/dt>(.*)<\/dd>/siU',$tmp_content,$arr10);
			$tmp_array['url']	= trim(strip_tags($arr10[1][0]));

			preg_match_all('/doi:(.*)" \/>/siU',$tmp_content,$arr10);
			$tmp_array['doi']	= trim(strip_tags($arr10[1][0]));	

			preg_match_all('/class="cit">(.*)<\/div>/siU',$tmp_content,$arr10);
			$tmp_array['source']	= trim(strip_tags($arr10[1][0]));

			$tmp_array['simiar']	= 'https://www.ncbi.nlm.nih.gov/pubmed?linkname=pubmed_pubmed&from_uid='.$tmp_array['url'];
			//preg_match_all('/class="status_icon nohighlight.*>(.*)<\/a>/siU',$arr[0][$i],$arr10);
			//$tmp_array['free_article']	= trim(strip_tags($arr10[1][0]));
			$this->result_contents['backdata'][0]	= $tmp_array;
		}
		else
		{	
		    //echo 'fffff';exit;
			preg_match_all('/<meta name="ncbi_resultcount" content="(.*)" \/>/siU',$tmp_content,$p);
			$fun_pagenum	= trim(strip_tags($p[1][0]));
			$this->result_contents['totalnum']	= $fun_pagenum;
			preg_match_all('/class="rslt">.*<p class="links nohighlight">/siU',$tmp_content,$arr);
            //print_r($arr);exit;
			for($i=0;$i<count($arr[0]);$i++)
			{
				$tmp_array	= array();
				preg_match_all('/href=.*>(.*)<\/a>/siU',$arr[0][$i],$arr10);
				$tmp_array['title']	= trim(strip_tags($arr10[1][0]));
				preg_match_all('/<p class="desc">(.*)<\/p>/siU',$arr[0][$i],$arr10);
				$tmp_array['author']	= trim(strip_tags($arr10[1][0]));
				preg_match_all('/>PMID:<\/dt>(.*)<\/dd>/siU',$arr[0][$i],$arr10);
				$tmp_array['url']	= trim(strip_tags($arr10[1][0]));
				preg_match_all('/<p class="details">(.*)<\/p>/siU',$arr[0][$i],$arr10);
				$tmp_array['source']	= trim(strip_tags($arr10[1][0]));

				$tmp_array['simiar']	= 'https://www.ncbi.nlm.nih.gov/pubmed?linkname=pubmed_pubmed&from_uid='.$tmp_array['url'];
				preg_match_all('/doi:(.*)</siU',$arr[0][$i],$arr10);	
				$tmp_array['doi']	= $this->execDoi($arr10[1][0]);
				preg_match_all('/class="status_icon nohighlight.*>(.*)<\/a>/siU',$arr[0][$i],$arr10);
				$tmp_array['free_article']	= trim(strip_tags($arr10[1][0]));
				
				$this->result_contents['backdata'][$i]	= $tmp_array;		
			}	
			$tmp_link="https://www.ncbi.nlm.nih.gov/";				
			
		}
		
		$this->result_contents['page_message'] = array
		(
				'pages'			=>	ceil($this->result_contents['totalnum']/$this->pagesize),//总页数
				'page_now'		=>	$this->page,//当前页数
				'total_nums'	=>	$this->result_contents['totalnum'],//总记录数
				'page_size'		=>	$this->pagesize,//每页记录数
		);
	}
	
	function execDoi($string)
	{
		$string	= preg_replace('/\[.*$/siU','',$string);
		$string	= trim(str_replace('. eCollection 2015','',$string));
		$string	= preg_replace('/\. Epub.*$/siU','',$string);
		$string	= preg_replace('/\.$/siU','',$string);
		$string	= preg_replace('/\. .*$/siU','',$string);	
		return $string;
	}


	function Del_space($str){
		$str=preg_replace('/	/siU','',trim($str));
		for($i=0;$i<strlen($str);$i++){
			if($i==0){
				$b=substr($str,$i,1);
			}else{
				if($str[$i]==" "){
					if($str[$i-1]!=" ")
						$b.=substr($str,$i,1);
				}else
					$b.=substr($str,$i,1);
			}
		}
		return $b;	
	}
	function con_replace($str){
		$patterns[0] = '/	/'; 
		$patterns[1] = '/\n/';
		$patterns[2] = '/\r/';
		$patterns[3] = '/&nbsp;/';
		$replacements[0] = ' '; 
		$replacements[1] = ' ';
		$replacements[2] = ' ';
		$replacements[3] = ' ';
		$arr=preg_replace($patterns, $replacements,$str); 
		return $arr;
	}	
}