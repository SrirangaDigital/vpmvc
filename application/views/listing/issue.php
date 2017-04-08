<div class="archive_title">ಸಂಪುಟ <span class="eng">(<?= intval($data[0]->volume); ?>)</span> - <span class="eng"><?= $data[0]->year ?></span></div>
	<div class="scroll">
		<?php foreach($data as $row): ?>
			<div class="month_container"><span class="monthspan"><a href="<?=BASE_URL?>describe/issue/<?= $row->volume ?>/<?= $row->issue ?>/<?= $row->year ?>/<?= $row->month ?>"><?= $viewHelper->monthNames[$row->month]; ?></a></span></div>
		<?php endforeach;?>
	</div>
</div>
	
