function get(url) {
    return new Promise((callbackSucces, callbackErreur) => {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    callbackSucces(JSON.parse(xhr.responseText));
                } else {
                    callbackErreur(xhr.responseText);
                }
            }
        };

        xhr.open('GET', url);
        xhr.send(null);
    });
}

function post(url, body) {
    return new Promise((callbackSucces, callbackErreur) => {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    callbackSucces(JSON.parse(xhr.responseText));
                } else {
                    callbackErreur(xhr.responseText);
                }
            }
        };

        xhr.open('POST', url);
        xhr.send(body);
    });
}

// ARTICLES

function getListeArticles() {
    return Promise.resolve(get('/supjeans/api/article?action=getListeArticles'));
}

function getListeArticlesCategorie(idCategorie) {
    return Promise.resolve(get('/supjeans/api/article?action=getListeArticlesCategorie&idCategorie=' + idCategorie));
}

function getListeArticlesMarque(idMarque) {
    return Promise.resolve(get('/supjeans/api/article?action=getListeArticlesMarque&idMarque=' + idMarque));
}

function getArticle(idArticle) {
    return Promise.resolve(get('/supjeans/api/article?action=getArticle&idArticle=' + idArticle));
}

// CATEGORIES

function getListeCategories() {
    return Promise.resolve(get('/supjeans/api/categorie?action=getListeCategories'));
}

function getCategorie(idCategorie) {
    return Promise.resolve(get('/supjeans/api/categorie?action=getCategorie&idCategorie=' + idCategorie));
}

// MARQUES

function getListeMarques() {
    return Promise.resolve(get('/supjeans/api/marque?action=getListeMarques'));
}

function getMarque(idMarque) {
    return Promise.resolve(get('/supjeans/api/marque?action=getMarque&idMarque=' + idMarque));
}

// COMMANDES

function getListeCommandes() {
    return Promise.resolve(get('/supjeans/api/commande?action=getListeCommandes'));

}

// COMPTE

function inscription(utilisateur) {
    return Promise.resolve(post('/supjeans/api/utilisateur?action=inscription', utilisateur));
}
