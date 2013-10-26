<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php $language = array( 'english-utf8' => 'en', 'portuguese_pt-utf8' => 'pt' ); echo $language[$context['user']['language']]; ?>">
<head>
	<link rel="icon" href="/img/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="http://www.blacklair.com/f/Themes/gearbox_20/css/index.css?fin20" />
	<?php
	echo '
	<script type="text/javascript" src="', $settings['default_theme_url'], '/scripts/script.js?fin20"></script>
	<script type="text/javascript" src="', $settings['theme_url'], '/scripts/theme.js?fin20"></script>
	<script type="text/javascript"><!-- // --><![CDATA[
		var smf_theme_url = "', $settings['theme_url'], '";
		var smf_default_theme_url = "', $settings['default_theme_url'], '";
		var smf_images_url = "', $settings['images_url'], '";
		var smf_scripturl = "', $scripturl, '";
		var smf_iso_case_folding = ', $context['server']['iso_case_folding'] ? 'true' : 'false', ';
		var smf_charset = "', $context['character_set'], '";', $context['show_pm_popup'] ? '
		var fPmPopup = function ()
		{
			if (confirm("' . $txt['show_personal_messages'] . '"))
				window.open(smf_prepareScriptUrl(smf_scripturl) + "action=pm");
		}
		addLoadEvent(fPmPopup);' : '', '
		var ajax_notification_text = "', $txt['ajax_in_progress'], '";
		var ajax_notification_cancel_text = "', $txt['modify_cancel'], '";
	// ]]></script>';
	?>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="author" content="Mick3y16" />
	<meta name="keywords" content="<?php echo $context['meta_keywords']; ?>" />
	<meta name="description" content="BlackLair - Online Gaming Community" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $context['forum_name']; ?></title>
	<link rel="canonical" href="http://www.blacklair.com/f/index.php" />
	<link rel="help" href="http://www.blacklair.com/f/index.php?action=help" />
	<link rel="search" href="http://www.blacklair.com/f/index.php?action=search" />
	<link rel="contents" href="http://www.blacklair.com/f/index.php" />
	<link rel="alternate" type="application/rss+xml" title="BlackLair - Online Gaming Community - RSS" href="http://www.blacklair.com/f/index.php?type=rss;action=.xml" />
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<link rel="stylesheet" type="text/css" href="http://www.blacklair.com/f/Themes/default/css/highlight/github.css" />
	<link rel="stylesheet" type="text/css" href="http://www.blacklair.com/f/Themes/default/css/highlight/highlight.css" />
<body>
	<div id="topbar">
		<div class="wrapper">
			<div id="modnav">
			</div>
		</div>
	</div>
	<div id="main">
		<div class="wrapper">
			<div id="header">
				<h1 id="logo">
					<a href="http://www.blacklair.com/index.php">BlackLair - Online Gaming Community</a>
				</h1>
				<div id="search">
					<form action="http://www.blacklair.com/f/index.php?action=search2" method="post" accept-charset="<?php echo$context['character_set']; ?>">
						<input class="search_input" type="text" name="search" value="<?php echo $txt['forum_search']; ?>" onfocus="this.value = '';" onblur="if(this.value=='') this.value='<?php echo $txt['forum_search']; ?>';" />
					</form>
				</div>
			</div>
			<div id="content_section">
				<div id="toolbar">
			<ul id="topnav">
				<li id="button_web" class="firstlevel">
					<a class="active " href="/">
						<span class=""><?php echo $txt['manager_header_home']; ?></span>
					</a>
				</li>
				<li id="button_home" class="firstlevel">
					<a class="" href="/f/">
						<span class=""><?php echo $txt['manager_header_forum']; ?></span>
					</a>
				</li>
				<li id="button_wow" class="firstlevel">
					<a class="" href="">
						<span class=""><?php echo $txt['manager_header_wow']; ?></span>
					</a>
					<ul>
						<li>
							<a href="/wow/realm/">
								<span><?php echo $txt['manager_header_wow_realm']; ?></span>
							</a>
						</li>
						<li>
							<a href="/wow/online/">
								<span><?php echo $txt['manager_header_wow_online']; ?></span>
							</a>
						</li>
					</ul>
				</li>
				<li id="button_wowaccount" class="firstlevel">
					<a class="" href="">
						<span class=""><?php echo $txt['manager_header_wowaccount']; ?></span>
					</a>
					<ul>
						<li>
							<a href="/wowaccount/activate/">
								<span><?php echo $txt['manager_header_wowaccount_activate']; ?></span>
							</a>
						</li>
						<li>
							<a href="/wowaccount/info/">
								<span><?php echo $txt['manager_header_wowaccount_info']; ?></span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
					<span class="tb_left"></span>
					<span class="tb_right"></span>				
				</div>
				<div id="userbar">
					<div id="quicknav">
						<ul>
							<li><a class="social_icon facebook" href="http://www.facebook.com/BlackLairOGC" title="Facebook" target="_blank"></a></li>
						</ul>
					</div>
					<div id="account">
					<?php if ($context['user']['is_logged']) {
						echo '
						<ul>
							<li class="memb_greeting">', $txt['hello_member_ndt'], ' ', $context['user']['name'], '</li>
								<li><a href="', $scripturl, '?action=unread">' , $txt['show_unread'], '</a></li>
								<li><a class="last" href="', $scripturl, '?action=unreadreplies">' , $txt['show_replies'], '</a></li>
								<li><a class="last logout" href="', $scripturl, '?action=logout;sesc=', $context['session_id'], '"></a></li>
							</ul>';
					} else {
						echo '
						<script type="text/javascript" src="', $settings['default_theme_url'], '/scripts/sha1.js"></script>
						<form id="guest_form" action="', $scripturl, '?action=login2" method="post" accept-charset="', $context['character_set'], '" ', empty($context['disable_login_hashing']) ? ' onsubmit="hashLoginPassword(this, \'' . $context['session_id'] . '\');"' : '', '>
							<input type="text" name="user" class="login_id" />
							<input type="password" name="passwrd" class="login_pw" />
							<input type="submit" value="" class="login_button" />
							<a class="register" href="', $scripturl, '?action=register"></a>
							<input type="hidden" name="hash_passwrd" value="" />
						</form>'; 
					} ?>							
					</div>
				</div>
				<div id="dirt_top"></div>
				<div id="main_content">