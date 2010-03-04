<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Sliict//EN"
	"http://www.w3.org/li/xhtml1/DTD/xhtml1-sliict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
		<title><?php echo $this->config->item('site_name');?> Mobile</title>
		<link rel="stylesheet" href="<?=base_url()?>static/styles/mobile.css" type="text/css" media="screen" title="mobile stylesheet" charset="utf-8" />
	</head>
	<body>
		<div id="container">
			<div class="header">
				<div class="container">
					<div class="logo"><?php echo $this->config->item('site_name'); ?></div>
					<div class="toolbar">	
						<ul>
							<?php $page = $this->uri->segment(2); // There is currently only one link so the active link may seem pointless but this future proofs it. ?>
							<li class="<?if($page =="" || $page == "view"){?>active<?}?>"><a href="<?=base_url()?>mobile">Recent</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="content">