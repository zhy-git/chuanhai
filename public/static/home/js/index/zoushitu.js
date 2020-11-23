$(function () {
    $('.zskmore').click(function(){
        $(this).parent().parent().toggleClass("zsksec").siblings().removeClass('zsksec');        
    }); 
});