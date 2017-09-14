
// DOM Ready
$(function() {

    var $el, leftPos, newWidth;
        $mainNav3 = $("#menu-productos");
    /*
        EXAMPLE TREE
    */
    
    $mainNav3.append("<li id='magic-line-tree'></li>");
    
    var $magicLineTwo = $("#magic-line-tree");
    
    $magicLineTwo
        .width($(".current_page_menu-productos").width())
        
        .css("left", $(".current_page_menu-productos a").position().left)
        .data("origLeft", $(".current_page_menu-productos a").position().left)
        .data("origWidth", $magicLineTwo.width())
        .data("origColor", $(".current_page_menu-productos a").attr("rel"));
                
    $("#menu-productos a").hover(function() {
        $el = $(this);
        leftPos = $el.position().left;
        newWidth = $el.parent().width();
        $magicLineTwo.stop().animate({
            left: leftPos,
            width: newWidth,
            backgroundColor: $el.attr("rel")
        })
    }, function() {
        $magicLineTwo.stop().animate({
            left: $magicLineTwo.data("origLeft"),
            width: $magicLineTwo.data("origWidth"),
            backgroundColor: $magicLineTwo.data("origColor")
        });    
    });
    
    /* Kick IE into gear */
    $(".current_page_menu-productos a").mouseenter();
    
});