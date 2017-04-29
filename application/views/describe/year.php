<?php
	$issue = $data[0]->issue;
?>

<div class="archive_title">ಸಂಪುಟ <span class="eng">(<?= intval($data[0]->volume) ?>)</span> - <span class="eng"><?= $data[0]->year ?></span></div>
	<div class="scroll">
		<div class="archive_title">ಸಂಚಿಕೆ <span class="eng">(<?= intval($data[0]->issue); ?>)</span> - <?= $viewHelper->monthNames[$data[0]->month] ?></div>
			<ul>
			<?php foreach($data as $row): ?>
				<?php if($issue == $row->issue):?>
					<li><span class="titlespan"><a href=<?php echo DJVU_URL . $row->volume . "/" . $row->issue . "/index.djvu?djvuopts&page=" . $viewHelper->getStartingPage($row->page) . "&zoom=page"; ?> target="_blank"><?= $row->title ?></a></span><?php if($row->authid != 0): ?><span><?= $viewHelper->getAuthorDetails($row->authorDetails); ?></span><?php endif; ?> <span class="downloadPdf">(<a href="<?=BASE_URL ?>article/download/<?= $row->ID?>" target="_blank">ಡೌನ್ಲೋಡ್ ಪಿಡಿಎಫ್</a>)</span>	</li>
				<?php else: ?>
					<?php $issue = $row->issue; ?>
					</ul><br/ ><div class="archive_title">ಸಂಚಿಕೆ <span class="eng">(<?= intval($row->issue); ?>)</span> - <?= $viewHelper->monthNames[$row->month] ?></div><ul>
				<?php endif; ?>
			<?php endforeach;?>
			</ul>
		</div>
	</div>
	<div class="column2">
	<script>
			getResult('ಸಂಪಾದಕೀಯ',2);
	</script>
</div>


