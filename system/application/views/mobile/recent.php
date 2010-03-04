<?php $this->load->view('mobile/header.php'); ?>
				<?php if(!empty($pastes)){
					function checkNum($num){
						return ($num%2) ? TRUE : FALSE;
					}?>
					<ul class="recent">
					<?	foreach($pastes as $paste) {
							if(checkNum($paste['id']) == TRUE) {
								$eo = "even";
							} else {
								$eo = "odd";
							}
					?>
						<li class="<?=$eo?>">
							<span class="title"><a href="<?=base_url()?>mobile/view/<?=$paste['pid']?>"><?=$paste['title']?></a></span>
							<span class="author"><?=$paste['name']?></span>
						</li>
						<? }?>
				
					
						<?=$pages?>
					</ul>
				<? } else { ?>
					<p>No pastes are currently available.</p>
				<? }?>	
					
				
<?php $this->load->view('mobile/footer.php'); ?>