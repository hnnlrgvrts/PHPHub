function edit() {
    console.log("clicked");
    // toon/hide de inputvelden
    if ($('#titleinput').length) { // check of titleinput bestaat
        console.log("input aanwezig");
        // gebruik .remove(); om de inputvelden terug te verwijderen
        $('#titleinput').remove();
        $('#descriptioninput').remove();
        $('#confirminput').remove();
    } else {
        // als titleinput nog niet bestaat, zet ze in html met de juiste data
        var currentTitle = $('#projecttitle').html();
        var currentDesc = $('#projectdescription').html();
        // maak de html
        var htmlOne = "<input name='titleinput'id='titleinput' type='text' value='"+currentTitle+"'>";
        var htmlTwo = "<textarea name='descriptioninput' id='descriptioninput' cols='30' rows='10'>"+currentDesc+"</textarea>";
        var htmlThree = "<input id='confirminput' type='submit' value='confirm'>";
        // zet daarna in de html vooraan(prepend) of achteraan(append)
        $('#projectcontainer').prepend(htmlOne);
        $('#projectcontainer').append(htmlTwo, htmlThree);
    };
    // toon/verberg de titel & beschrijving
    $('#projecttitle').toggleClass('hidden');
    $('#projectdescription').toggleClass('hidden');
};