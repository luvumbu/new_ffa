class Information {
	constructor(link) {
		this.link = link;
		this.identite = new FormData();
		this.req = new XMLHttpRequest();
		this.identite_tab = [];
	}
	info() {
		return this.identite_tab;
	}
	add(info, text) {
		this.identite_tab.push([info, text]);
	}
	push() {
		for (var i = 0; i < this.identite_tab.length; i++) {
			console.log(this.identite_tab[i][1]);
			this.identite.append(this.identite_tab[i][0], this.identite_tab[i][1]);
		}
		this.req.open("POST", this.link);
		this.req.send(this.identite);
		console.log(this.req);
	}
}

var ok = new Information("php.php"); // création de la classe 
var nomEpreuve = document.getElementsByTagName("tr");
nomEpreuve[2].innerText // affiche nom de lepreuve 
var tr = document.getElementsByTagName("tr");
adresse_url = "";
adresse_url_verif = false;
var club_nom = tr[3].children[8].innerText; // club_nom// 
var club_region = tr[3].children[10].innerText; // club_region //
var club_departement = tr[3].children[12].innerText; // club_departement//
var totaluser = nomEpreuve.length; // nombre total de user

var barSelect = document.getElementsByClassName("barSelect");
var nombrepages = barSelect[0].length;
var last_url_verif = false;
var last_url = "";
var last_url2 = "";
var epreuve_verif = false;

// partie test on
// test = 50;
// totaluser = test;

var dernierLettre = window.location.href[window.location.href.length - 1];
var numero_page = "";
var numero_page_final = "";
var page_actuelle = "";
var final_url = "";
var verif_url = false;





for (var t = 0; t < window.location.href.length; t++) {


	if (verif_url == false) {
		final_url = final_url + window.location.href[t];

	}
	if (window.location.href[t] == "=") {
		verif_url = true;
	}


	if (t == 4) {

		if (window.location.href[t] == "s") {
			adresse_url_verif = true;
		} else {
			adresse_url = adresse_url + window.location.href[t];
		}
	} else {
		adresse_url = adresse_url + window.location.href[t];
	}
}

if (adresse_url_verif == true) {
	window.location.href = adresse_url+0;

}


if (dernierLettre == "R") {
	adresse_url = adresse_url + "&frmposition=0";
	//window.location.href+"&frmposition=0";	 
	window.location.href = window.location.href + "&frmposition=0";
} else {



	for (var g = window.location.href.length - 1; g > 0; g--) {


		if (window.location.href == "=") {
			last_url_verif = true;
		}


		if (last_url_verif == false) {
			last_url = last_url + window.location.href[g];
		}
		//		alert(window.location.href[g]+" : "+g);


		if (window.location.href[g] == "=") {
			g = 0;
		} else {

			numero_page = numero_page + window.location.href[g];
		}
	}
	for (var p = numero_page.length - 1; p > -1; p--) {
		numero_page_final = numero_page_final + numero_page[p];
	}
	numero_page_final = parseInt(numero_page_final, 10) + 1;
	page_actuelle = parseInt(page_actuelle, 10)
}





//alert(window.location.href[window.location.href.length-1]);








