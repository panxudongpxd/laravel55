function login() {
    $("#b-modal-login").modal("show");
    setCookie("this_url", window.location.href)
}
function logout() {
    $.post(logoutUrl);
    setTimeout(function() {
        location.replace(location)
    },
    500)
}
function setCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString()
    } else {
        var expires = ""
    }
    document.cookie = name + "=" + value + expires + "; path=/"
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1, c.length)
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length, c.length)
        }
    }
    return null
}
function deleteCookie(name) {
    setCookie(name, "", -1)
}
function recordId(category, id) {
    setCookie("cid", 0);
    setCookie("tid", 0);
    setCookie("search_word", 0);
    if (category != "index" && category != "/") {
        setCookie(category, id)
    }
    return true
}
/*document.onkeydown = function() {
    if (event.keyCode == 116 || event.keyCode == 123) {
        event.keyCode = 0;
        event.returnValue = false
    }
};
document.oncontextmenu = function() {
    event.returnValue = false
};*/