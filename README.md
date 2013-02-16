### add AppKernel
new Twitter\BootstrapBundle\TwitterBootstrapBundle(),


###use layout
{% extends "TwitterBootstrapBundle::layout.html.twig" %}


### use JS
{% include 'TwitterBootstrapBundle::javascripts.html.twig'%}


### use CSS
{% include 'TwitterBootstrapBundle::stylesheets.html.twig'%}


### paginator
template
{% pagination.setTemplate('TwitterBootstrapBundle:Pagination:sliding.html.twig') %}

config
knp_paginator:
    template:
        pagination: TwitterBootstrapBundle:Pagination:sliding.html.twig