for (var i = 3; i < totaluser - 1; i++) {
	var vend_epreuve = "";
	var nombre_space = 0;
	var nombre_space_quantite = 0;
	var users_nationality = "";
	var users_nom = "";
	var users_prenom = "";
	var premier_lettre = 0;
	var nom_epreuve = tr[2].innerText;
	var totalx = tr[i].children[2].innerText.length; //analyse la perf
	var total_s = tr[i].children[2].innerText; // taille de la perf 
	var epreuve_nom = tr[2].innerText;
	var res = total_s;
	var reccord = "";
	var result_perf = "";
	var result_perf2 = "";
	var result_perf3 = "";
	var epreuve_filtre = "";
	var user_sex = "";
	var vend_epreuve_verif = "";
	var epreuve_nom_verif = false;
	var reccord_verif = false;
	var result_perf_verif = false;
	var result_perf2_verif = false;
	var result_perf3_verif = false;
	var users_nationality_verif = false;
	var users_nom_verif = false;
	var users_nom_verif = false;
	var epreuve_filtre_verif = false;
	var nomcomplet = tr[i].children[6].innerText;
	var epreuvecomplet = tr[2].innerText;
	var perf_complet = tr[i].children[2].innerText;
	var categorie = tr[i].children[14].innerText;


	var jour = tr[i].children[18].innerText[0] + tr[i].children[18].innerText[1];
	var mois = tr[i].children[18].innerText[3] + tr[i].children[18].innerText[4];
	var anne = tr[i].children[18].innerText[6] + tr[i].children[18].innerText[7];

	if (anne > 100) {
		anne = 19 + anne;
	} else {
		anne = 20 + anne;
	}



	var result_date_perf = anne + "-" + mois + "-" + jour;

	// boucle Nom comple

	for (var j = 0; j < nomcomplet.length; j++) {
		if (nomcomplet[j] == " ") {
			nombre_space++;
		}
		if (nomcomplet[j] == "(") {
			nombre_space++;
			users_nationality_verif = true;
		}
	}

	if (users_nationality_verif == false) { // luser est français 

		users_nationality = "FR";
		for (var x = 0; x < nomcomplet.length; x++) {

			if (nomcomplet[x] == " ") {
				nombre_space_quantite++;
			}

			if (nombre_space_quantite < nombre_space) {
				users_nom = users_nom + nomcomplet[x];

			} else {
				if (nomcomplet[x] != " ") {
					users_prenom = users_prenom + nomcomplet[x];
				}

			}
		}

	} else { // luser est etranger
		for (var x = 0; x < nomcomplet.length; x++) {
			//console.log(nomcomplet[x]);
			if (nomcomplet[x] == " ") {
				nombre_space_quantite++;
			}
			if (nombre_space_quantite < nombre_space - 2) {
				users_nom = users_nom + nomcomplet[x];
			} else {

				if (nomcomplet[x] != "" && nomcomplet[x] != " " && nomcomplet[x] != "(" && users_nationality_verif == true) {
					users_prenom = users_prenom + nomcomplet[x];
				}
				if (nomcomplet[x] == "(") {
					users_nationality_verif = false;
				}
				if (users_nationality_verif == false && nomcomplet[x] != "(" && nomcomplet[x] != ")") {
					users_nationality = users_nationality + nomcomplet[x];
				}
			}
		}
	}
	//console.log(tr[3].children[2].innerText.length+"!?");
	// /!\ epreuve 400mheais possible et sprint

	for (var t = 0; t < totalx - 1; t++) {
		if (res[t] == "R") {
			reccord = "RP";
		}
		if (res[t] == " ") {
			reccord_verif = true;
		}

		if (reccord_verif == false) {
			result_perf = result_perf + res[t];
		}
	}
	// /!\ epreuve 400mheais possible et sprint
	// for(var u = 0 ; u< ; u++){

	// }

	console.log("--__--__-__-_-_-_-" + res);

	for (var ff = 0; ff < res.length; ff++) {
		if (res[ff] == "+" || res[ff] == "-") {
			vend_epreuve_verif = true;
		}
		if (vend_epreuve_verif == true && res[ff] != ")") {
			vend_epreuve = vend_epreuve + res[ff];
		}
	}

	var placement = tr[2].innerText;

	var information_placement = "EXTERIEUR";
	for (var ex = 0; ex < placement.length; ex++) {
		if (placement[ex] == "-") {
			information_placement = "INTERIEUR";
		}
	}
	//
	for (var f = 0; f < epreuve_nom.length; f++) {
		if (epreuve_nom[f] == "|") {
			epreuve_nom_verif = true;
		}
		if (epreuve_nom_verif == true) {
			if (epreuve_nom[f] != "|" && epreuve_nom[f] != " ") {
				user_sex = user_sex + epreuve_nom[f];
			}
		}
	}
	for (var g = 0; g < epreuvecomplet.length; g++) {
		if (epreuvecomplet[g] == "|") {
			epreuve_filtre_verif = true;
		}
		if (epreuve_filtre_verif == false) {
			epreuve_filtre = epreuve_filtre + epreuvecomplet[g];
		}
	}

	var club_nom = tr[i].children[8].innerText; // ok  
	var club_region = tr[i].children[10].innerText; // ok 
	var club_departement = tr[i].children[12].innerText; // ok 
	var verif_redirection_page = false; 


	var filtre_nom_epreuve = epreuve_filtre;
	var sex_epreuve = user_sex;

	var users_nom_complet = tr[i].children[6].innerText;
	var users_nom = users_nom;
	var users_prenom = users_prenom;
	var users_sex = user_sex;
	var users_naissance = tr[i].children[16].innerText;
	var users_nationality = users_nationality;

	if (location.hostname == "localhost" || location.hostname == "127.0.0.1") {

		var ok = new Information("club.php"); // création de la classe 
		var result = new Information("result.php"); // création de la classe 

		// console.log(tr[3].children[2].innerText) // perf sans filtre
		// console.log(result_perf); // perf avec filtre
		// console.log(reccord); // information si reccord 

	} else {
		var ok = new Information("http://bokonzi.com/new_ffa/club.php"); // création de la classe 
		var result = new Information("http://bokonzi.com/new_ffa/result.php"); // création de la classe 
		//console.log(location.hostname);
	}



	ok.add("club_nom", club_nom); // ajout de l'information pour lenvoi 
	ok.add("club_region", club_region); // ajout de l'information pour lenvoi 
	ok.add("club_departement", club_departement); // ajout de l'information pour lenvoi 

	ok.add("nom_epreuve", nom_epreuve);
	ok.add("filtre_nom_epreuve", filtre_nom_epreuve);
	ok.add("sex_epreuve", sex_epreuve);

	ok.add("users_nom_complet", users_nom_complet);
	ok.add("users_nom", users_nom);
	ok.add("users_prenom", users_prenom);
	ok.add("users_sex", users_sex);
	ok.add("users_naissance", users_naissance);
	ok.add("users_nationality", users_nationality);

	console.log(ok.info()); // demande l'information dans le tableau
	ok.push(); // envoie l'information au code pkp 


	result.add("club_nom", club_nom); // ajout de l'information pour lenvoi 
	result.add("nom_epreuve", nom_epreuve);
	result.add("users_nom_complet", users_nom_complet);

	result.add("epreuvecomplet", epreuvecomplet);
	result.add("perf_complet", perf_complet);

	result.add("epreuve_filtre", epreuve_filtre);
	result.add("result_perf", result_perf);
	result.add("categorie", categorie);
	result.add("vend_epreuve", vend_epreuve);
	result.add("reccord", reccord);
	result.add("information_placement", information_placement);
	result.add("result_date_perf", result_date_perf);
	console.log(result.info()); // demande l'information dans le tableau
	result.push(); // envoie l'information au code pkp  
}

