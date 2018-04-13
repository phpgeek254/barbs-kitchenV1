$(function(){
	$('.button-collapse').sideNav();
	$('.collapsible').collapsible();
	$('.modal').modal();
	$('.select').material_select();
	$('#print_order').click(function () {
		window.print();
	});

    $message_div = $('.message').html();
    if($message_div != null)
    {
        Materialize.toast($message_div, 3000);
    }
});