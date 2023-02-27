<?php
$materie_array= array(  array("3AISING","DeticcerRoom"),
				array("3AISMAT","??"),
				array("3AISINF","faraday_serale_3ais"),
				array("3AISSISR","faraday_serale_3ais"),
				array("3AISTPSIT","faraday_serale_3ais"),
				array("3AISITA","faradayserale_squadroni"),
				array("3AISSTO","faradayserale_squadroni"),

							
				array("4AISING","DeticcerRoom"),
				array("4AISITA","faradayserale_squadroni"),
				array("4AISSTO","faradayserale_squadroni"),
				array("4AISTPSIT","classe_4ais"),
				array("4AISINF","classe_4ais"),
				array("4AISSISR","classe_4ais"),
				array("4AISMAT","??"),

				
				array("5AISING","DeticcerRoom"),
				array("5AISITA","faradayserale_squadroni"),
				array("5AISSTO","faradayserale_squadroni"),
				array("5AISTPSIT","faraday_serale_5ais"),
				array("5AISINF","faraday_serale_5ais"),
				array("5AISSISR","faraday_serale_5ais"),
				array("5AISMAT","??"),

			
					

				array("3AESING","DeticcerRoom"),
				array("3AESITA","FaradayseraleITASTOandr%C3%a0tuttobene"),
				array("3AESSTO","FaradayseraleITASTOandr%C3%a0tuttobene"),
				array("3AESELT-ELN","3AES-ELT/ELN-SCIARRA"),


				array("4AESING","DeticcerRoom"),
				array("4AESITA","FaradayseraleITASTOandr%C3%a0tuttobene"),
				array("4AESSTO","FaradayseraleITASTOandr%C3%a0tuttobene"),
				array("4AESELT-ELN","4AES-ELT/ELN-SCIARRA"),


				array("5AESING","DeticcerRoom"),
				array("5AESITA","FaradayseraleITASTOandr%C3%a0tuttobene"),
				array("5AESSTO","FaradayseraleITASTOandr%C3%a0tuttobene"),
				array("5AESELT-ELN","5AES-ELT/ELN-SCIARRA"),
				array("5AESSIS","5Aes-SISTEMI-SCIARRA"),


				array("3AMSING","DeticcerRoom"),
				array("3AMSITA","FaradayseraleITASTOandr%C3%a0tuttobene"),
				array("3AMSSTO","FaradayseraleITASTOandr%C3%a0tuttobene"),


				array("4AMSING","DeticcerRoom"),
				array("4AMSITA","FaradayseraleITASTOandr%C3%a0tuttobene"),
				array("4AMSSTO","FaradayseraleITASTOandr%C3%a0tuttobene"),

				array("5AMSING","DeticcerRoom"),
				array("5AMSITA","FaradayseraleITASTOandr%C3%a0tuttobene"),
				array("5AMSSTO","FaradayseraleITASTOandr%C3%a0tuttobene"));
				

function stampaOrario($classe_nome, $classe,$canale,$materie_array){
	$week=array("LUNEDI'","MARTEDI'","MERCOLEDI'","GIOVEDI'","VENERDI'");
	echo "<a name=".$canale.">";	
	echo "<h2>".$classe_nome."</h2></a>";
	
	echo "<table BORDER=1 cellpadding=\"10\"><tr><td></td><td>17.30-18.15</td><td>18.45-19.30</td><tr>";
	for($i=0;$i<5;$i++){
		echo "<tr><td>".$week[$i]."</td>";
			for($j=0;$j<2;$j++){
				//echo "<td>".$classe[$i][$j]."</td>";
				echo "<td>".crea_link_jitsi($canale,$classe[$i][$j],$materie_array)."</td>";
				
			}
		echo "</tr>";
		}
	
	echo "</table>"; 
}

function crea_link_jitsi($canale,$materia,$materie_array){
	$link=materia_aula($canale,$materia,$materie_array);
	if ($link =="??" || $link =="" )
		
		$link=$materia;	
		else
		$link="<a href=\"https://meet.jit.si/". $link."\" target=\"_blank\" >".$materia."</a>";
	
//	$link="<a href=\"https://meet.jit.si/test\" target=\"_blank\">".$materia."</a>";

	return $link;
}

