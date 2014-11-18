$(document).ready(function() {
    $('#analizar-btn').click(function(event) {
        event.preventDefault();
        var grupoID = $('#fb-group-id-input').val();
        console.log(groupoID);
        console.log('LLOLOLOLLO');
    });

   $('#grupo-id-form').submit(function(event) {
     event.preventDefault();
     var grupoID = $('#fb-group-id-input').val();
     console.log(groupoID);
 });

});
