(function(window) {
    var ajaxUtils = {};

    ajaxUtils.$POST = function(Url, handler, data = {}) {
        requestObj = (new XMLHttpRequest());

        requestObj.onreadystatechange = function() {
            if(requestObj.readyState == 4 && requestObj.status == 200) {
                handler(requestObj);
            }
        }

        requestObj.open("POST", Url, true);
        requestObj.send(data);
    }

    ajaxUtils.$GET = function(Url, handler) {
        requestObj = (new XMLHttpRequest());

        requestObj.onreadystatechange = function() {
            if(requestObj.readyState == 4 && requestObj.status == 200) {
                handler(requestObj);
            }
        }

        requestObj.open("GET", Url, true);
        requestObj.send(null);
    }

    window.ajaxUtils = ajaxUtils;
})(window);