// loading.js
document.addEventListener("DOMContentLoaded", function() {
    var loadingElement = document.getElementById("loading");
    loadingElement.style.display = "flex";

    window.addEventListener("load", function() {
        loadingElement.style.display = "none";
    });
});
