Overriding FOSUserBundle Templates
==================================

## Installation FOSUserBundle

please read [Getting Started With FOSUserBundle](https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Resources/doc/index.md)

## Overriding Templates

please read [Overriding Default FOSUserBundle Templates](https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Resources/doc/overriding_templates.md)

for example usage `b) Create A Child Bundle And Override Template`

###in Registration layout

``` html
{# src/Acme/UserBundle/Resources/view/Registration/register.html.twig #}
{% extends "TwitterBootstrapBundle::layout.html.twig" %}

{% use "TwitterBootstrapBundle:FOSUser:register.html.twig" %}
{% block stylesheets %}
    {{ parent() }}
    {{ block('style_register') }}
{% endblock %}
{% block container %}
    {{ block('fos_user_register') }}
{% endblock %}
```

###in Login layout

``` html
{# src/Acme/UserBundle/Resources/view/Security/login.html.twig #}
{% extends "TwitterBootstrapBundle::layout.html.twig" %}

{% use "TwitterBootstrapBundle:FOSUser:login.html.twig" %}
{% block stylesheets %}
    {{ parent() }}
    {{ block('style_login') }}
{% endblock %}
{% block container %}
    {{ block('fos_user_login') }}
{% endblock %}

```

###If you want to use both patterns for example
but do not forget that the registration form is on a different path

``` html
{# src/Acme/UserBundle/Resources/view/Security/login.html.twig #}
{% extends "TwitterBootstrapBundle::layout.html.twig" %}

{% use "TwitterBootstrapBundle:FOSUser:login.html.twig" %}
{% use "TwitterBootstrapBundle:FOSUser:register.html.twig" %}
{% block stylesheets %}
    {{ parent() }}
    {{ block('style_login') }}
    {{ block('style_register') }}
{% endblock %}
{% block container %}
    {{ block('fos_user_login') }}
    {% render(controller('FOSUserBundle:Registration:register'))%}
{% endblock %}

```
