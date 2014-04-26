 $(document).ready(function(){
		var k=document.getElementById("carousel")
		var t = setInterval(function(){
                $("#carousel ul").animate({marginLeft:-1260},3000,function(){
                $(this).find("li:last").after($(this).find("li:first"));
                $(this).css({marginLeft:0});
                })      },4000);
                })

