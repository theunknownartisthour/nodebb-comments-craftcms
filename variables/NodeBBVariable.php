<?php
namespace Craft;

class NodeBBVariable
{

/* --------------------------------------------------------------------------------
	Variables
-------------------------------------------------------------------------------- */

    function NodeBBEmbed($disqusIdentifier = "", $disqusTitle = "", $disqusUrl = "", $disqusCategoryId = "")
    {
		return craft()->nodebb_utils->outputEmbedTag($disqusIdentifier, $disqusTitle, $disqusUrl, $disqusCategoryId);
    } /* -- disqusEmbed */

}
