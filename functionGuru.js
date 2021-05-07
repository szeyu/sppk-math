// page zoom
function reloadToCurrentZoom(){
    currentZoom = parseInt(getCookie("currentZoom"));
    document.body.style.zoom = currentZoom + "%";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
}

function increaseFontSize(){
    currentZoom = parseInt(getCookie("currentZoom"));
    console.log(currentZoom);
    if (currentZoom >= 135){
        //
    }else{
        zoomIn = currentZoom+5;
        document.body.style.zoom = zoomIn + "%";
        document.cookie = "currentZoom=" + zoomIn;
    }
}

function decreaseFontSize(){
    currentZoom = parseInt(getCookie("currentZoom"));
    console.log(currentZoom);
    if (currentZoom <= 75){
        //
    }else{
        zoomOut = currentZoom-5;
        document.body.style.zoom = zoomOut + "%";
        document.cookie = "currentZoom=" + zoomOut;
    }
}





// url
function homeGuru(){
    window.location = 'indexGuru.php?content=homeGuru';
}

function createGuru(){
    window.location = 'indexGuru.php?content=createGuru';
}

function collectionGuru(){
    window.location = 'indexGuru.php?content=collectionGuru';
}

function checkGuru(){
    window.location = 'indexGuru.php?content=checkGuru';
}