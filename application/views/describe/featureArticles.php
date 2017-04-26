<div class="archive_title">ಲೇಖನಗಳ ಪಟ್ಟಿ</div>
<div class="scroll">
	<ul>
		<?php foreach($data as $row): ?>
			<li><span class="titlespan"><a href="<?php echo DJVU_URL . $row->volume . "/" . $row->issue . "/index.djvu?djvuopts&page=" . $viewHelper->getStartingPage($row->page) . "&zoom=page"?>"" target="_blank"><?= $row->title ?></a></span>
			<br />&nbsp;&nbsp;&nbsp;&nbsp;<span class="yearspan"><a href="<?= BASE_URL ?>listing/issue/<?= $row->volume?>/<?= $row->year ?>">ಸಂಪುಟ&nbsp;<span class="eng"><?= intval($row->volume); ?></span></a></span>&nbsp;<span class="yearspan"><a href="<?= BASE_URL ?>describe/issue/<?= $row->volume ?>/<?= $row->issue ?>/<?= $row->month ?>/<?= $row->year ?>"><?= $viewHelper->monthNames[$row->month] ?> <span class="eng">(<?= intval($row->year);?>)</span></a> | </span>
			<span class="downloadPdf">(<a href="<?=BASE_URL ?>article/download/<?= $row->ID?>" target="_blank">ಡೌನ್ಲೋಡ್ ಪಿಡಿಎಫ್</a>)</span></li>
		<?php endforeach;?>
	</ul>
</div>
	
