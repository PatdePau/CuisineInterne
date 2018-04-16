function chargeDonnees(textesPage){
    // Ici, la requête sera émise de façon synchrone.
    const req = new XMLHttpRequest();
    req.open('GET', 'data/'+textesPage, false); 
    req.send(null);

    if (req.status === 200) {
        return JSON.parse(req.responseText);
        // console.log("Réponse reçue: %s", req.responseText);
    } else {
        console.log("Status de la réponse: %d (%s)", req.status, req.statusText);
    }
}