$(function () {
		
	function afficherResa () {
	$('#nbResa').html(resa);
	}
	
	var resa = 1;
	afficherResa();
	$('#minus .fa').css('opacity', 1);
		
	$('#plus').on('click',function ()
	{
		resa++;
		afficherResa();
		$('#minus .fa').css('opacity', 1);	
	});
	
	$('#minus').on('click',function ()
	{
		if (resa > 1) {		
		resa--;
		afficherResa();
		$('#minus .fa').css('opacity', 1);
		}
		else 
		{
			resa = 1
			afficherResa();
			$('#minus .fa').css('opacity', 0.5);
		}	
	});
	
});