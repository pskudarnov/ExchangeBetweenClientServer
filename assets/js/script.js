var startWidth = 480;
window.addEventListener("resize", function() {
//проверяем, что текущая ширина меньше заданной
    if( window.innerWidth < startWidth) {
        document.getElementsByClassName("left_column")[0].style.display = "none";
        document.getElementsByClassName("right_column")[0].style.display = "none";
        document.getElementsByClassName("center_column")[0].className = "center_column_add";
    } else {
        document.getElementsByClassName("left_column")[0].style.display = "";
        document.getElementsByClassName("right_column")[0].style.display = "";
        document.getElementsByClassName("center_column_add")[0].className = "center_column";
    }
});