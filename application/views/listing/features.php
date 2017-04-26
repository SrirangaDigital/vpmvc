<div class="archive_title">ಸ್ಥಿರ ಶೀರ್ಷಿಕೆಗಳು</div>
	<div class="scroll">
		<ul>
			<?php foreach($data as $row): ?>
				<li><span class="featurespan"><a href="<?= BASE_URL?>describe/feature/<?= $row->feature; ?>"><?= $row->feature ?></a></span></li>
			<?php endforeach;?>
		</ul>
	</div>
</div>
	
