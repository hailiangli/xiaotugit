<?php
class get_erj_ersjournals_com_pdf extends base
{
	function getPdf($url = '', $Domain = '', $docid = '')
	{
	    $cnt	= $this->pcurl($url,'','__utma=61876472.104940543.1480386028.1480386028.1480386028.1; __utmb=61876472.2.10.1480386028; __utmc=61876472; __utmz=61876472.1480386028.1.1.utmcsr=lib.njmu.edu.cn|utmccn=(referral)|utmcmd=referral|utmcct=/do/list.php; __cfduid=d2d9525f5575ab6ffb7e08ada8dbb02ce1480386175; cf_clearance=93d54c3f2976c875e093c9926e6afe1150dc67a6-1480386194-1800; has_js=1; _ga=GA1.2.104940543.1480386028; cookie-agreed=2');
		preg_match_all('/name="citation_pdf_url.*content="(.*)"/siU',$cnt,$arr);
		
		$pdfUrl	= $this->chulistring2($arr[1][0]);
		if(!empty($pdfUrl))
		{
		    //$pdfUrl	= 'http://www.jiaci.org'.$pdfUrl;
			$cnt	= $this->pcurl($pdfUrl,'','__utma=61876472.104940543.1480386028.1480386028.1480386028.1; __utmb=61876472.2.10.1480386028; __utmc=61876472; __utmz=61876472.1480386028.1.1.utmcsr=lib.njmu.edu.cn|utmccn=(referral)|utmcmd=referral|utmcct=/do/list.php; __cfduid=d2d9525f5575ab6ffb7e08ada8dbb02ce1480386175; cf_clearance=93d54c3f2976c875e093c9926e6afe1150dc67a6-1480386194-1800; has_js=1; _ga=GA1.2.104940543.1480386028; cookie-agreed=2');
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
