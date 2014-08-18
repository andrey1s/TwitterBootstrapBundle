Getting Started With TwitterBootstrapBundle
===========================================

## Installation and usage

Installation and usage is a quick:

1. Download TwitterBootstrapBundle using composer
2. Enable the Bundle
3. Use the Bundle
4. Use with the KnpPaginatorBundle
5. Use with the Form
6. Replace stylesheets or/and javascripts
7. Use [FOSUserBundle](https://github.com/andrey1s/TwitterBootstrapBundle/blob/master/Resources/doc/FOSUserBundle.md)


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
``` htm
{% extends "TwitterBootstrapBundle::layout.html.twig" %}
```

if you want use only java scripts
``` html
{{ twitter_assets('javascripts') }}
```
or
``` html
{% include 'TwitterBootstrapBundle::javascripts.html.twig'%}
```

if you want use only CSS
``` html
{{ twitter_assets('stylesheets') }}
```
or
``` html
{% include 'TwitterBootstrapBundle::stylesheets.html.twig'%}
```

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


### Step 5: Use with the Form.

in twig template
``` html
{% form_theme form 'TwitterBootstrapBundle:Form:horizontal_form.html.twig' %}
```

in config

``` yaml
# app/config/config.yml
twig:
    form:
        resources:
            - 'TwitterBootstrapBundle:Form:horizontal_form.html.twig'
```

if you want to use a inline form

in twig template
``` html
{% form_theme form 'TwitterBootstrapBundle:Form:inline_form.html.twig' %}
```
or global

``` yaml
# app/config/config.yml
twig:
    form:
        resources:
            - 'TwitterBootstrapBundle:Form:inline_form.html.twig'
```

Prepended and appended inputs

in Form Type

``` php
$builder->add('Cost', 'text', array('attr' => array('append_input' => '.00')));
$builder->add('Cost', 'text', array('attr' => array('prepend_input' => '$')));
$builder->add('Cost', 'text', array('attr' => array('prepend_input' => '$','append_input' => '.00')));
```

or in html

``` html
{{ form_widget(form, {'attr': {'append_input': '.00'}}) }}
```

### Step 6: Replace stylesheets or/and javascripts.

``` yaml
# app/config/config.yml
twitter_bootstrap:
    assets:
        stylesheets:
            - bundles/twitterbootstrap/css/bootstrap.min.css
            - bundles/twitterbootstrap/css/bootstrap-responsive.min.css
        javascripts:
            - bundles/twitterbootstrap/js/bootstrap.min.js
            - //ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js
```
