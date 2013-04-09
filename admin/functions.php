<?php
	function baner( $baner )
	{
		$count=strtotime("now")."-".rand( 1000000000, 9999999999 );
		$format=strtolower(strrchr($_FILES[$baner]["name"], "."));

		if($format=='.jpg' || $format=='.jpeg'){ $image=imagecreatefromjpeg(  $_FILES[$baner]["tmp_name"]  ); }
		if($format=='.png'){ $image=imagecreatefrompng(  $_FILES[$baner]["tmp_name"]  ); }
		if($format=='.gif'){ $image=imagecreatefromgif(  $_FILES[$baner]["tmp_name"]  ); }

		if($format=='.swf')
		{
			copy($_FILES[ $baner]["tmp_name"] , "../uploadfiles/".$count.".swf" );
			return $count.".swf";
		}
		elseif(isset($image))
		{
			$newwidth=180;
			$newheight=120;
			list($width,$height)=getimagesize( $_FILES[$baner]["tmp_name"] );
			$image2=imagecreatetruecolor($newwidth, $newheight);
			imagecopyresampled($image2,$image,0,0,0,0,$newwidth,$newheight,$width,$height);
			imagejpeg($image2,"../uploadfiles/".$count.".jpg",90);
			return $count.".jpg";
		}
		else
		{
			return 0;
		}
	}

	function files( $file )
	{
		$count=strtotime("now")."-".rand( 1000000000, 9999999999 );
		$format=strtolower(strrchr($_FILES[$file]["name"], "."));
		if( $format==".doc" || $format==".docx" || $format==".txt" || $format==".xls" || $format==".xlsx" || $format==".pdf" )
		{
			copy($_FILES[ $file]["tmp_name"] , "../uploadfiles/".$count.$format );
			return $count.$format;
		}
		else
		{
			return 0;
		}
	}

	function picture( $picture, $newwidth, $newheight )
	{
		$count=strtotime("now")."-".rand( 1000000000, 9999999999 );
		$format=strtolower(strrchr($_FILES[$picture]["name"], "."));

		if($format=='.jpg' || $format=='.jpeg'){ $image=imagecreatefromjpeg(  $_FILES[$picture]["tmp_name"]  ); }
		if($format=='.png'){ $image=imagecreatefrompng(  $_FILES[$picture]["tmp_name"]  ); }
		if($format=='.gif'){ $image=imagecreatefromgif(  $_FILES[$picture]["tmp_name"]  ); }

		if(isset($image))
		{
			list($width,$height)=getimagesize( $_FILES[$picture]["tmp_name"] );
			if( $width>=$height )
			{
				$newheight=$height/$width*$newwidth;
				$newwidth2=600;
				$newheight2=$height/$width*600;
			}
			else
			{
				$newwidth=$width/$height*$newheight;
				$newheight2=600;
				$newwidth2=$width/$height*600;
			}
			$image2=imagecreatetruecolor($newwidth, $newheight);
			$image3=imagecreatetruecolor($newwidth2, $newheight2);
			imagecopyresampled($image2,$image,0,0,0,0,$newwidth,$newheight,$width,$height);
			imagecopyresampled($image3,$image,0,0,0,0,$newwidth2,$newheight2,$width,$height);
			imagejpeg($image2,"../uploadfiles/".$count.".jpg",90);
			imagejpeg($image3,"../uploadfiles/".$count."_b.jpg",70);
			return $count;
		}
		else
		{
			return 0;
		}
	}


	function picture_fixed( $picture, $newwidth, $newheight )
	{
		$count=strtotime("now")."-".rand( 1000000000, 9999999999 );
		$format=strtolower(strrchr($_FILES[$picture]["name"], "."));

		if($format=='.jpg' || $format=='.jpeg'){ $image=imagecreatefromjpeg(  $_FILES[$picture]["tmp_name"]  ); }
		if($format=='.png'){ $image=imagecreatefrompng(  $_FILES[$picture]["tmp_name"]  ); }
		if($format=='.gif'){ $image=imagecreatefromgif(  $_FILES[$picture]["tmp_name"]  ); }

		if(isset($image))
		{
			list($width,$height)=getimagesize( $_FILES[$picture]["tmp_name"] );
			$image2=imagecreatetruecolor($newwidth, $newheight);
			imagecopyresampled($image2,$image,0,0,0,0,$newwidth,$newheight,$width,$height);
			imagejpeg($image2,"../uploadfiles/".$count.".jpg",90);
			return $count;
		}
		else
		{
			return 0;
		}
	}
?>