var anne_epreuve = window.location.href[104] + window.location.href[105] + window.location.href[106] + window.location.href[107];
var anne_epreuve = parseInt(anne_epreuve, 10);
var anne_epreuve_plus_un =anne_epreuve+1;



// alert(anne_epreuve);
// alert(numero_epreuve);
// alert(final_url);


for (var i = 0; i < window.location.href.length - last_url.length + 1; i++) {
	console.log(window.location.href[i]);
	last_url2 = last_url2 + window.location.href[i];
}
if (numero_page_final == nombrepages) {
 
	verif_redirection_page = true; 



} else {

	setTimeout(function () {
	 	window.location.href = last_url2+numero_page_final;

	}, 10000);
}




for (var i = 0; i < window.location.href.length; i++) {
	console.log(window.location.href);


	if (epreuve_verif == false) {

		if (window.location.href[i] == "e" && window.location.href[i + 1] == "p") {

			numero_epreuve = i + 8;
			epreuve_verif = true;
		}
	}
}
//alert(anne_epreuve+1);
var redirection_page = "";
for (var i = 0; i < last_url2.length; i++) {
 
 
console.log(last_url2[i]);


if(i==104 ||i==105 ||i==106 ||i==107){
if(i==104){
	redirection_page = redirection_page+anne_epreuve_plus_un;
}
}
else {
	redirection_page = redirection_page+last_url2[i] ; 
}

 
} 


if(anne_epreuve_plus_un==2021){
	alert("Fin du programme");
}
else {

}
 






if(verif_redirection_page==true){
	window.location.href = redirection_page+0;
}





/* donne le numero de son epreuve et son emplacement exacte 



var numero_epreuve_final = window.location.href[numero_epreuve]+window.location.href[numero_epreuve+1]+window.location.href[numero_epreuve+2];


alert(numero_epreuve_final);
*/