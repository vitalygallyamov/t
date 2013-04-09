<?php

	// проверка корректности email
	function emailCheck( $email ) {
		if ( @eregi( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$", $email ) ) { 
			return TRUE;
		} else { 
			return FALSE; 
		}
	}


	// убрать все спец символы из текста
	function stringSimple( $source )
	{
		$search = array (
			"'<script[^>]*?>.*?</script>'si",
			"'<[\/\!]*?[^<>]*?>'si",
			"'([\r\n])[\s]+'",
			"'&(quot|#34);'i",
			"'&(amp|#38);'i",
			"'&(lt|#60);'i",
			"'&(gt|#62);'i",
			"'&(nbsp|#160);'i",
			"'&(iexcl|#161);'i",
			"'&(cent|#162);'i",
			"'&(pound|#163);'i",
			"'&(copy|#169);'i",
			"'&#(\d+);'e"
		);

		$replace = array (
			"",
			"",
			"\\1",
			"\"",
			"&",
			"<",
			">",
			" ",
			chr(161),
			chr(162),
			chr(163),
			chr(169),
			"chr(\\1)"
		);
		$source = preg_replace( $search, $replace, $source );
		$source = htmlspecialchars( trim( strip_tags( $source ) ), ENT_QUOTES );
		return $source;
	}

	function auto_reklama()
	{
		$query="select content from auto_pages where id='8' ";
		$result=mysql_query($query);
		$number=mysql_numrows($result);
		for( $i=0;$i<$number;$i++ )
		{
			$content=mysql_result($result,$i,'content');
			print"<span class=color_white>$content</span>";
		}
	}

	function auto_news()
	{
		$query="select id, name, dat from auto_news order by dat desc, id desc limit 0, 3";
		$result=mysql_query($query);
		$number=mysql_numrows($result);
		if( $number!=0 ){ print"<div class=news_top></div><div class=news_middle>"; }
		for( $i=0;$i<$number;$i++ )
		{
			$id=mysql_result($result,$i,'id');
			$name=mysql_result($result,$i,'name');
			$date=date( "d.m.Y", mysql_result($result,$i,'dat') );
			print"<a href=auto.php?r=5&n=$id class=orange>$date</a><br>$name<br><br>";
		}
		if( $number!=0 ){ print"</div><div class=news_bottom></div>"; }
	}

	function menu( $r, $razdel )
	{
		print"<table width=220 class=button_small>
			<tr height=50><td width=60><a href=index.php?r=2 id=about "; if( $r==2 || $razdel==2 ){ print"class=item"; } print" ></a></td><td width=140><a href=index.php?r=2 "; if( $r==2 || $razdel==2 ){ print"class=item"; } print" >О компании</a></td><td width=20>&nbsp;</td></tr>
			<tr height=5><td colspan=2></td></tr>
			<tr height=50><td width=60><a href=index.php?r=4 id=drive "; if( $r==4 || $razdel==4 ){ print"class=item"; } print" ></a></td><td width=140><a href=index.php?r=4 "; if( $r==4 || $razdel==4 ){ print"class=item"; } print" >Расписание движения</a></td><td width=20>&nbsp;</td></tr>
			<tr height=5><td colspan=2></td></tr>
			<tr height=50><td width=60><a href=index.php?r=6 id=order "; if( $r==6 || $razdel==6 ){ print"class=item"; } print" ></a></td><td width=140><a href=index.php?r=6 "; if( $r==6 || $razdel==6 ){ print"class=item"; } print" >Заказ автобусов</a></td><td width=20>&nbsp;</td></tr>
			<tr height=5><td colspan=2></td></tr>
			<tr height=50><td width=60><a href=index.php?r=8 id=extras "; if( $r==8 || $razdel==8 ){ print"class=item"; } print" ></a></td><td width=140><a href=index.php?r=8 "; if( $r==8 || $razdel==8 ){ print"class=item"; } print" >Дополнительные услуги</a></td><td width=20>&nbsp;</td></tr>
			<tr height=5><td colspan=2></td></tr>
			<tr height=50><td width=60><a href=index.php?r=9 id=money "; if( $r==9 || $razdel==9 ){ print"class=item"; } print" ></a></td><td width=140><a href=index.php?r=9 "; if( $r==9 || $razdel==9 ){ print"class=item"; } print" >Снабжение, неликвиды</a></td><td width=20>&nbsp;</td></tr>
			<tr height=5><td colspan=2></td></tr>
			<tr height=50><td width=60><a href=index.php?r=7 id=carier "; if( $r==7 || $razdel==7 ){ print"class=item"; } print" ></a></td><td width=140><a href=index.php?r=7 "; if( $r==7 || $razdel==7 ){ print"class=item"; } print" >Карьера</a></td><td width=20>&nbsp;</td></tr>
			<tr height=5><td colspan=2></td></tr>
			<tr height=50><td width=60><a href=index.php?r=5 id=news "; if( $r==5 || $razdel==5 ){ print"class=item"; } print" ></a></td><td width=140><a href=index.php?r=5 "; if( $r==5 || $razdel==5 ){ print"class=item"; } print" >Новости</a></td><td width=20>&nbsp;</td></tr>
			<tr height=5><td colspan=2></td></tr>
			<tr height=50><td width=60><a href=index.php?r=3 id=contacts "; if( $r==3 || $razdel==3 ){ print"class=item"; } print" ></a></td><td width=140><a href=index.php?r=3 "; if( $r==3 || $razdel==3 ){ print"class=item"; } print" >Гостевая книга</a></td><td width=20>&nbsp;</td></tr>
			<tr height=5><td colspan=2></td></tr>
		</table>";
	}

	function menu_auto( $r )
	{
		$query="select id, name from auto_pages where razdel='0' and id<>'8' order by id";
		$result=mysql_query($query);
		$number=mysql_numrows($result);
		if( $number!=0 ){ print"<table width=944 align=center><tr><td class=auto_menu>"; }
		for( $i=0;$i<$number;$i++ )
		{
			$id=mysql_result($result,$i,'id');
			$name=mysql_result($result,$i,'name');
			$name2=str_replace( "<br>", " ", $name );
			print"<a href=auto.php?r=$id title='$name2' "; if( $r==$id ){ print"class=item"; } if( $i==$number-1 ){ print" style='background: transparent;' "; } print" >$name</a>";
		}
		if( $number!=0 ){ print"</td></tr></table>"; }
	}

	function submenu( $r )
	{
		$id=0;
		$razdel=0;
		$query="select razdel from pages where id='$r'";
		$result=mysql_query($query);
		$number=mysql_numrows($result);
		for( $i=0;$i<$number;$i++ )
		{
			$razdel=mysql_result($result,$i,'razdel');
		}

		$query="select id, name from pages where ( razdel='$r' or razdel='$razdel' ) and razdel!='0' and id!=36 and id!='24' and id!='25' and id!='33' and id!='34' and id!='35'  order by id";
		$result=mysql_query($query);
		$number=mysql_numrows($result);
		if( $number!=0 ){ print"<table width=944 align=center><tr><td class=submenu>"; }
		for( $i=0;$i<$number;$i++ )
		{
			$id=mysql_result($result,$i,'id');
			$name=mysql_result($result,$i,'name');
			print"<a href=index.php?r=$id title='$name' "; if( $r==$id || ( $id==20 && ( $r==33 || $r==34 || $r==35 ) ) ){ print"class=item"; } print" >$name</a> &nbsp; &nbsp; &nbsp;";
		}
		if( $number!=0 ){ print"</td></tr></table>"; }
	}

	function baner( $r )
	{
		$query="select baner, href from baner where razdel='$r' order by id desc";
		$result=mysql_query($query);
		$number=mysql_numrows($result);
		for( $i=0;$i<$number;$i++ )
		{
			$baner=mysql_result($result,$i,'baner');
			$href=mysql_result($result,$i,'href');
			$format=strtolower(strrchr($baner, "."));
			if( $format==".swf" )
			{
				print"<div style='display: block; width: 180px; "; if( $i!=$number-1 ){ print"margin-bottom: 10px;"; } print" '>
					<OBJECT style='z-index: 0;' classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000 codebase='http://download.macromedia.com/pub/shockwave/ cabs/flash/swflash. cab#version=6,0,29,0' width=180 height=120>
						<PARAM name=movie value=uploadfiles/$baner>
						<PARAM name=quality value=high>
						<param name=wmode value=opaque>
						<EMBED src=uploadfiles/$baner QUALITY=high PLUGINSPAGE=http://www.macromedia.com/go/getflashplayer TYPE=application/x-shockwave-flash width=180 height=120 wmode=opaque></EMBED>
					</OBJECT>
					<a href=$href style='display: block; background: url(images/transparent.gif); position:relative; width:180px; height:120px; margin-top:-120px;'></a>
				</div>";
			}
			else
			if( $format==".jpg" )
			{
				print"<div style='display: block; width: 180px; "; if( $i!=$number-1 ){ print"margin-bottom: 10px;"; } print" '>
					<a href=$href><img src=uploadfiles/$baner width=180 height=120></a>
				</div>";
			}
		}
		if( $number==0 ){ print"&nbsp;"; }
	}

	function pages( $query, $r, $view_page, $page, $extrapage )
	{
		$query=str_replace( "limit $page, $view_page", "", $query );
		$number=ceil( mysql_numrows( mysql_query( $query ) ) / $view_page );
		if( $number>1 )
		{
			print"<br><div style='text-align: center; width: 624px;'>";
			for( $i=0;$i<$number;$i++ )
			{
				if( $i*$view_page==$page ){ print" <b class=blue>".($i+1)."</b> "; }
				else{ print" <a href=index.php?r=$r&page=".( $i*$view_page )."$extrapage class=normal>".($i+1)."</a> "; }
			}
			print"</div>";
		}
	}

	function auto_pages( $query, $r, $view_page, $page, $extrapage )
	{
		$query=str_replace( "limit $page, $view_page", "", $query );
		$number=ceil( mysql_numrows( mysql_query( $query ) ) / $view_page );
		if( $number>1 )
		{
			print"<br><div style='text-align: center; width: 624px;'>";
			for( $i=0;$i<$number;$i++ )
			{
				if( $i*$view_page==$page ){ print" <b class=blue>".($i+1)."</b> "; }
				else{ print" <a href=auto.php?r=$r&page=".( $i*$view_page )."$extrapage class=normal>".($i+1)."</a> "; }
			}
			print"</div>";
		}
	}

	function simple_text( $text )
	{
		$text=htmlspecialchars( trim( strip_tags( $text ) ), ENT_QUOTES );
		return $text;
	}

	function point( $id )
	{
		$query="select id, name from point where id='$id' ";
		$result=mysql_query($query);
		$number=mysql_numrows($result);
		for( $i=0;$i<$number;$i++ )
		{
			$name=mysql_result($result,$i,'name');
			return $name;
		}
	}

	function auto_point( $id )
	{
		$query="select id, name from auto_point where id='$id' ";
		$result=mysql_query($query);
		$number=mysql_numrows($result);
		for( $i=0;$i<$number;$i++ )
		{
			$name=mysql_result($result,$i,'name');
			return $name;
		}
	}
?>