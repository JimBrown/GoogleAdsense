<?php
/**
 * google_adsense -- Places the adsense code for google adsense.
 *
 *	This plugin uses the 160 x 600 ad block.
 */

$plugin_is_filter = 5 | THEME_PLUGIN;
$plugin_description = gettext("Support for providing Google AdSense");
$option_interface = "google_adsenseOptions";

/**
 * insert the google adsense tracking code
 *
 */
function printGoogleAdSense() {
	$adsenseClient = getOption('adsenseClient');
	$adsenseSlot = getOption('adsenseSlot');
	if (!empty($adsenseClient) && !empty($adsenseSlot)) {
		?>
		<!-- Google AdSense -->
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- Zen-RCAG -->
			<ins class='adsbygoogle'
				 style='display:inline-block;width:160px;height:600px'
				 data-ad-client='<?php echo $adsenseClient; ?>'
				 data-ad-slot='<?php echo $adsenseSlot; ?>'></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		<!-- End Google AdSense -->
		<?php
	}
}
/**
 * Plugin option handling class
 *
 */
class google_adsenseOptions {

	function google_adsenseOptions() {
		setOptionDefault('adsenseClient', 'pub-################');
		setOptionDefault('adsenseSlot', '##########');
	}

	function getOptionsSupported() {
		return array(  gettext('Google AdSense client ID') => array(
									'order' => 0,
									'key' => 'adsenseClient',
									'type' => OPTION_TYPE_TEXTBOX,
									'desc' => gettext("If you're going to be using Google AdSense,").' <a	href="http://www.google.com/adsense/" target="_blank"> '.gettext("get an AdSense ID</a> and enter it here.")
						),
						gettext('Google AdSense Slot') => array (
									'order' => 1,
									'key' => 'adsenseSlot',
									'type' => OPTION_TYPE_TEXTBOX,
									'desc' => gettext('Enter the Google AdSense Ad unit ID here.')
						),
		);
	}

	function handleOption($option, $currentValue) {}
}
?>