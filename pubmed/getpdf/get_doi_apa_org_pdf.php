<?php
class get_doi_apa_org_pdf extends base
{
	function getPdf($url = '', $Domain = '', $docid = '', $doi = '')
	{
	    //echo $url;exit;
	    echo '114.55.176.118/pubmed/pdfdownload/IndianJMedRes144121-7694393_212223.pdf';exit;
	    $cnt	= $this->pcurl('http://web.a.ebscohost.com/ehost/results?sid=dce98f2e-1871-4436-a241-3bd23caa6557%40sessionmgr4008&vid=6&hid=4106&bquery='.$doi.'&bdata=JmRiPWE5aCZkYj1idGgmbGFuZz16aC1jbiZ0eXBlPTAmc2l0ZT1laG9zdC1saXZl');
		preg_match_all('/class="record-type html-ftwg.*href="(.*)"/siU',$cnt,$arr);
		$pdfUrl	= $this->chulistring2($arr[1][0]);
		//echo $pdfUrl;exit;
		if(!empty($pdfUrl))
		{
		    //$pdfUrl	= 'http://www.jiaci.org'.$pdfUrl;
			$cnt	= $this->pcurl($pdfUrl);
			if(preg_match('/^(%PDF)/siU',$cnt))
			{
				return $cnt;
			}
			else
			{
				return 404;
			}
		}
		else
		{
			return 404;
		}
		
	}
}
