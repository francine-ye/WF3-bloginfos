$(document).ready(function(){
var burgerBtn = $('#burgerBtn');
var burgerIsOpen = 0;
var burgerMenu = $('#mainMenu');
	/*
	Configuration de la NAV
	- Capter le click sur les balise A de la NAV
	- Récupérer la valeur de l'attribut HREF
	- Charger dans le MAIN le fichier HTML correspondant
	*/
	$('nav a').click(function(event){
		//event.preventDefault();
		// Récupérer la valeur de l'attribut HREF et le charger dans le main
		//appContent.load(event.target.href);

		// Fermer le Burger Menu
		burgerMenu.animate({ left: '100%' });
		// Modifier les class de l'ivone du Burger Menu
		burgerBtn.toggleClass('fa-bars');
		burgerBtn.toggleClass('fa-times');
		// Modifier la valeur de la variable burgerIsOpen
		burgerIsOpen = 0;
	});

	burgerBtn.click(function(){
		if(burgerIsOpen == 0){
			// Animer la propriété left de la balise NAV
			burgerMenu.show();
			// Changer la valeur de burgerIsOpen
			burgerIsOpen = 1;

		} else{
			// Animer la propriété left de la balise NAV
			burgerMenu.hide();
			// Changer la valeur de burgerIsOpen
			burgerIsOpen = 0;
		}
	});

	// quand l"ecran s"agrandi le menu classique s'affiche à partir de 450
	$(window).resize(function(event){
		if ($(this).width() >= 750) {
			burgerBtn.hide();
			burgerMenu.show();
		} else {
			burgerBtn.show();
			burgerMenu.hide();
		}
	});
});