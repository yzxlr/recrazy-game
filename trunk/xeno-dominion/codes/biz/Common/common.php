<?php
	
	/*
	 * 功能： utf8 转  gbk(需iconv支持)
	 */
	function u2g($str){
		return iconv("UTF-8","GBK",$str);
	}
	
	/*
	 * 功能：gbk 转 utf8
	 */
	function g2u($str){
		return iconv("GBK","UTF-8",$str);
	}
	
	function nr($str){
		$str = str_replace(array("<nr/>","<rr/>"),array("\n","\r"),$str);
		return trim($str);
	}
	
	/*
	 * 功能：规则替换
	 */
	function getrole($str,$utf8){
		$str = (0 == $utf8) ? u2g($str) : $str;
		$str = str_replace(array("\n","\r"),array("<nr/>","<rr/>"),strtolower($str));
		$arr1 = array(
			'?',
			'"',
			'(',
			')',
			'[',
			']',
			'.',
			'/',
			':',
			'*',
			'||',
		);
		
		$arr2 = array(
			'\?',
			'\"',
			'\(',
			'\)',
			'\[',
			'\]',
			'\.',
			'\/',
			'\:',
			'.*?',
			'(.*?)',
			

		);
		return str_replace($arr1,$arr2,$str);
	}
	
	
	/*
	 * 
	 */
	function getrealurl($url,$i,$step,$isone=1){
		return 0 == $isone && 1 == $i ? str_replace("[page]","",$url) : str_replace("[page]",($i*$step),$url);
	}
	
	function getbaseurl($baseurl,$url){
		if("#" == $url){
			return "";
		}elseif(FALSE !== stristr($url,"http://")){
			return $url;
		}elseif( "/" == substr($url,0,1) ){
			$tmp = parse_url($baseurl);
			return $tmp["scheme"]."://".$tmp["host"].$url;
		}else{
			$tmp = pathinfo($baseurl);
			return $tmp["dirname"]."/".$url;
		}
	}
	
	function getfile($url){
		$content = file_get_contents($url);
		if(FALSE == $content){
			if (function_exists('curl_init')) {
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; zh-CN; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
				curl_setopt($curl, CURLOPT_HEADER, 0);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				$tmpInfo = curl_exec($curl);
				curl_close($curl);
				if(FALSE !== stristr($tmpInfo,"HTTP/1.1 200 OK")){ //正确返回数据
					return $tmpInfo;
				}else{
					return FALSE;
				}
			}else{
				// Non-CURL based version...
				 /*
				  $context =
					array('http' =>
						  array('method' => 'GET',
								'header' => 'Content-type: application/x-www-form-urlencoded'."\r\n".
											'User-Agent: Mozilla/5.0 (X11; U; Linux i686; zh-CN; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5'."\r\n".
											'Content-length: 0'),
								'content' => ""));
				  $contextid=stream_context_create($context);
				  $sock=fopen($url, 'r', false, $contextid);
				  if ($sock) {
					$tmpInfo='';
					while (!feof($sock))
					  $tmpInfo.=fgets($sock, 4096);

					fclose($sock);
					return $tmpInfo;
				  }else{
					return FALSE;
				  }*/
				  return false;
			}
		}else{
			return $content;
		}
	}
	
	function jsonmsg($msg,$type,$callback="no",$param=""){
		return json_encode(array("msg"=>$msg,"type"=>$type,"callback"=>$callback,"param"=>$param));
	}
	 
	 
	function uh($str){
		$farr = array(                                                                                           //过滤多余的空白
			"/<(\/?)(script|i?frame|style|html|body|title|link|meta|a|pre|object|\?|\%)([^>]*?)>/isU", //过滤 <scrīpt 等可能引入恶意内容或恶意改变显示布局的代码,如果不需要插入flash等,还可以加入<object的过滤
			"/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",                                      //过滤javascrīpt的on事件

		);
		$tarr = array(
			"",           //如果要直接清除不安全的标签，这里可以留空
			"\\1 \\2",
		);

		$str = preg_replace( $farr,$tarr,$str);
		return $str;
	}
	
	function getreplacerole($r1,$r2,$str,$utf8,$tags){
		if(1 == $tags){
			$str = strip_tags(trim($str));
		}else{
			$str = trim($str);
		}
		$a = array();
		foreach($r1 as $item){
			$a[] = "/".getrole($item,$utf8)."/isU";
		}
		return preg_replace($a,$r2,$str);
	}
	
	function getresult($head,$foot,$tmpContent,$utf8){
		$head = (0 == $utf8) ? u2g($head) : $head;
		$foot = (0 == $utf8) ? u2g($foot) : $foot;
		$tmpresult = stristr($tmpContent,$head);
		$sint = strlen($head);
		$eint = strpos($tmpresult,$foot);
		$tmpresult = substr($tmpresult,$sint,$eint);
		return $tmpresult;
	}
	
	function gifc( &$content)
	{
		//获取内容中图片
		//取得第一个匹配的图片路径
		$retimg="";
		$matches=null;
	   //标准的src="xxxxx"或者src='xxxxx'写法
		preg_match_all("/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i", $content, $matches);
		if(isset($matches[2])){
				$retimg=$matches[2];
				unset($matches);
				return $retimg;
		}
		//非标准的src=xxxxx 写法
		unset($matches);
		$matches=null;
		preg_match_all("/<\s*img\s+[^>]*?src\s*=\s*(.*?)[\s\"\'>][^>]*?\/?\s*>/i", $content, $matches);
		if(isset($matches[1])){
				$retimg=$matches[2];
		}
		unset($matches);
		return $retimg;
	} 
