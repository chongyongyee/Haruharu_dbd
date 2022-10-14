/* <script src="https://code.jqeury.com/jquery-3.5.1.js"></script> */

$(window).scroll(function(){
    if($(window).scrollTop()){
        $("nav").addClass("black");
    }
    else{
        $("nav").removeClass("red");
    }
});

