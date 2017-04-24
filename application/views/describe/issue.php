<div class="archive_title">ಸಂಚಿಕೆ <span class="eng">(<?= intval($data[0]->issue); ?>)</span> - <?= $viewHelper->monthNames[$data[0]->month] ?> <br />ಸಂಪುಟ <span class="eng">(<?= intval($data[0]->volume) ?>)</span> - <span class="eng"><?= $data[0]->year ?></span></div>
	<div class="scroll">
		<?php foreach($data as $row): ?>
			<li><span class="titlespan"><a href="../Volumes/$volume/$issue/index.djvu?djvuopts&page=$page&zoom=page" target="_blank"><?= $row->title ?></a></span>
			<?php if($row->authid != 0): ?>
				<span><?= $viewHelper->getAuthorDetails($row->authorDetails); ?></span>
			<?php endif; ?>
			<span class="downloadPdf">( <a href="<?=BASE_URL ?>article/download/<?= $row->ID?>" target="_blank">ಡೌನ್ಲೋಡ್ ಪಿಡಿಎಫ್</a> )</span>
		<?php endforeach;?>
	</div>
</div>
