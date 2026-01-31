# Language Attribute

In header part, for dynamic laguage attribute we need to change default one, from

`<html lang="en">`

to,

`<html lang="<?php language_attributes(); ?>">`

And the default language will get dynamically from, `WordPress --> settings --> general --> Site Language`

## Meta charset

Change default static meta charset from,

`<meta charset="UTF-8">`

to,

`<meta charset="<?php bloginfo('charset'); ?>">`

## Site Title

Change static site title from,

`<title>Document</title>`

to dynamic title,

`<title> <?php wp_title( '|', true, 'right' ); ?> </title>`

## Add `<?php body_class(); ?>` in body tag

Add `<?php body_class(); ?>` in body tag for futher wordpress dynamic class add

`<body <?php body_class(); ?>>`
