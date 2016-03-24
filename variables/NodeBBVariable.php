<?php
namespace Craft;

class NodeBBVariable
{

/* --------------------------------------------------------------------------------
	Variables
-------------------------------------------------------------------------------- */

    function NodeBBEmbed($title = "", $category = "")
    {
		return craft()->nodebb_utils->outputEmbedTag($title = "", $category = "");
    } /* -- disqusEmbed */

}
