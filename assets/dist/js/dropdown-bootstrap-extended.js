"use strict";var dropdownSelectors=$(".dropdown, .dropup");function dropdownEffectData(n){var o=null,d=null,t=$(n),e=$(".dropdown-menu",n),r=t.parents("ul.nav");return r.length>0&&(o=r.data("dropdown-in")||null,d=r.data("dropdown-out")||null),{target:n,dropdown:t,dropdownMenu:e,effectIn:e.data("dropdown-in")||o,effectOut:e.data("dropdown-out")||d}}function dropdownEffectStart(n,o){o&&(n.dropdown.addClass("dropdown-animating"),n.dropdownMenu.addClass("animated"),n.dropdownMenu.addClass(o))}function dropdownEffectEnd(n,o){n.dropdown.one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){n.dropdown.removeClass("dropdown-animating"),n.dropdownMenu.removeClass("animated"),n.dropdownMenu.removeClass(n.effectIn),n.dropdownMenu.removeClass(n.effectOut),"function"==typeof o&&o()})}dropdownSelectors.on({"show.bs.dropdown":function(){var n=dropdownEffectData(this);dropdownEffectStart(n,n.effectIn)},"shown.bs.dropdown":function(){var n=dropdownEffectData(this);n.effectIn&&n.effectOut&&dropdownEffectEnd(n,function(){})},"hide.bs.dropdown":function(n){var o=dropdownEffectData(this);o.effectOut&&(n.preventDefault(),dropdownEffectStart(o,o.effectOut),dropdownEffectEnd(o,function(){o.dropdown.removeClass("show"),o.dropdownMenu.removeClass("show")}))}});