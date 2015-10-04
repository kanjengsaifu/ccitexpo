<?php
	function right($string,$chars)
	{
		$vright = substr($string, strlen($string)-$chars,$chars);
		return $vright;
	   
	} 
    function rupiah($uang)
    {
    $rupiah  = "";
	
	if($uang<0)
	{	
		$u=$uang;
		$uang=abs($uang);
	}
	else
	{
		$u=$uang;
	}
	$sep=substr($uang,-3,1);
    $sep2=substr($uang,-4,1);
    $sep3=substr($uang,-5,1);
    $dec1=right($uang,2);
    $dec11=right($uang,3);
    $dec111=right($uang,4);
    $dec2=strtok($uang,'.');
    $panjang = strlen($dec2);

    while ($panjang > 3)
    {

			$rupiah = "." . substr($dec2, -3) . $rupiah;
			$lebar = strlen($dec2) - 3;
			$dec2   = substr($dec2,0,$lebar);
			$panjang= strlen($dec2);

	}

	if($uang==0 || $uang=="")
	{
		$rupiah = "-";
	}
	else
	{
		
		
		if($sep=='.' || $sep2=='.' || $sep3=='.')
		{
                        /*if($sep=='.')
                            $rupiah = $dec2.$rupiah.",".$dec1;
                        else if($sep2=='.')
                            $rupiah = $dec2.$rupiah.",".substr($dec11,0,2);
                        else if($sep3=='.')
                            $rupiah = $dec2.$rupiah.",".substr($dec111,0,2);*/
                        if($sep=='.')
                            $rupiah = $dec2.$rupiah.",00";
                        else if($sep2=='.')
                            $rupiah = $dec2.$rupiah.",00";
                        else if($sep3=='.')
                            $rupiah = $dec2.$rupiah.",00";
		}
		else
		{
			$rupiah = $dec2.$rupiah.",-";
		}
	}
	
	if($u<0)
		return '('.$rupiah.')';
	else
		return $rupiah;
    }


function cleartext($string)
{
    $j=str_replace(array('\\','/','"','\'',':',';','~','`','.',',','(',')','{','}','_','-','=','@','#','$','|','!',' ','*','&'), '-', $string);
    $new_j=str_replace(array('---','--','-'), '-', $j);
    $judul=strtolower($new_j);
    return $judul;
}



function clearisi($string)
{
    $f=substr($string,1,1);
    if($f=='P')
        $x='</P>';
    else if($f=='p')
        $x='</p>';

    list($text1,$text2,$text3,$text4,$text5)=explode(''.$x.'',$string);

    $s=strip_tags($text1);
    if($s==" ")
    {
        $text=$text2;
        $t=explode(" ", $text);
        if(count($t)<=150)
            $output=$text.$text3.$text4.$text5;
        else
            $output=$text;
    }
    else
    {
        $text=$text1;
        $text=$text2;
        $t=explode(" ", $text);
        if(count($t)<=150)
            $output=$text.$text2.$text3.$text4;
        else
            $output=$text;
    }

    return strip_tags($output);
}

function filterid($id)
{
    $ln=strlen($id);
    $newid="";
    for($x=0;$x<$ln;$x++)
    {
        $tx=substr($id, $x,1);
        if(is_numeric($tx))
        {
            $newid.=$tx;
        }
    }
    return $newid;
}

?>
