function flipLight(
    command,
    successCallback = function() {},
    errorCallback = function () {}
) {
    var request = new XMLHttpRequest();    

    request.open('POST', '/lightcontrol.php');
    request.setRequestHeader(
            'Content-Type',
            'application/x-www-form-urlencoded'
    );

    request.onload = successCallback;
    request.onerror = errorCallback;

    request.send("command=" + command);
}
