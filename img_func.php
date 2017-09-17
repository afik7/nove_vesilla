


<?php
//if(isset($pfileclient))
//{
function pic_save($pfileclient,$pfileserver,$typeclient)
{

    $max_width=150;
    $max_height=200;
    $size=getimagesize($pfileclient);
    $width=$size[0];
    $height=$size[1];
    if($width>$max_width)
    {
    	$new_w=$max_width;
        $p_w=(float)$max_width/$width;
        $new_h=ceil($p_w*$height);
    }
    if ($height>$max_height)
    {
    	$new_h=$max_height;
        $p_h=(float)$max_height/$height;
        $new_w=ceil($p_h*$width);
    }
     $im=imagecreatetruecolor($new_w, $new_h);
	
    if($typeclient=="jpeg")//||$typeclient=="pjpeg")
    {
    	$source = imagecreatefromjpeg($pfileclient);
         // below is main function resampling image
     	imagecopyresampled($im, $source, 0, 0, 0, 0, $new_w, $new_h,  $width, $height);
       // $filename = "photos1/1.jpg";
     	imagejpeg($im,$pfileserver);
    }
    if($typeclient=="gif")
    {
   		$source = imagecreatefromgif($pfileclient);
         // below is main function resampling image
     	imagecopyresampled($im, $source, 0, 0, 0, 0, $new_w, $new_h,  $width, $height);
       // $filename = "photos1/1.jpg";
     	imagegif($im,$pfileserver);
    }
     @imagedestroy($source);                        // free memory
     @imagedestroy($im);
}
//}

?>
