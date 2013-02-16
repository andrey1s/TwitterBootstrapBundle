Getting Started With TwitterBootstrapBundle
==================================

## Installation

Installation is a quick (I promise!) 7 step process:

1. Download TwitterBootstrapBundle using composer
2. Enable the Bundle
3. Use the Bundle
4. Use with the KnpPaginatorBundle


### Step 1: Download TwitterBootstrapBundle using composer

Add TwitterBootstrapBundle in your composer.json:

```js
{
    "require": {
        "twitter/bootstrap-bundle": "*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update twitter/bootstrap-bundle
```

Composer will install the bundle to your project's `vendor/twitter` directory.


### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Twitter\BootstrapBundle\TwitterBootstrapBundle(),
    );
}
```


### Step 3: Use the bundle

in layout add extends
{% extends "TwitterBootstrapBundle::layout.html.twig" %}

if you want use only java scripts
{% include 'TwitterBootstrapBundle::javascripts.html.twig'%}

if you want use only CSS
{% include 'TwitterBootstrapBundle::stylesheets.html.twig'%}


### Step 4: Use with the [KnpPaginatorBundle](https://github.com/KnpLabs/KnpPaginatorBundle).

in twig template
``` html
{% pagination.setTemplate('TwitterBootstrapBundle:Pagination:sliding.html.twig') %}
```

in config

``` yaml
# app/config/config.yml
knp_paginator:
    template:
        pagination: TwitterBootstrapBundle:Pagination:sliding.html.twig
```
