<?php 
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class NodeBBTwigExtension extends \Twig_Extension
{

/* --------------------------------------------------------------------------------
	Expose our filters and functions
-------------------------------------------------------------------------------- */

    public function getName()
    {
        return 'NodeBB';
    }

/* -- Return our twig filters */

    public function getFilters()
    {
        return array(
            'nodeBBEmbed' => new \Twig_Filter_Method($this, 'nodeBBEmbed_filter'),
        );
    } /* -- getFilters */

/* -- Return our twig functions */

    public function getFunctions()
    {
        return array(
            'nodeBBEmbed' => new \Twig_Function_Method($this, 'nodeBBEmbed_filter'),
        );
    } /* -- getFunctions */

/* --------------------------------------------------------------------------------
	Filters
-------------------------------------------------------------------------------- */

    function nodeBBEmbed_filter($title = "", $category = "")
    {
		return craft()->nodebb_utils->outputEmbedTag($title,$category);
    } /* -- nodeBBEmbed_filter */

} /* -- nodeBBTwigExtension */
