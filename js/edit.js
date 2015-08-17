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
        var currentTitle;
        var currentDesc;
        // maak de html
        var htmlOne = "<input id='titleinput' type='text' value='title'>";
        var htmlTwo = "<input id='descriptioninput' type='text' value='description'>";
        var htmlThree = "<input id='confirminput' type='submit' value='confirm'>";
        // zet daarna in de html vooraan(prepend) of achteraan(append)
        $('#projectcontainer').prepend(htmlOne);
        $('#projectcontainer').append(htmlTwo, htmlThree);
    };
    // toon/verberg de titel & beschrijving
    $('#projecttitle').toggleClass('hidden');
    $('#projectdescription').toggleClass('hidden');
};