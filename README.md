# NodeBB plugin for Craft CMS

A simple plugin for integrating [NodeBB](https://nodebb.org/) into [Craft CMS](http://buildwithcraft.com) websites

**Installation**

1. Download & unzip the file and place the `NodeBB` directory into your `craft/plugins` directory
2.  -OR- do a `git clone hhttps://github.com/theunknownartisthour/nodebb-comments-craftcms.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. The plugin folder should be named `nodebb` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

## Configuring NodeBB

First, make sure you have [install nodebb-plugin-blog-comments](https://github.com/psychobunny/nodebb-plugin-blog-comments).

Next in the Craft Admin CP, go to Settings->Plugins->NodeBB and enter the host for your NodeBB site.  This is the only required setting for the NodeBB plugin.

## Using the NodeBB plugin in your templates

Both of these methods accomplish the same thing:

	{# Output the NodeBB embed code using the 'nodeBBEmbed' function #}
    {{ nodeBBEmbed( TITLE, CATEGORY) }}

All of the parameters except for `nodebbHost` are optional.  For more information on what these parameters are, please see [Javascript configuration variables](https://help.disqus.com/customer/portal/articles/472098-javascript-configuration-variables)

In its most basic case, this will result in output to your Craft template that looks like this:

	<a id="nodebb-comments"></a>
	<script type="text/javascript">
	var nodeBBURL = '//nodebbHost',
	var articleID = ".generatedID.";
	var articleData =".generatedContent.";
	(function() {
	var nbb = document.createElement('script'); nbb.type = 'text/javascript'; nbb.async = true;
	nbb.src = nodeBBURL + '/plugins/nodebb-plugin-blog-comments/lib/generalphp.js';
	(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(nbb);
	})();
	</script>
	<noscript>Please enable JavaScript to view comments</noscript>

The `nodebbHost` setting is taken from the Admin CP settings, and the rest of the settings are passed in as variables from the `nodeBBEmbed` Twig filter/function.
