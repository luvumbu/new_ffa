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

//tr.length; // affiche quante des sportives sur la page 
// tr[3].children[2].innerText; // affiche la perf

// tr[3].children[4].innerText; // affiche le ?????

// tr[3].children[6].innerText; // affiche nom et prenom 

// tr[3].children[8].innerText; // affiche nom du club     // club_nom// 

// tr[3].children[10].innerText; // affiche nom du département // club_region //

// tr[3].children[12].innerText; // affiche numero du departement // club_departement//

// tr[3].children[14].innerText; // affiche categorie

// tr[3].children[16].innerText; // affiche anne de naissance en deux letres

// tr[3].children[18].innerText; // affiche jour de la perf

// tr[3].children[20].innerText; // affiche ville de la performence 



var club_nom = tr[3].children[8].innerText; // club_nom// 
var club_region = tr[3].children[10].innerText; // club_region //
var club_departement = tr[3].children[12].innerText; // club_departement//

var totaluser = nomEpreuve.length; // nombre total de user

// partie test on
// test = 50;
// totaluser = test;

for (var i = 3; i < totaluser - 1; i++) {
	var nombre_space = 0;
	var nombre_space_quantite = 0;
	var users_nationality = "";
	var users_nom = "";
	var users_prenom = "";
	var premier_lettre = 0;
	var totalx = tr[i].children[2].innerText.length; //analyse la perf
	var total_s = tr[i].children[2].innerText; // taille de la perf 
	var epreuve_nom = tr[2].innerText;
	var res = total_s.replace("''", "."); // remplacement "" par . 
	var reccord = "";
	var result_perf = "";
	var result_perf2 = "";
	var result_perf3 = "";
	var epreuve_filtre = "";
	var user_sex = "";
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
  var perf_complet= tr[i].children[2].innerText;



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
		} else {

		}


	}


	// /!\ epreuve 400mheais possible et sprint
	// for(var u = 0 ; u< ; u++){

	// }




	console.log("--__--__-__-_-_-_-");


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


	var club_nom = 					tr[i].children[8].innerText; // ok  
	var club_region = 			tr[i].children[10].innerText;// ok 
	var club_departement = 	tr[i].children[12].innerText;// ok 

	var  nom_epreuve= tr[2].innerText;
	var  filtre_nom_epreuve= epreuve_filtre;
	var  sex_epreuve=user_sex ; 

	var users_nom_complet=tr[i].children[6].innerText ; 
	var users_nom=users_nom;
	var users_prenom=users_prenom;
	var users_sex=user_sex ; 
	var users_naissance=tr[i].children[16].innerText ;  
	var users_nationality=users_nationality ; 



	// nom_epreuve
	// filtre_nom_epreuve
	// sex_epreuve

	// users_nom_complet
	// users_nom
	// users_prenom
	// users_sex
	// users_naissance
	// users_naissance2
	// users_nationality
 

 
if(location.hostname=="localhost" || location.hostname=="127.0.0.1"){

	var ok = new Information("club.php"); // création de la classe 
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





 var result = new Information("result.php"); // création de la classe 
 result.add("club_nom", club_nom); // ajout de l'information pour lenvoi 
 result.add("nom_epreuve", nom_epreuve);
 result.add("users_nom_complet", users_nom_complet);


 
 result.add("epreuvecomplet",epreuvecomplet);
 result.add("perf_complet",perf_complet);

 
 result.add("epreuve_filtre",epreuve_filtre);
 result.add("result_perf",result_perf);
 result.add("reccord",reccord);

 
 

 


 console.log(result.info()); // demande l'information dans le tableau
 result.push(); // envoie l'information au code pkp 


 
 
// console.log(tr[3].children[2].innerText) // perf sans filtre
// console.log(result_perf); // perf avec filtre
// console.log(reccord); // information si reccord
 

}
else {
//console.log(location.hostname);
}
}
 

