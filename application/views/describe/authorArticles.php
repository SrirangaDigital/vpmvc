<div class="archive_title">ಲೇಖನಗಳ ಪಟ್ಟಿ</div>
<div class="scroll">
	<ul>
		<?php foreach($data as $row): ?>
			<li><span class="titlespan"><a href="" target="_blank"><?= $row->title ?></a></span>
			<br />&nbsp;&nbsp;&nbsp;&nbsp;<span class="yearspan"><a href="javascript:void();">ಸಂಪುಟ&nbsp;<span class="eng"><?= intval($row->volume); ?></span></a></span>&nbsp;<span class="yearspan"><a href="javascript:void();"><?= $viewHelper->monthNames[$row->month] ?> <span class="eng">(<?= intval($row->year);?>)</span></a> | </span>
			<span class="downloadPdf">(<a href="<?=BASE_URL ?>article/download/<?= $row->ID?>" target="_blank">ಡೌನ್ಲೋಡ್ ಪಿಡಿಎಫ್</a>)</span></li>
		<?php endforeach;?>
	</ul>
</div>
	
