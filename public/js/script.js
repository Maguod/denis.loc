// You can also use "$(window).load(function() {"
$(function () {
    $('.vin-form div:not(.form-group) input').each(function() {
        if ($(this).val().length > 0 ){
            $("label[for='" + this.id + "']").addClass("labelfocus");
        }
    }).focus(function(){
       $("label[for='" + this.id + "']").addClass("labelfocus");

   }).blur(function() {
       if ($.trim($(this).val()).length < 1 ){
           $("label[for='" + this.id + "']").removeClass("labelfocus");
       }
   }).change(function(){
       return $(this).val($.trim($(this).val()));
   });

    $('.vin-form div textarea').each(function() {
        if ($(this).val().length > 0 ){
            $("label[for='" + this.id + "']").addClass("labelfocus");
        }
    }).focus(function(){
       $("label[for='" + this.id + "']").addClass("labelfocus");

   }).blur(function() {
       if ($.trim($(this).val()).length < 1 ){
           $("label[for='" + this.id + "']").removeClass("labelfocus");
       }
   }).change(function(){
       return $(this).val($.trim($(this).val()));
   })
});
// TweenMax.from(".header", 1, {
//     y:20,
//     opacity:0,
//     ease: Expo.easeInOut
// });