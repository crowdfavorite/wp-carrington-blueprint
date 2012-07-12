/**
 * Placeholder
 * Crowd Favorite
 * @requires jQuery v1.2 or above
 *
 * Version: 1.1
 * Patches the HTML5 placeholder atttribute functionality for browsers that don't support it
 */
(function(c){c.fn.placeholder=function(f){var g=c.extend({},c.fn.placeholder.settings,f);var e=null;var h=function(){c("["+g.attribute+"]."+g.classname).val("")};if(g.attribute=="placeholder"&&g.disableIfSupported==true&&"placeholder" in document.createElement("input")){return}if("undefined"===typeof document.activeElement){if(c().jquery.split(".")>="1.6".split(".")){e=c(c("*:focus").get(0))}}else{e=c(document.activeElement)}this.each(function(){var i=c(this);i.focus(function(){b(i,g)});i.blur(function(){d(i,g)});i.blur();i.parents("form").submit(function(){});if(i.filter(c(e)).length){c(e).focus()}});c(window).unbind("unload",h);c(window).unload(h)};c.fn.placeholder.settings={classname:"cfp-placeholder",attribute:"placeholder",disableIfSupported:true};c.placeholders=function(e){var f=c.extend({},c.fn.placeholder.settings,e);c("["+f.attribute+"]").placeholder(f)};function b(e,f){e=c(e);if(e.hasClass(f.classname)){e.val("");e.removeClass(f.classname)}}function d(e,f){e=c(e);if(e.val()===""){e.addClass(f.classname);e.val(e.attr(f.attribute))}}function a(f,e){c(f).find("["+e.attribute+"]").each(function(){var g=c(this);if(g.hasClass(e.classname)){g.val("")}})}})(jQuery);