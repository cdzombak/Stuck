<?php $this->load->view('defaults/header'); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$(".expand").click(function(){
			$(".text_formatted").hide();
			$(".paste").css("width", "95%");
			$(".text_formatted").css("width", "100%");
			$(".text_formatted").css("margin-left", "0");
			$(".text_formatted").fadeIn(500);
			$("#expandPasteLink").fadeTo(500, 0, function() { $("#expandPasteLink").css("visibility", "hidden"); return false; } );
			return false;
		});
	});
</script>

<?php if(isset($insert)){
	echo $insert;
}?>

<div class="paste_info">
	<div class="info">
		<h1 class="pagetitle right"><? if ($private) { ?><img src="<?=base_url()?>static/images/icons/lock.png" class="icon" alt="This paste is private." title="This paste is private." /><? } ?><?=$title?></h1>
		<div class="meta">
			<span class="detail">By <strong><?=$name?></strong>, <? $p = explode(',', timespan($created, time())); echo $p[0]?> ago</span>
			<?php if(isset($inreply)){?><span class="detail reply">This paste is a reply to <a href="<?php echo $inreply['url']?>"><?php echo $inreply['title']; ?></a> by <?php echo $inreply['name']; ?></span><?php }?>
			<span class="detail"><span class="item">Language: </span><strong><?=$lang?></strong></span>
			<span class="detail"><span class="item">URL: </span><a href="<?=$url?>"><?=$url?></a></span>
			<?php if(!empty($snipurl)){?>
				<span class="detail"><span class="item">Snipurl: </span><a href="<?=$snipurl?>"><?php echo htmlspecialchars($snipurl) ?></a></span>
			<?php }?>
			<!--<span class="detail"><span class="item">Filename: </span><a href="<?=site_url("view/download/".$pid)?>"><?=$filename?></a></span>-->
		</div>
	</div>
	
	<ul class="actions">
		<li><img src="<?=base_url()?>static/images/icons/disk.png" class="icon" /><a href="<?=site_url("view/download/".$pid)?>">Download Paste</a> <em>(<?=$filename?>)</em></li>
		<? if(isset($replies) and !empty($replies)) { ?><li><img src="<?=base_url()?>static/images/icons/comments.png" class="icon" /><a href="#replies">View Replies</a> to this paste</li><? } ?>
		<li><img src="<?=base_url()?>static/images/icons/comment_add.png" class="icon" /><a href="#reply">Reply</a> to this paste</li>
		<li><img src="<?=base_url()?>static/images/icons/page_white_text.png" class="icon" /><a href="<?=site_url("view/raw/".$pid)?>">View Raw</a></li>
		<li id="expandPasteLink"><img src="<?=base_url()?>static/images/icons/arrow_out.png" class="icon" /><a href="#" class="expand">Expand Paste</a> to fill browser</li>
	</ul>
</div>

</div>
</div>
</div>
</div>

<div class="paste <?php if($full_width){ echo "full"; }?>">
	<div class="text_formatted <?php if($full_width){ echo "full"; }?>">
		<div class="container">
			<?=$paste?>
		</div>
	</div>
</div>

<? if(isset($replies) and !empty($replies)) { ?>
<div id="replies">
	<div class="container">
		<?php
		
		function checkNum($num){
			return ($num%2) ? TRUE : FALSE;
		}
		
		if(isset($replies) and !empty($replies)){
			$n = 1;
		?>
			<h1>Replies to this paste</h1>
			
			<table class="recent">
				<tbody>
					<tr>
						<th class="title">Title</th>
						<th class="name">Name</th>
						<th class="time">When</th>
					</tr>

			<?php foreach($replies as $reply){
					if(checkNum($n)){
						$eo = "even";
					} else {
						$eo = "odd";
					}
					$n++;
			?>
				
				<tr class="<?=$eo?>">
					<td class="first"><a href="<?=site_url('view/'.$reply['pid'])?>"><?=$reply['title']?></a></td>
					<td><?=$reply['name']?></td>
					<td><? $p = explode(",", timespan($reply['created'], time())); echo $p[0];?> ago.</td>
				</tr>
		
			<?php }?>
			</tbody>
			</table>
		<div class="spacer high"></div><div class="spacer high"></div>
		<?php }?>
	</div>
</div>
<? } ?>

<div id="reply">
	<div class="container">
		<?php 
			$reply_form['page']['title'] = "Reply to \"$title\"";
			//$reply_form['page']['anchor'] = 'reply';
			$reply_form['page']['instructions'] = 'Here you can reply to the paste above';
			$reply_form['isReplyToPrivate'] = $private;
			$this->load->view('defaults/paste_form', $reply_form);
		?>
	</div>
</div>

<?php $this->load->view('view/view_footer'); ?>
