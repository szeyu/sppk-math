// page zoom to current zoom set in cookie when change page
function reloadToCurrentZoom(){
    currentZoom = parseInt(getCookie("currentZoom"));
    document.body.style.zoom = currentZoom + "%";
}

// function to get value of cookie
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
        // if current zoom more than 135% then do nothing
    }else{
        zoomIn = currentZoom+5; // zoom in 5%
        document.body.style.zoom = zoomIn + "%";
        document.cookie = "currentZoom=" + zoomIn; // store current zoom value in cookie
    }
}

function decreaseFontSize(){
    currentZoom = parseInt(getCookie("currentZoom"));
    console.log(currentZoom);
    if (currentZoom <= 75){
        // if current zoom less than 75% then do nothing
    }else{
        zoomOut = currentZoom-5; // zoom out 5%
        document.body.style.zoom = zoomOut + "%";
        document.cookie = "currentZoom=" + zoomOut; // store current zoom value in cookie
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