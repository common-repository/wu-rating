=== Wu-Rating ===
Contributors: Mr.Wu
Donate link: https://me.alipay.com/mrwu1989
Tags: rating, Post, ajax
Requires at least: 2.7
Tested up to: 3.3
Stable tag: trunk

Wu-Rating can add a chosen in a post to rate the post,五星评级插件可以添加在每篇文章的末尾，通过Ajax方式给文章评级

。

== Description ==

Wu-Rating can add a chosen in a post to rate the post,五星评级插件可以添加在每篇文章的末尾，通过Ajax方式给文章评级

。

== Screenshots ==
1. 插件前台显示效果（评级前、评级后）
2. 可在边栏中调用最高评级

== Changelog ==

= 1.0 12319 =
* 优化代码
* 实现鼠标滑过即时点亮星星
* 增加一个css文件

= 1.0 Beta =
* ajax实现文章评级功能
* 实现边栏功能，可现实前10个评级最高的文章


== Installation ==

1. Upload the whole plugin folder to your /wp-content/plugins/ folder.
2. Place '<?php if(function_exists('wurating')) { wurating(); } ?>' in your templates.
3. Go to the Plugins page and activate the plugin.
4. Use the admin page to modify tool options.

== Upgrade Notice ==
= 1.0 12319 =
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.

== Frequently Asked Questions ==

= How do I correctly use this plugin? =

Place '<?php if(function_exists('wurating')) { wurating(); } ?>' in your templates.Just activating hte plugin will do the work. 

= 如何使用插件？ =

上传插件至插件目录，在模板中添加“<?php if(function_exists('wurating')) { wurating(); } ?>”，激活插件即可。