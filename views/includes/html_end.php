    </div>
<script type="text/javascript">
$(document).ready(function() {
//hide submenus
    $(".sub").hide();
//slidedown submenu when parent is hovered over
    $(".main").hover(function(){
        $(this).children(".sub").slideDown(1000);
        $(this).children(".sub").css("display","block")
    },
    function(){
        $(this).children(".sub").fadeOut(1000);
    });
    $(this).children(".sub").css("display","none");
    $("#accordion").accordion();
});
</script>