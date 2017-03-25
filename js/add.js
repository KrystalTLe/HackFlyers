$(document).ready(function(){
	console.log('bleh');
	$( "#datepicker" ).datepicker();
    $('#Submit').click(function()
    {
        var addressInput = document.getElementById('address-input').value;
		console.log(addressInput);
    });
});