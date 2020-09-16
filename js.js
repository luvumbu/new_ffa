class Information {
	constructor(link) {
		this.link = link;
		this.identite = new FormData();
		this.req = new XMLHttpRequest();
		this.identite_tab = [
		];
	}
	info() {
		return this.identite_tab; 
	}
	add(info, text){
		this.identite_tab.push([info, text]); 
	}
	push(){
		for(var i = 0 ; i < this.identite_tab.length ; i++){
			console.log(this.identite_tab[i][1]);
			this.identite.append(this.identite_tab[i][0], this.identite_tab[i][1]);		 
		}		
		this.req.open("POST",this.link);
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



var club_nom = tr[3].children[8].innerText;// club_nom// 
var club_region = tr[3].children[10].innerText;// club_region //
var club_departement = tr[3].children[12].innerText;// club_departement//

var totaluser = nomEpreuve.length; // nombre total de user
console.log(nomEpreuve.length);

for(var i=3;i<totaluser-1;i++){ 
 
	var ok = new Information("php.php"); // création de la classe 
	ok.add("club_nom",  tr[i].children[8].innerText); // ajout de l'information pour lenvoi 
	ok.add("club_region", tr[i].children[10].innerText); // ajout d'une deuxieme information denvoi  
	ok.add("club_departement", tr[i].children[12].innerText); // ajout d'une deuxieme information denvoi  

	ok.add("users_nom_complet", tr[i].children[6].innerText); // ajout d'une deuxieme information denvoi  


	
	console.log(ok.info()); // demande l'information dans le tableau
	ok.push(); // envoie l'information au code pkp 
}

 //console.log(total); 