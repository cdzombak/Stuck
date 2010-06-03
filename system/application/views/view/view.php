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
		<h1 class="pagetitle right"><?php if ($private) { ?><img src="<?php echo base_url();?>static/images/icons/lock.png" class="icon" alt="This paste is private." title="This paste is private." /><?php } ?><?php echo $title;?></h1>
		<div class="meta">
			<span class="detail">By <strong><?php echo $name;?></strong>, <?php $p = explode(',', timespan($created, time())); echo $p[0]?> ago</span>
			<?php if(isset($inreply)){?><span class="detail"><span class="item">In Reply To: </span><strong><a href="<?php echo $inreply['url']?>"><?php echo $inreply['title']; ?></a></strong> by <?php echo $inreply['name']; ?></span><?php }?>
			<span class="detail"><span class="item">Language: </span><strong><?php echo $lang;?></strong></span>
			<span class="detail"><span class="item">URL: </span><a href="<?php echo $url;?>"><?php echo $url;?></a></span>
			<?php if(!empty($snipurl)){?>
				<span class="detail"><span class="item">Snipurl: </span><a href="<?php echo $snipurl;?>"><?php echo htmlspecialchars($snipurl) ?></a></span>
			<?php }?>
			<!--<span class="detail"><span class="item">Filename: </span><a href="<?php echo site_url("view/download/".$pid);?>"><?php echo $filename;?></a></span>-->
		</div>
	</div>
	
	<ul class="actions">
		<li><img src="<?php echo base_url();?>static/images/icons/disk.png" class="icon" /><a href="<?php echo site_url("view/download/".$pid);?>">Download Paste</a> <em>(<?php echo $filename;?>)</em></li>
		<?php if(isset($inreply)){?><li><img src="<?php echo base_url();?>static/images/icons/arrow_up.png" class="icon" /><a href="<?php echo $inreply['url']?>">View Parent</a><?php }?>
		<?php if(isset($replies) and !empty($replies)) { ?><li><img src="<?php echo base_url();?>static/images/icons/comments.png" class="icon" /><a href="#replies">View Replies</a> to this paste</li><?php } ?>
		<li><img src="<?php echo base_url();?>static/images/icons/comment_add.png" class="icon" /><a href="#reply">Reply</a> to this paste</li>
		<li><img src="<?php echo base_url();?>static/images/icons/page_white_text.png" class="icon" /><a href="<?php echo site_url("view/raw/".$pid);?>">View Raw</a></li>
		<li id="expandPasteLink"><img src="<?php echo base_url();?>static/images/icons/arrow_out.png" class="icon" /><a href="#" class="expand">Expand Paste</a> to fill browser</li>
	</ul>
</div>

</div>
</div>
</div>
</div>

<div class="paste <?php if($full_width){ echo "full"; }?>">
	<div class="text_formatted <?php if($full_width){ echo "full"; }?>">
		<div class="container">
			<?php echo $paste;?>
		</div>
	</div>
</div>

<?php if(isset($replies) and !empty($replies)) { ?>
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
				
				<tr class="<?php echo $eo;?>">
					<td class="first"><a href="<?php echo site_url('view/'.$reply['pid']);?>"><?php echo $reply['title'];?></a></td>
					<td><?php echo $reply['name'];?></td>
					<td><?php $p = explode(",", timespan($reply['created'], time())); echo $p[0];?> ago.</td>
				</tr>
		
			<?php }?>
			</tbody>
			</table>
		<div class="spacer high"></div><div class="spacer high"></div>
		<?php }?>
	</div>
</div>
<?php } ?>

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
