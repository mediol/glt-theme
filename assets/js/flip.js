if(!$('.step-two').hasClass('hide')) {
    $('.step-two').addClass('hide');
} else {
    $('.pay-method').click(function(){
        $('.step-two').removeClass('hide');
    });
}
$('.back-arr').click(function(){
    $('.step-two').addClass('hide');
});