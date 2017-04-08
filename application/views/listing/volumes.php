<div class="archive_title">ಸಂಪುಟಗಳು</div>
	<div class="scroll">
		<?php foreach($data as $row): ?>
			<div class="imggallery">
				<a href="<?=BASE_URL?>listing/issue/<?= $row->volume ?>/<?= $row->year ?>/"><img src="<?= PUBLIC_URL ?>images/coverpages/<?= $row->volume . ".gif"; ?>" alt="Volume Cover Page" /></a>
			</div>
		<?php endforeach;?>
	</div>
</div>
	
