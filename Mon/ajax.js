$(document).ready(function(){
    $(".hk").change(function(){
        var idhk = $(".hk").val();
        $.post("data.php", {idHK: idhk}, function(data){
            $(".tennganh").html(data);
        })
    })

})