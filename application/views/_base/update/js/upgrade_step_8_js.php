<script type="text/javascript">
	$(document).ready(function(){
		$("#progress").progressbar({ value: 56 });
		$('#percent').text($('#progress').progressbar('option', 'value') + '%');
		
		$('#next').click(function(){
			$('#body').fadeOut('fast', function(){
				$('#loading').removeClass('hidden');
			});
		});
	});
</script>