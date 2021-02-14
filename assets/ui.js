
<!-- saved from url=(0040)http://purecss.io/combo/1.14.2?/js/ui.js -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style type="text/css"></style></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">(function (window, document) {

    var layout   = document.getElementById('layout'),
        menu     = document.getElementById('menu'),
        menuLink = document.getElementById('menuLink');

    function toggleClass(element, className) {
        var classes = element.className.split(/\s+/),
            length = classes.length,
            i = 0;

        for(; i &lt; length; i++) {
          if (classes[i] === className) {
            classes.splice(i, 1);
            break;
          }
        }
        // The className is not found
        if (length === classes.length) {
            classes.push(className);
        }

        element.className = classes.join(' ');
    }

    menuLink.onclick = function (e) {
        var active = 'active';

        e.preventDefault();
        toggleClass(layout, active);
        toggleClass(menu, active);
        toggleClass(menuLink, active);
    };

}(this, this.document));
</pre></body></html>