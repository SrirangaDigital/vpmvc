<div class="body">
	<div class="column1">
		<div class="widget">
			<div class="tbar">".$month[$row2['issue']-1]." ಸಂಚಿಕೆ</div>
			<img src="html/images/viveka.png" alt="cover"/><br />
			<img src="html/images/cover.png" alt="175 Anniversary"/><br />
			<span class="title">".$row2['theme']."<br/></span>
			<span class="text"><a href="Volumes/".$row2['volume']."/".$row2['issue']."/index.djvu?djvuopts&page=".$row2['page']."&zoom=page" target="_blank">ಸಂಪಾದಕೀಯ: ".$row2['title']."</a></span>
		</div>
		<?php				

				$month=array("ಜನವರಿ","ಫೆಬ್ರವರಿ","ಮಾರ್ಚ್","ಏಪ್ರಿಲ್","ಮೇ","ಜೂನ್","ಜುಲೈ","ಆಗಸ್ಟ್","ಸೆಪ್ಟೆಂಬರ್","ಅಕ್ಟೋಬರ್","ನವೆಂಬರ್","ಡಿಸೆಂಬರ್");
				#get current volume, issue details
				$currentIssueDetails = getCurrentVolumeIssue($database,$db);
				$volume = $currentIssueDetails['volume'];
				$issue = $currentIssueDetails['issue'];
				
				//~ echo $volume . "->" . $issue . "<br />";

				
				$query2 = "select * from article where volume='$volume' and issue='$issue' and feature='ಸಂಪಾದಕೀಯ' limit 1";
				$result2=mysql_query("select * from article where volume='$volume' and issue='$issue' and feature='ಸಂಪಾದಕೀಯ' limit 1");
				$row2=mysql_fetch_assoc($result2);

				echo "<div class=\"widget\">"; 
				echo "<div class=\"tbar\">".$month[$row2['issue']-1]." ಸಂಚಿಕೆ</div>";
				echo "<img src=\"html/images/viveka.png\" alt=\"cover\"/><br />";
				echo "<img src=\"html/images/cover.png\" alt=\"175 Anniversary\"/><br />";
				echo "<span class=\"title\">".$row2['theme']."<br/></span>";
				echo "<span class=\"text\"><a href=\"Volumes/".$row2['volume']."/".$row2['issue']."/index.djvu?djvuopts&page=".$row2['page']."&zoom=page\" target=\"_blank\">ಸಂಪಾದಕೀಯ: ".$row2['title']."</a></span>";
				echo "</div>";
		?>
		<?php print_widget("ಚಿತ್ರಕಥೆ",0,$volume,$issue);?>										
	</div>

	<div class="column2">
		<?php print_widget("ವಿಶೇಷ ಲೇಖನ",1,$volume,$issue);?>									
		<?php print_widget("ಪುಸ್ತಕ ಪರಿಚಯ",1,$volume,$issue);?>							
	</div>
	<div class="column3">
		<div class="art_widget_index">
			<div>
				<a href="html/year.php?volume=016&year=2015" target="_blank"><img src="html/images/2016.gif" alt="cover" title="Annual Index"/></a>
			</div>
			<div style="width: 50%;" class="text">
				<span class="furtherspan"><a href="html/year.php?volume=017&year=2016" target="_blank">೨೦೧೬<br />(ಸಂಪುಟ ೧೭)<br />ವಾರ್ಷಿಕ ಅನುಕ್ರಮಣಿಕೆ</a></span><br />
			</div>
		</div>
		<div class="art_widget">
			<div>
				<a href="http://www.caminova.net/en/downloads/download.aspx?id=1" target="_blank"><img src="html/images/djvu.png" alt="cover" title="ಡೆಜವೂ ಪ್ಲಗಿನ್"/></a>
			</div>
			<div style="width: 50%;" class="text">
				<span class="furtherspan"><a href="http://www.caminova.net/en/downloads/download.aspx?id=1" target="_blank">ಲೇಖನಗಳನ್ನು ಡೆಜವೂ (DjVu) ರೂಪದಲ್ಲಿಟ್ಟಿದೆ. ಅವುಗಳನ್ನು ನೋಡಲು ಡೆಜವೂ ಪ್ಲಗಿನ್ ಅಗತ್ಯ. ಇದು ಮುಕ್ತವಾಗಿ ಇಲ್ಲಿ ಸಿಗುತ್ತದೆ:</a></span><br />
			</div>				
		</div>			
		<?php print_widget("ಧಾರಾವಾಹಿ",2,$volume,$issue);?>							
	</div>
</div>
