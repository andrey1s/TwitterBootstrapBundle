<?php

namespace Twitter\BootstrapBundle\Twig;

use Symfony\Bridge\Twig\Extension\AssetExtension as BaseExtension;

class AssetsExtension extends \Twig_Extension
{
    /** @var array */
    private $assets = [];
    /** @var \Symfony\Bundle\TwigBundle\Extension\AssetsExtension */
    private $extension;
    /** @var array */
    private $pattern = [
        'stylesheets' => '<link href="{{ value }}" rel="stylesheet" type="text/css"/>',
        'javascripts' => '<script src="{{ value }}" type="text/javascript"></script>',
    ];

    /**
     * @param BaseExtension $extension
     * @param array         $assets
     * @param array         $pattern
     */
    public function __construct(BaseExtension $extension, array $assets = array(), array $pattern = array())
    {
        $this->extension = $extension;
        $this->assets = $assets;
        $this->pattern = array_merge($this->pattern, $pattern);
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'twitter_assets', array($this, 'assetsFunction'), array('is_safe' => array('html'))
            ),
        );
    }

    /**
     * Returns the public path of an asset in the pattens.
     *
     * Absolute paths (i.e. http://...) are returned unmodified.
     *
     * @param string           $type        A type assets
     * @param string           $packageName The name of the asset package to use
     * @param bool             $absolute    Whether to return an absolute URL or a relative one
     * @param string|bool|null $version     A specific version
     *
     * @return string
     */
    public function assetsFunction($type = 'stylesheets', $packageName = null, $absolute = false, $version = null)
    {
        $string = '';
        $data = isset($this->assets[$type]) ? $this->assets[$type] : array();
        if (isset($this->pattern[$type])) {
            foreach ($data as $value) {
                $url = $this->extension->getAssetUrl($value, $packageName, $absolute, $version);
                $string .= str_replace('{{ value }}', $url, $this->pattern[$type]);
            }
        }

        return $string;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'twitter_assets';
    }
}
