function get(url) {
    return new Promise((callbackSucces, callbackErreur) => {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    callbackSucces(xhr.responseText);
                } else {
                    callbackErreur(xhr.responseText);
                }
            }
        };

        xhr.open('GET', url);
        xhr.send(null);
    });
}

function post(url, callback, body) {
    return new Promise((callbackSucces, callbackErreur) => {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    callbackSucces(xhr.responseText);
                } else {
                    callbackErreur(xhr.responseText);
                }
            }
        };

        xhr.open('POST', callback);
        xhr.send(body);
    });
}

Promise.resolve(get('/supjeans/api/article?action=getListeArticle')).then(
    res => {console.log(res)},
    err => {console.log("ERREUR :" + err);}
);
