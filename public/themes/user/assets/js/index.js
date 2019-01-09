$(function(){
    $(".menu").on("click",function(){
        $(".menuBox").fadeIn(200)
    })
    $(".menu-close").on("click",function(){
        $(".menuBox").fadeOut(200)
    })
})