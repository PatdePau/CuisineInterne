// Identification de la balise avec l'ID 'menu'
var menu = document.querySelector('#menu');

// Ajouter un lien accueil au menu
var lienAccueil = document.createElement("a");
lienAccueil.setAttribute('href', "./");
lienAccueil.setAttribute('class', ".lien");
// et lui donne un peu de contenu 
var lienAccueilTexte = document.createTextNode("Accueil");
lienAccueil.appendChild(lienAccueilTexte);

// Ajouter un lien recettes au menu
var lienMenus = document.createElement("a");
lienMenus.setAttribute('href', "./menus.html");
// et lui donne un peu de contenu 
var lienMenusTexte = document.createTextNode("Menus de la semaine");
lienMenus.appendChild(lienMenusTexte);

// Ajouter un lien recettes au menu
var lienOr = document.createElement("a");
lienOr.setAttribute('href', "./livredor.html");
// et lui donne un peu de contenu 
var lienOrTexte = document.createTextNode("Vous avez aimé ? Témoignez");
lienOr.appendChild(lienOrTexte);


// Ajouter un lien recettes au menu
var lienReserv = document.createElement("a");
lienReserv.setAttribute('href', "./reservation.html");
// et lui donne un peu de contenu 
var lienReservTexte = document.createTextNode("Réservations & contacts");
lienReserv.appendChild(lienReservTexte);

// ajoute le noeud texte au nouveau div créé
menu.appendChild(lienAccueil);
menu.appendChild(lienMenus);
menu.appendChild(lienOr);
menu.appendChild(lienReserv);