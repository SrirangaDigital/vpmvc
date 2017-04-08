<?php 
	$features = explode("|", FEATURE);
?>
<div class="body">
	<div class="column1">
		<div class="widget">
			<div class="tbar">"<?= $viewHelper->monthNames[$data[$features[0]]['issue']-1];?>" ಸಂಚಿಕೆ</div> 
			<img src="<?= PUBLIC_URL ?>/images/viveka.png" alt="cover"/><br />
			<img src="<?= PUBLIC_URL ?>/images/cover.png" alt="175 Anniversary"/><br />
			<span class="title"><?= $data[$features[0]]['theme'] ?><br/></span>
			<span class="text"><a href="Volumes/<?= $data[$features[0]]['volume'] ?>/<?= $data[$features[0]]['issue'] ?>/index.djvu?djvuopts&page="<?= $data[$features[0]]['page'] ?>"&zoom=page" target="_blank">ಸಂಪಾದಕೀಯ: <?= $data[$features[0]]['title']?></a></span>
		</div>
		<?= $viewHelper->print_widget($features[1],0,$data);?>

	</div>

	<div class="column2">
<!--
		<?php print_widget("ವಿಶೇಷ ಲೇಖನ",1,$volume,$issue);?>
		<?php print_widget("ಪುಸ್ತಕ ಪರಿಚಯ",1,$volume,$issue);?>
-->
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
