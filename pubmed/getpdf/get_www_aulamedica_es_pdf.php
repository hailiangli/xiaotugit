<?php
class get_www_aulamedica_es_pdf extends base
{
	function getPdf($url = '', $Domain = '', $docid = '')
	{
		//echo $url;exit;
		if(!empty($url))
		{
		    //$pdfUrl	= 'http://www.jiaci.org'.$pdfUrl;
			$cnt	= $this->pcurl($url);
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
			return 405;
		}
		
	}
}
