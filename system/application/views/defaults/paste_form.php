<script type="text/javascript">
	$(document).ready(function(){
		$(".show").click(function(){
			$(".advanced").hide();
			$(".advanced_options").show();
			return false;
		});
	});
</script>

<?php if(isset($this->validation->error_string)){ echo $this->validation->error_string; }?>
<div class="form_wrapper margin">
	<form action="<?php echo base_url();?>" method="post">

		<h1 id="<?php echo isset($page['anchor']) ? $page['anchor'] : ""; ?>"><?php echo !isset($page['title']) ? 'Create a new paste' : $page['title']; ?></h1>
		<!--<p class="explain border"><?php if(!isset($page['instructions'])){ ?>
			Here you can create a new paste
		<?php } else { ?>
			<?php echo $page['instructions']; ?>
		<?php } ?></p>-->
		
		<div class="item_group">
			<div class="item">
				<label for="name">Author
					<span class="instruction">What's your name?</span>
				</label>
				
				<?php $set = array('name' => 'name', 'id' => 'name', 'value' => $name_set, 'maxlength' => '64', 'tabindex' => '1');
				echo form_input($set);?>
			</div>
			
			<div class="item">
				<label for="title">Title
					<span class="instruction">Give your paste a title.</span>
				</label>
				
				<input value="<?php if(isset($title_set)){ echo $title_set; }?>" type="text" id="title" name="title" tabindex="2" size="50" maxlength="128" />
			</div>
			
			<div class="item last">
				<label for="lang">Language
					<span class="instruction">What language is your paste written in?</span>
				</label>
				
				<?php $lang_extra = 'id="lang" class="select" tabindex="3"'; echo form_dropdown('lang', $languages, $lang_set, $lang_extra); ?>
			</div>
		</div>
		
		<div class="item">
			<label for="paste">Your paste
				<span class="instruction">Paste your paste here</span>
			</label>
			
			<textarea name="code" cols="40" rows="20" tabindex="4"><?php if(isset($paste_set)){ echo $paste_set; }?></textarea>
		</div>
		
		<div class="item_group">
			<div class="item">
				<label for="snipurl">Create a snipurl
					<span class="instruction">Create a shorter url that redirects to your paste?</span>
				</label>
				<div class="text_beside">
					<?php
						$set = array('name' => 'snipurl', 'id' => 'snipurl', 'value' => '1', 'tabindex' => '5', 'checked' => $snipurl_set);
						echo form_checkbox($set);
					?><p>Create a snipurl</p>
				</div>
			</div>
		
			<div class="item">
				<label for="private">Private
					<span class="instruction"><?php if (isset($isReplyToPrivate) && $isReplyToPrivate) { ?>This is a reply to a private post; your reply should probably be private as well.<?php } else { ?>Private pastes aren't shown in recent listings.<?php } ?></span>
				</label>
				<div class="text_beside">
					<?php
						if (isset($isReplyToPrivate) && $isReplyToPrivate) $private_set = TRUE;
						$set = array('name' => 'private', 'id' => 'private', 'tabindex' => '6', 'value' => '1', 'checked' => $private_set);
						echo form_checkbox($set);
					?><p>Make Private</p>
				</div>
			</div>
		
			<div class="item">
				<label for="expire">Delete After
					<span class="instruction">When should we delete your paste?</span>
				</label>
				<?php 
					$expire_extra = 'id="expire" class="select" tabindex="7"';
					$options = array(
									"0" => "Keep Forever",
									"30" => "30 Minutes",
									"60" => "1 hour",
									"360" => "6 Hours",
									"720" => "12 Hours",
									"1440" => "1 Day",
									"10080" => "1 Week",
									"40320" => "4 Weeks"
								);
				echo form_dropdown('expire', $options, $expire_set, $expire_extra); ?>
			</div>
		</div>
		
		<div class="item advanced">
			<p>Feeling clever? Set some <a href="#" class="show control">advanced</a> options.</p>
		</div>
		
		<div class="advanced_options hidden item_group">
			<div class="item">
				<label for="acopy">Auto Copy Link
					<span class="instruction">Auto-copy the link to your clipboard?</span>
				</label>
				<div class="text_beside">
					<?php
						$set = array('name' => 'acopy', 'id' => 'acopy', 'tabindex' => '8', 'value' => '1', 'checked' => $acopy_set);
						echo form_checkbox($set);
					?>
					<p>Auto copy link</p>
				</div>
			</div>
			
			<div class="item last">
				<label for="remember">Remember You
					<span class="instruction">Remember your settings for next time?</span>
				</label>
				<div class="text_beside">
					<?php
						$set = array('name' => 'remember', 'id' => 'remember', 'tabindex' => '9', 'value' => '1', 'checked' => $remember_set);
						echo form_checkbox($set);
					?>
					<p>Remember me</p>
				</div>
			</div>
		</div>
		
		<?php if($reply){?>
		<input type="hidden" value="<?php echo $reply; ?>" name="reply" />
		<?php }?>
		
		<div><button type="submit" value="submit" name="submit">Create</button></div>
		<div class="spacer"></div>
	</form>
</div>
