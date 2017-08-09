<?php
class get_jpet_aspetjournals_org_pdf extends base
{
	function getPdf($url = '', $Domain = '', $docid = '')
	{
	    //echo $url;exit;
	    $cnt	= $this->pcurl($url,'','__cfduid=d779f846b9183900f58a45947313d15991480388142; cf_clearance=1f9f060f32c1ccfca42209ccb7f894e2844c0d71-1480388149-1800; has_js=1; _ga=GA1.2.1855969092.1480388123');
		preg_match_all('/link rel="alternate.*href="(.*)"/siU',$cnt,$arr);
		$pdfUrl	= $this->chulistring2($arr[1][0]);
		if(!empty($pdfUrl))
		{
		    $pdfUrl	= 'http://jpet.aspetjournals.org'.$pdfUrl;
			$cnt	= $this->pcurl($pdfUrl,'','__cfduid=d779f846b9183900f58a45947313d15991480388142; cf_clearance=1f9f060f32c1ccfca42209ccb7f894e2844c0d71-1480388149-1800; has_js=1; _ga=GA1.2.1855969092.1480388123');
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
