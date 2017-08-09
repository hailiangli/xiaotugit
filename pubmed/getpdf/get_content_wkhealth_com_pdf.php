<?php
class get_content_wkhealth_com_pdf extends base
{
	function getPdf($url = '', $Domain = '', $docid = '')
	{
//http://ovidsp.tx.ovid.com/sp-3.22.1b/ovidweb.cgi?WebLinkFrameset=1&S=CIONFPFGMIDDAMDHNCHKNDJCCDHCAA00&returnUrl=ovidweb.cgi%3fMain%2bSearch%2bPage%3d1%26S%3dCIONFPFGMIDDAMDHNCHKNDJCCDHCAA00&directlink=http%3a%2f%2fovidsp.tx.ovid.com%2fovftpdfs%2fFPDDNCJCNDDHMI00%2ffs046%2fovft%2flive%2fgv023%2f00007632%2f00007632-900000000-95902.pdf&filename=Life+Expectancy+after+Cervical+en+bloc+Laminoplasty%3a+Analysis+of+Data+following+more+than+20+Years.&navigation_links=NavLinks.S.sh.22.3&link_from=S.sh.22%7c3&pdf_key=FPDDNCJCNDDHMI00&pdf_index=/fs046/ovft/live/gv023/00007632/00007632-900000000-95902&D=yrovft&link_set=S.sh.22|3|sl_10|resultSet|S.sh.22.26|0	    
	    
//http://content.wkhealth.com/linkback/openurl?sid=WKPTLP:landingpage&an=00001721-900000000-98765
        $an = substr($url, '-24');
		$pdfUrl = 'http://ovidsp.tx.ovid.com/ovftpdfs/FPDDNCJCABHCBH00/fs046/ovft/live/gv023/00001813/'.$an.'.pdf';
		$cnt = $this->pcurl($pdfUrl, '', 'AMCV_wolterskluwermedical%40AdobeOrg=1256414278%7CMCMID%7C22101765383839625620028665736136286985%7CMCAID%7CNONE; s_fid=75A194D5D002952D-2AAE4E13C27D179D; s_sq=%5B%5BB%5D%5D; s_cc=true');
		echo $cnt;exit;
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
