$(document).ready(function(){
    $("input[type=radio]").change(function(){
        if($(this).attr("rel") == "attach")
        {
            $(this).val($("#testtype").val());
        }
    });

   $("#testtype").change(function(){
        $("input[type=radio]:eq(3)").val($(this).val());
   });   
});