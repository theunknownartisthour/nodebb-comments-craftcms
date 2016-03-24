<?php
namespace Craft;

class NodeBB_UtilsService extends BaseApplicationComponent
{

/* --------------------------------------------------------------------------------
    Output the NodeBB Tag
-------------------------------------------------------------------------------- */

    public function outputEmbedTag($title = "", $category = "")
    {
        $result = "";
        $settings = craft()->plugins->getPlugin('nodebb')->getSettings();

        if ($settings['useSSO'])
            $this->outputSSOTag();

        $nodebbHost = $settings['nodebbHost'];
        $obj = new stdClass();
        $obj->title_plain = $title;
        $obj->url="";
        $obj->tags = [];
        $obj->markDownContent= "";
        $obj->cid = $category; // OPTIONAL. Forces a Category ID in NodeBB.
                    // Omit it to fallback to specified IDs in the admin panel.
        
        echo <<<ENDBLOCK
<a id="nodebb-comments"></a>
<script type="text/javascript">
var nodeBBURL = '//$nodebbHost',
var articleID = ".getId().";
var articleData =".json_encode($obj).";

(function() {
var nbb = document.createElement('script'); nbb.type = 'text/javascript'; nbb.async = true;
nbb.src = nodeBBURL + '/plugins/nodebb-plugin-blog-comments/lib/generalphp.js';
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(nbb);
})();
</script>
<noscript>Please enable JavaScript to view comments</noscript>
ENDBLOCK;

        return $result;
    }

}
/*Merci Beaucoup @psychobunny https://github.com/psychobunny/nodebb-plugin-blog-comments*/
function getId(){
    return stringToInteger($_SERVER['REQUEST_URI']);
}
function stringToInteger($string) {
    $string = md5($string);
    $output = '1';
    for ($i = 0; $i < strlen($string); $i++) {
        $output .= (string) ord($string[$i]);
    }
    return (int) $output;
}
