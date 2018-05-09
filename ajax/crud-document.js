function saveDocument($form,$url) {
	// AJAX code to submit form.
	$.ajax({
        type: 'POST',
        url: $url, 
        data: $form.serialize()
    })
    .done(function(data){
        var d = JSON.parse(data);
        alert(d.message);
        window.location.href = './index.php';
    })
    .fail(function() {
        alert('Requete ajax d\'ajout a echouée');
    });

}

function editDocument($form,$url) {
	// AJAX code to submit form.
	$.ajax({
        type: 'POST',
        url: $url, 
        data: $form.serialize()
    })
    .done(function(data){
        var d = JSON.parse(data);
        alert(d.message);
        window.location.href = './index.php';
    })
    .fail(function() {
        alert('Requete ajax de mise à jour a echouée');
    });
}


function deleteDocument($form,$url) {
	// AJAX code to submit form.
	$.ajax({
        type: 'POST',
        url: $url, 
        data: $form.serialize()
    })
    .done(function(data){
        var d = JSON.parse(data);
    	alert(d.message);
        window.location.href = './index.php';
    })
    .fail(function() {
        alert('Requete ajax de suppression a echouée');
    });
}
