$(document).ready(function() {
	$("#submit").click(function(){
		
		var radio = $('input[type="radio"]:checked').val();

		if(radio == null){
			alert("please specify you answer!");
			return false;
		}
	});
});