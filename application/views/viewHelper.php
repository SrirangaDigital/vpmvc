<?php

class viewHelper extends View {

    public function __construct() {
		
    }

    public function print_widget($feature, $column, $data){
		
		$features = explode('|', FEATURE);
		$volume = $data[$features[1]]['volume'];
		$issue = $data[$features[1]]['issue'];
		
		if($column==0)
			echo "<div class=\"art_widget_col1\">";
		else
			echo "<div class=\"art_widget\">";
		
		
		echo "<div class=\"tbar\">$feature</div>";
		foreach($data[$features[1]] as $row)
		{
			$authid=$row['authid'];
			echo $authid;
			exit;
			echo "<div>";
			echo "<img id=\"art_widget_img\" src=\"Volumes/".$row['volume']."/".$row['issue']."/images/".$row['page'].".png\" alt=\"cover\"/>";
			echo "</div>";
			echo "<div style=\"width: 50%;\" class=\"text\">";
			echo "<span class=\"titlespan\"><a href=\"Volumes/".$row['volume']."/".$row['issue']."/index.djvu?djvuopts&page=".$row['page']."&zoom=page\" target=\"_blank\">".$row['title']."</a></span><br />";
			echo ($authid != 0) ? "<span class=\"authorspan\"><a href=\"html/auth.php?authid=".$authid."\" target=\"_blank\">".$author.", ".$row1['salutation']."</a></span><br />" : "";
			echo $row['text'];
			echo ($row['text'] == '') ? "" : "...";
			echo "</div>";
			echo "<div class=\"further\"><span class=\"furtherspan\"><a href=\"Volumes/".$row['volume']."/".$row['issue']."/index.djvu?djvuopts&page=".$row['page']."&zoom=page\" target=\"_blank\">ಮುಂದೆ ಓದಿ..</a></span></div>";
			if($i!=$num_rows-1)
			{
				echo "<div class=\"art_widget_rule\"></div>";
			}
			
		}
		echo "</div>";
	}
	
    public function getAuthorDetails($authorDetails) {
		
		if($authorDetails['salutation'] == '')
		
			echo "&nbsp;&nbsp;<span class=\"authorspan\"><a href=\"auth.php?authid=" . $authorDetails['authid'] . "\">" . $authorDetails['authorname'] . "</a></span>";
		else
		
			echo "&nbsp;&nbsp;<span class=\"authorspan\"><a href=\"auth.php?authid=" . $authorDetails['authid'] . "\">" . $authorDetails['authorname'] . ", " . $authorDetails['salutation'] . "</a></span>";
	}
}

?>
