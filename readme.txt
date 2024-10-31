=== PT AO90 ===
Contributors: wpportugal, webdados, alvarogois, ptwooplugins
Tags: AO90, portuguese, translations, Portugal, acordo ortográfico
Author URI: https://wp-portugal.com
Plugin URI: https://wp-portugal.com/traducao/plugin-pt-ao90/
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.0
Stable tag: 0.5
License: GPLv3

Sets WordPress language to Portuguese (AO90), according to the orthographic reform of 1990, and adds fallbacks to the pre-AO90 orthography.

== Description ==

The PT AO90 plugin sets WordPress language to Portuguese (AO90), according to the orthographic reform of 1990, and adds fallbacks to the pre-AO90 orthography, the default language pack for Portugal (the 1945 norm, reviewed in 1973), when AO90 translation is not available.

You don’t need this plugin to set the Portuguese (AO90) language, you can set it in WordPress options. But this enables fallbacks to the default Portuguese (pre-AO90) language packs, instead of WordPress defaults (en_US). WordPress does not currently supports language fallbacks, so using this plugin is the only way to have non-AO90 translated projects (plugins and themes) in Portuguese (pre-AO90) instead of English.

= Extra information =

No language files are included with this plugin. They are loaded from the official WordPress repository (GlotPress). Not every file has 100% strings translated for Portuguese (AO90), therefore, when you activate the plugin, some text may fallback to the default Portuguese pre-AO90 orthography.

The Portuguese Orthographic Agreement form available in the WordPress repository is mainly obtained by conversion with Lince software, by [ILTEC](http://www.portaldalinguaportuguesa.org/?action=lince).

= Credits =

This project is being curated by the [WordPress Portuguese Community](http://wp-portugal.com) and replaces [PT Variants](https://pt.wordpress.org/plugins/pt-variants/), now that the Portuguese (AO90) is included in [GlotPress](https://translate.wordpress.org/locale/pt). Let us know if it’s useful or if something isn’t right.

The ideas behind this plugin were suggested by [Preferred Languages](https://github.com/swissspidy/preferred-languages), [Pascal Birchler’s](https://profiles.wordpress.org/swissspidy) plugin available on GitHub.

The plugin’s banner is blatantly inspired on this [template](http://pt.365psd.com/psd/free-psd-switch-buttons-template-53516).

== Installation ==

Use the included automatic install feature on your WordPress admin panel and search for "PT AO90". That’s it. No options, just activate PT AO90 and you’re ready to go!

== Frequently Asked Questions ==

= Where do I report security vulnerabilities found in this plugin? =  
 
You can report any security bugs found in the source code of this plugin through the [Patchstack Vulnerability Disclosure Program](https://patchstack.com/database/vdp/pt-ao90). The Patchstack team will assist you with verification, CVE assignment and take care of notifying the developers of this plugin.

== Changelog ==

= 0.5 - 2024-05-01 =
* Apply WordPress Coding Standards
* Confirmed compatibility with PHP performant translations
* Upgrade to GPLv3
* Fix version tag
* Tested with WordPress 6.6-alpha-58055

= 0.4 - 2024-05-01 =
* Wrong version tag

= 0.3 - 2023-12-13 =
* Tested with WordPress 6.5-alpha-57159

= 0.2.0 - 2022-06-29 =
* Requires WordPress 5.0 and PHP 7.0
* Tested with WordPress 6.1-alpha-53556

= 0.1.3 =
* readme.txt small fix
* Tested with WordPress 5.0.1

= 0.1.2 =
* Fix banner credit URI

= 0.1.1 =
* Fix Author URI

= 0.1 =
* Initial release