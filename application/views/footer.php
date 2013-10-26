<?php
	echo '
	<script type="text/javascript"><!-- // --><![CDATA[
		var oInfoCenterToggle = new smc_Toggle({
			bToggleEnabled: true,
			bCurrentlyCollapsed: ', empty($options['collapse_header_ic']) ? 'false' : 'true', ',
			aSwappableContainers: [
				\'upshrinkHeaderIC\'
			],
			aSwapImages: [
				{
					sId: \'upshrink_ic\',
					srcExpanded: smf_images_url + \'/collapse.gif\',
					altExpanded: ', JavaScriptEscape($txt['upshrink_description']), ',
					srcCollapsed: smf_images_url + \'/expand.gif\',
					altCollapsed: ', JavaScriptEscape($txt['upshrink_description']), '
				}
			],
			oThemeOptions: {
				bUseThemeSettings: ', $context['user']['is_guest'] ? 'false' : 'true', ',
				sOptionName: \'collapse_header_ic\',
				sSessionVar: ', JavaScriptEscape($context['session_var']), ',
				sSessionId: ', JavaScriptEscape($context['session_id']), '
			},
			oCookieOptions: {
				bUseCookie: ', $context['user']['is_guest'] ? 'true' : 'false', ',
				sCookieName: \'upshrinkIC\'
			}
		});
	// ]]></script>';
	?>
	<script type="text/javascript" src="http://www.blacklair.com/f/Themes/default/scripts/highlight.pack.js"></script>
	<script type="text/javascript">hljs.tabReplace = "    "; hljs.initHighlightingOnLoad();</script>
				</div>
				<div id="dirt_bottom"></div>
				<div id="footer">
					<div class="ds_copyright">
						<p class="smalltext"><a href="/home/tos/"><?php echo $txt['manager_footer_tos']; ?></a> · <a href="/home/refunds/"><?php echo $txt['manager_footer_refunds']; ?></a> · <a href="mailto:admin@blacklair.com"><?php echo $txt['manager_footer_contact']; ?></a></p>
						<p class="smalltext"><?php echo $txt['manager_footer_copyright']; ?></p>
					</div>
					<a class="backtop" href="#"></a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>