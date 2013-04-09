<?php
	if( !isset( $_GET["r"] ) ){ $r=3; }else{ $r=$_GET["r"]; }
	if( !isset( $_GET["page"] ) ){ $page=0; }else{ $page=$_GET["page"]; }
	$view_page=4;	// количество выводимых записей по умолчанию
	$extrapage="";	// дополнительные параметры в выводе страниц, для передачи в гет запрос
	require_once("admin/config.php");

	$query="select name, content, title, description, keywords, razdel from auto_pages where id='$r'";
	$result=mysql_query($query);
	$number=mysql_numrows($result);
	for( $i=0;$i<$number;$i++ )
	{
		$name=str_replace( "<br>", " ", mysql_result($result,$i,'name') );
		$content=mysql_result($result,$i,'content');
		$title=mysql_result($result,$i,'title');
		$description=mysql_result($result,$i,'description');
		$keywords=mysql_result($result,$i,'keywords');
		$razdel=mysql_result($result,$i,'razdel');
	}
	if( $number==0 )
	{
		header( "location: auto.php" );
	}
?>
<html>
	<head>
		<title><?=$title?> | Пассажирское автотранспортное предприятие</title>
		<meta name='title' content='<?=$title?>'>
		<meta name='description' content='<?=$description?>'>
		<meta name='keywords' content='<?=$keywords?>'>
		<link rel=stylesheet type='text/css' href='style.css'>
		<meta HTTP-EQUIV='Content-Type' content='text/html; charset=windows-1251'>
		<script type='text/javascript' src='js/iepngfix_tilebg/iepngfix_tilebg.js'></script>
	</head>
	<body>
		<table align=center width=100% height=100%>
			<?php
				require_once("functions.php");
				print"<tr height=84>
					<td style='background: url(images/shadow_left.jpg) right top repeat-y;'>&nbsp;</td>
					<td style='background: url(images/header.jpg) right top repeat-x;' width=1000 align=center>
						<table width=940 align=center>
							<td><a href=index.php title='На главную'><img src=images/logo.png></a></td>
							<td valign=bottom align=right class=color_white><span class='help_of_station color_white'>Справочная автовокзала<br>8 (3456) 25-84-53, 25-65-55</span><br>Россия, 626150 г.Тобольск 6 мкр. строение 44</td>
						</table>
					</td>
					<td style='background: url(images/shadow_right.jpg) left top repeat-y;'>&nbsp;</td>
				</tr>
				<tr height=85>
					<td style='background: url(images/shadow_left.jpg) right top repeat-y;'>&nbsp;</td>
					<td style='background: url(images/header.jpg) right -84px repeat-x;' width=1000 align=center>";
						menu_auto( $r );
					print"</td>
					<td style='background: url(images/shadow_right.jpg) left top repeat-y;'>&nbsp;</td>
				</tr>
				<tr align=center>
					<td style='background: url(images/shadow_left.jpg) right top repeat-y;'>&nbsp;</td>
					<td width=1000 bgcolor=#144e92 align=center>
						<table width=1000 height=100% align=center>
							<tr valign=top>";
								if( $r!=3 && $r!=9 && $r!=10 && $r!=11 && $r!=12 )
								{
									print"<td width=270>
										<div class='content2 color_white'>";
											if( $r==4 )
											{
												$view_page=20;
												$query="select id, name from auto_file_razdel order by id desc";
												$result=mysql_query($query);
												$number=mysql_numrows($result);
												if( $number!=0 ){ print"<table width=230 align=center>"; }
												for( $i=0;$i<$number;$i++ )
												{
													$id_auto=mysql_result( $result,$i,'id' );
													$name_auto=mysql_result($result,$i,'name');
													print"<tr valign=top><td><a href=auto.php?r=$r&n=$id_auto&page=$page class=color_white>$name_auto</a></td></tr>
													<tr height=10><td></td></tr>";
													if( isset( $_GET["n"] ) && $_GET["n"]==$id_auto )
													{
														$query2="select name, file from auto_file where razdel=$id_auto order by id desc";
														$result2=mysql_query($query2);
														$number2=mysql_numrows($result2);
														for( $j=0;$j<$number2;$j++ )
														{
															$name_auto2=mysql_result($result2,$j,'name');
															$file_auto2=mysql_result($result2,$j,'file');
															print"<tr valign=top><td class=dot_auto><div class=dots_auto><a href=uploadfiles/$file_auto2 title='$name_auto' class=color_white target=_blank>$name_auto2</a></div></td></tr>
															<tr height=9><td class=dot></td></tr>";
														}
													}
												}
												if( $number!=0 ){ print"</table>"; }
											}
											elseif( $r==5 )
											{
												auto_reklama();
											}
											else
											{
												auto_news();
											}
										print"</div>
									</td>";
								}
								print"<td width=730 "; if( $r!=3 ){ print"bgcolor=#ffffff"; } print" >
									<div class=content2 "; if( $r==3 ){ print"style='text-align: center;'"; } print">";
										if( $r!=3 ){ print"<span class=color_orange>$name</span><br><br>"; }
										if( $r==3 )
										{
											if( !isset( $_POST["point_otp"] ) ){ $point_otp=24; }else{ $point_otp=$_POST["point_otp"]; }
											if( !isset( $_POST["point_prib"] ) ){ $point_prib=0; }else{ $point_prib=$_POST["point_prib"]; }
											if( !isset( $_POST["route"] ) ){ $route=0; }else{ $route=$_POST["route"]; }
											if( !isset( $_POST["type"] ) ){ $type=0; }else{ $type=$_POST["type"]; }

											print"<form action=auto.php?r=$r method=post>
												<div class=find_top></div>
												<div class=find_middle>
													<div style='text-align: left; padding-bottom: 15px; background: url(images/dot_white.png) left 80% repeat-x;'>
														<a href=auto.php?r=9 class=color_white>Город</a> &nbsp; &nbsp; &nbsp; &nbsp;
														<a href=auto.php?r=10 class=color_white>Пригород</a> &nbsp; &nbsp; &nbsp; &nbsp;
														<a href=auto.php?r=11 class=color_white>Дачные</a> &nbsp; &nbsp; &nbsp; &nbsp;
														<!--<a href=auto.php?r=12 class=color_white>Межгород</a> &nbsp; &nbsp; &nbsp; &nbsp;-->
													</div>
													<div class=left>Пункт отправления</div>
													<div>
														<!--<select name=point_otp>
															<option value=0>Не учитывать пункт отправления</option>-->";
															$query="select id, name from auto_point where id='24' order by name";
															$result=mysql_query($query);
															$number=mysql_numrows($result);
															for( $i=0;$i<$number;$i++ )
															{
																$id=mysql_result($result,$i,'id');
																$name=mysql_result($result,$i,'name');
																//print"<option value=$id "; if( $point_otp==$id ){ print"selected"; } print" >$name</option>";
																print"<input type=text value='$name' readonly><input type=hidden name=point_otp value='$id'>";
															}
														print"<!--</select>-->
													</div>
													<div class=left>Номер маршрута</div>
													<div>
														<select name=route>
															<option value=0>Не учитывать номер маршрута</option>";
															$query="select id, nomer from auto_route order by nomer";
															$result=mysql_query($query);
															$number=mysql_numrows($result);
															for( $i=0;$i<$number;$i++ )
															{
																$id=mysql_result($result,$i,'id');
																$nomer=mysql_result($result,$i,'nomer');
																print"<option value=$id "; if( $route==$id ){ print"selected"; } print" >$nomer</option>";
															}
														print"</select>
													</div>
													<div class=left>Пункт назначения</div>
													<div>
														<select name=point_prib>
															<option value=0>Не учитывать пункт назначения</option>";
															$query="select id, name from auto_point order by name";
															$result=mysql_query($query);
															$number=mysql_numrows($result);
															for( $i=0;$i<$number;$i++ )
															{
																$id=mysql_result($result,$i,'id');
																$name=mysql_result($result,$i,'name');
																print"<option value=$id "; if( $point_prib==$id ){ print"selected"; } print" >$name</option>";
															}
														print"</select>
													</div>
													<div class=left>Тип рейса</div>
													<div>
														<select name=type>
															<option value=0>Не учитывать</option>
															<option value=1 "; if( $type==1 ){ print"selected"; } print" >Город</option>
															<option value=2 "; if( $type==2 ){ print"selected"; } print" >Пригород</option>
															<option value=3 "; if( $type==3 ){ print"selected"; } print" >Дачные</option>
															<option value=4 "; if( $type==4 ){ print"selected"; } print" >Межгород</option>
														</select>
													</div>
													<div class=left>&nbsp;</div>
													<div>
														<input type=submit name=find value=Искать style='width: 123px;'>
														<input type=button value=Сброс onclick='window.location.href=\"auto.php?r=$r\"' style='width: 123px;'>
													</div>
												</div>
												<div class=find_bottom align=right>Время местное &nbsp; &nbsp; &nbsp; </div>
											</form><br>";
											if( isset( $_POST["find"] ) )
											{
												if( $route==0 ){ $par1="<>"; }else{ $par1="="; }
												if( $point_otp==0 ){ $par2="<>"; }else{ $par2="="; }
												if( $point_prib==0 ){ $par3="<>"; }else{ $par3="="; }
												if( $type==0 ){ $par4="<>"; }else{ $par4="="; }

												for( $j=0;$j<=0;$j++ )
												{
													$point_otp_=$point_otp;
													$point_prib_=$point_prib;
													if( $j!=0 ){ $point_temp=$point_otp; $point_otp_=$point_prib; $point_prib_=$point_temp; $par_temp=$par2; $par2=$par3; $par3=$par_temp; }
													$query="select * from auto_path, auto_route where auto_route.id=auto_path.route and route $par1 '$route' and type $par4 '$type' and point_otp $par2 '$point_otp_' and point_prib $par3 '$point_prib_' order by time_otp, time_prib, nomer";
													if( isset( $_GET["type"] ) ){ $query="select * from auto_path, auto_route where auto_route.id=auto_path.route and type = '".$_GET["type"]."' order by nomer"; }
													$result=mysql_query($query);
													$number=mysql_numrows($result);
													if( $number!=0 )
													{
														print"<div class=find_top2></div><div class=find_middle2><table class='ticket small'>
														<tr class=ticket_head height=4><td colspan=8></td></tr>
														<tr class=ticket_head>
															<td width=40> &nbsp; №</td>
															<td width=140>Отправление</td>
															<td width=40>Время</td>
															<td width=140>Прибытие</td>
															<td width=40>Время</td>
															<td width=100>Дни следования</td>
															<td>Расстояние, км.</td>
															<td width=40>Цена, руб.</td>
														</tr>
														<tr class=ticket_head height=4><td colspan=8></td></tr>
														<tr height=4><td colspan=8></td></tr>";
													}
													for( $i=0;$i<$number;$i++ )
													{
														$nomer_find=mysql_result($result,$i,'nomer');
														$point_otp_find=auto_point( mysql_result($result,$i,'point_otp') );
														$time_otp_find=mysql_result($result,$i,'time_otp');
														$point_prib_find=auto_point( mysql_result($result,$i,'point_prib') );
														$time_prib_find=mysql_result($result,$i,'time_prib');
														$days_find=mysql_result($result,$i,'days');
														$distance_find=mysql_result($result,$i,'distance');
														$cost_find=mysql_result($result,$i,'cost');
														print"<tr>
															<td> &nbsp; $nomer_find</td>
															<td>$point_otp_find</td>
															<td>$time_otp_find</td>
															<td>$point_prib_find</td>
															<td>$time_prib_find</td>
															<td>$days_find</td>
															<td>$distance_find</td>
															<td>$cost_find</td>
														</tr>
														<tr height=4><td colspan=8></td></tr>";
														if( $i < $number-1 ){ print"<tr height=1><td colspan=8 style='background: #ffffff;'></td></tr><tr height=4><td colspan=8></td></tr>"; }
														}
													if( $number!=0 ){ print"</table></div><div class=find_bottom2></div>"; }
												}
											}
										}
										elseif( $r==5 )
										{
											if( isset( $_GET["n"] ) )
											{
												$query="select id, dat, name, content from auto_news where id='".$_GET["n"]."'";
											}
											else
											{
												$query="select id, dat, name, content from auto_news order by dat desc, id desc limit $page, $view_page";
											}
											$result=mysql_query($query);
											$number=mysql_numrows($result);
											for($i=0;$i<$number;$i++)
											{
												$id=mysql_result($result,$i,'id');
												$date=date( "d.m.Y" ,mysql_result($result,$i,'dat') );
												$name=mysql_result($result,$i,'name');
												$content=mysql_result($result,$i,'content');
												$content2=trim( substr( strip_tags( $content ), 0, 300 ) )."...";
												if( isset( $_GET["n"] ) )
												{
													print"<span class=blue>$date</span> &nbsp; <b class=blue>$name</b>
													<div style='text-align: justify; margin-top: 6px;'>$content</div>
													<br><div style='text-align: right;'><a href=index.php?r=$r onclick='window.history.back(); return false;' title='Назад'>назад</a></div><br>";
												}
												else
												{
													print"<a href=auto.php?r=$r&n=$id><span class=blue>$date</span> &nbsp; <b class=blue>$name</b></a><div style='text-align: justify; margin-top: 10px;'>$content2</div><br><br>";
												}
											}
											auto_pages( $query, $r, $view_page, $page, $extrapage );	// постраничный вывод
										}
										elseif( $r==9 || $r==10 || $r==11 || $r==12 )
										{
											$r=$r+20;
											$query="select content from pages where id='$r'";
											$result=mysql_query($query);
											$number=mysql_numrows($result);
											for( $i=0;$i<$number;$i++ )
											{
												$content=mysql_result($result,$i,'content');
												print"<div class=cell_padding>$content</div>";
											}
										}
										else
										{
											print"$content";
										}
									print"</div>
								</td>";
								if( $r==3 || $r==9 || $r==10 || $r==11 || $r==12 )
								{
									print"<td width=270>
										<div class='content2 color_white'>"; auto_news(); print"</div>
									</td>";
								}
							print"</tr>
						</table>
					</td>
					<td style='background: url(images/shadow_right.jpg) left top repeat-y;'>&nbsp;</td>						
				</tr>
				<tr height=38>
					<td style='background: url(images/shadow_left.jpg) right top repeat-y;'>&nbsp;</td>
					<td style='background: url(images/border.jpg) right -2px no-repeat;'>&nbsp;</td>
					<td style='background: url(images/shadow_right.jpg) left top repeat-y;'>&nbsp;</td>
				</tr>
				<tr height=230 valign=top align=center>
					<td style='background: url(images/shadow_left.jpg) right top repeat-y;'>&nbsp;</td>
					<td style='background: url(images/footer.jpg) center bottom no-repeat;'>
						<table width=944 align=center>
							<tr><td colspan=2 align=right><img src=images/path.gif height=60></td></tr>
							<tr valign=top>
								<td><a href=index.php title='Тобольское ПАТП'><img src=images/button_tpatp.gif></a></td>
								<td align=right><a href=http://e-traffic.ru/ title='Продажа билетов'><img src=images/button_ticket.gif></a></td>
							</tr>
							<tr height=90 align=right valign=bottom>
								<td align=left><!--LiveInternet counter--><script type=\"text/javascript\">document.write(\"<a href='http://www.liveinternet.ru/click' target=_blank><img src='//counter.yadro.ru/hit?t18.11;r\" + escape(document.referrer) + ((typeof(screen)==\"undefined\")?\"\":\";s\"+screen.width+\"*\"+screen.height+\"*\"+(screen.colorDepth?screen.colorDepth:screen.pixelDepth)) + \";u\" + escape(document.URL) + \";\" + Math.random() + \"' border=0 width=88 height=31 alt='' title='LiveInternet: показано число просмотров за 24 часа, посетителей за 24 часа и за сегодня'><\/a>\")</script><!--/LiveInternet--></td>
								<td><a href=http://tri-t.ru title='Рекламное агентство «Три Т»'>© 2010 Тобольское ПАТП<br>Создание сайта «Три Т» <img src=images/trit.gif></a></td>
							</tr>
						</table>
					</td>
					<td style='background: url(images/shadow_right.jpg) left top repeat-y;'>&nbsp;</td>
				</tr>";
			?>
		</table>
	</body>
</html>