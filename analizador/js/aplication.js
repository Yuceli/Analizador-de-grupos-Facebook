$(document).ready(function () {
  console.log('Begin');
$('table.table > tbody > tr.post-row').click(function(event) {
	// event.preventDefault();
	var post_id = $(this).children('#post-id').text();
	// console.log(b);
	var ids = post_id.split("_");
	var daID = parseFloat(ids[1]);

	var st = 'http://ofelia.sem/analizador/data-comentario.php?post='+daID;
	console.log(st);

	$.ajax({
		url: st,
		type: 'GET',
		dataType: 'json'
	})
	.done(function(data) {
		var bo = $('#coments-body');

		bo.html('');
		console.log("success");
		data.forEach(function(value, index) {
			console.log(index);
			console.log(value);
			var com = "<tr> <td>"+value.fromid+"</td> <td>"+value.text+"</td> </tr>"
			bo.append(com);
		});
	})
	.fail(function(data) {
		console.log("error");
		console.log(data);
	})
	.always(function(data) {
		console.log("complete");
	});
	
});

});