function materia_aula($canale,$materia,$materie_array){
	

			

	$ritorno="";
	$i=0;
	$flag=0;
	$canalemateria=$canale.$materia;
//echo $canalemateria."<br />";
	while(($i<count($materie_array)) && ($flag==0)){
		if(strcmp($canalemateria,$materie_array[$i][0])==0){
			$flag=1;
			$ritorno=$materie_array[$i][1];	
		}	
		$i++;
	}

	return $ritorno;
}


$c3ai=array(
	array("SISR","INF"),
	array(" ","ITA"),
	array("MAT","ING"),
	array("ITA","INF"),
	array("MAT"," ")
	);
$c4ai=array(
	array("MAT","SISR"),
	array("MAT","INF"),
	array("ITA",""),
	array("TPSIT","ING"),
	array("INF","ITA")
	);
$c5ai=array(
	array("INF","MAT"),
	array("ITA","GPOI"),
	array("INF","SISR"),
	array("ING","ITA"),
	array("ITA","TPSIT")
	);
// -------------------------
$c3ae=array(
	array("TPSEE"," "),
	array("MAT","ELT-ELN"),
	array("TPSEE","ING"),
	array(" ","ITA"),
	array("ITA","ELT-ELN")
	);
$c4ae=array(
	array("ELT-ELN","TPSEE"),
	array("MAT"," "),
	array("ITA","STO"),
	array("SIS","ING"),
	array("ELT-ELN"," ")
	);
$c5ae=array(
	array("MAT","ELT-ELN"),
	array("ITA","ING"),
	array("SIS","TPSE"),
	array("ITA","ELT-ELN"),
	array("TPSE","STO")
	);
// -----------------------
$c3am=array(
	array(" ","TMPP"),
	array("MECC","SIS"),
	array("MAT","ING"),
	array("TMPP","ITA"),
	array("MAT","SIS")
	);
$c4am=array(
	array("MAT"," "),
	array("MAT","STO"),
	array("ITA",""),
	array("ODI","ING"),
	array("MME","ITA")
	);
$c5am=array(
	array("MME","ING"),
	array("SIS","MAT"),
	array("ODI","ITA"),
	array("ITA","TMPP"),
	array("STO","MME")
	);

function menu(){
	$classi=array("3AIS","4AIS","5AIS","3AES","4AES","5AES","3AMS","4AMS","5AMS");
	echo "<h4>CLASSI </h4>";	
	echo "<table cellpadding=\"10\"><tr>";
	for ($i=0;$i<count($classi);$i++){
		echo "<td><a href=#".$classi[$i].">".$classi[$i]."</td>";
		}
	echo "</tr></table>";
}
function stampaLink ($materie_array){
	
	echo "<h3>Stampa Elenco Materie</h3><br/>";
	for( $i=0;$i<count($materie_array);$i++){
		echo substr($materie_array[$i][0],0,4)." -->".substr($materie_array[$i][0],4);
		echo" <a href=\"https://meet.jit.si/".$materie_array[$i][1]."\">https://meet.jit.si/".$materie_array[$i][1]."</a><br/>";
	}
}


echo "<h3><CENTER>ITI M. FARADAY - CORSO SERALE<BR/>ORARIO DELLE VIDEO LEZIONI E DEI RELATIVI COLLEGAMENTI AI CANALI DI VIDEO LEZIONE</CENTER></h3>";
menu();
stampaOrario("3° A INF ",$c3ai,"3AIS",$materie_array);
stampaOrario("4° A INF ",$c4ai,"4AIS",$materie_array);
stampaOrario("5° A INF ",$c5ai,"5AIS",$materie_array);
stampaOrario("3° A ELE ",$c3ae,"3AES",$materie_array);
stampaOrario("4° A ELE ",$c4ae,"4AES",$materie_array);
stampaOrario("5° A ELE ",$c5ae,"5AES",$materie_array);
stampaOrario("3° A MEC ",$c3am,"3AMS",$materie_array);
stampaOrario("4° A MEC ",$c4am,"4AMS",$materie_array);
stampaOrario("5° A MEC ",$c5am,"5AMS",$materie_array);
stampaLink($materie_array);
?>	
