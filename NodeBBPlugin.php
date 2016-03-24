<?php
namespace Craft;

class NodeBBPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('NodeBB');
    }

    public function getDescription()
    {
        return 'A simple plugin for integrating NodeBB into Craft CMS websites';
    }
    
    public function getDocumentationUrl()
    {
        return 'https://github.com/theunknownartisthour/nodebb-comments-craftcms/blob/master/README.md';
    }
    
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/theunknownartisthour/nodebb-comments-craftcms/master/releases.json';
    }
    
    public function getVersion()
    {
        return '1.0.1';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    function getDeveloper()
    {
        return 'theunknownartisthour';
    }

    function getDeveloperUrl()
    {
        return 'http://theunknownartisthour.com';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.disqus.twigextensions.NodeBBTwigExtension');

        return new NodeBBTwigExtension();
    }

    protected function defineSettings()
    {
        return array(
            'nodebbHost' => array(AttributeType::String, 'label' => 'Forum Host', 'default' => ''),
        );
    }

    public function getSettingsHtml()
    {
       return craft()->templates->render('nodebb/settings', array(
           'settings' => $this->getSettings()
       ));
    }

}
