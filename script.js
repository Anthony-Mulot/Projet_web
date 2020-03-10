
window.addEventListener("load", ready);

var AGE_CHECK = 0;
var LOGIN_CHECK = 0;
var PWD_CHECK = 0;
var CONF_CHECK = 0;
var CGU_CHECK = 0;

function ready() {
	// On désactive le bouton de validation au chargement de la page
	/* NB: il serait de bon ton de désactiver directement le bouton en HTML,
	 * mais c'est histoire de vous montrer qu'on peut aussi le faire en JS. */
	document.getElementById("submit").disabled = true;
	
	// On ajoute nos listeners pour détecter les événements de modification des valeurs
	document.getElementById("age").addEventListener("input", checkAge);	
		// NB: on utilise ici l'événement "input" plutôt que "change",
		// ce dernier n'est déclenché qu'une fois que l'élément a perdu le focus
		// en dehors de cela, ils font la même chose (sauf si vous utilisez un 
		// navigateur préhistorique, auquel cas il faut utiliser "change")
	document.getElementById("login").addEventListener("input", checkLogin);	
	document.getElementById("pwd").addEventListener("input", checkPassword);	
	document.getElementById("pwd_c").addEventListener("input", checkConfirmation);	
	document.getElementById("cgu").addEventListener("change", checkCGU);	
	
	
	// A chaque changement d'un input, on vérifie si tout est bon
	var inputs = document.getElementsByTagName("input");
	for (var i=0; i<inputs.length; i++) {
		inputs[i].addEventListener("blur", buttonDecision);
	}
}



/* Les fonctions pour vérifier les 5 conditions de validation du formulaire */
function checkAge() {
	var age = document.getElementById("age").value;
	
	// Ici et dans les autres fonctions, on fait un message fixe qu'on choisit
	// d'afficher ou de retirer en JavaScript (il est caché par défaut en CSS).
	// On peut aussi faire un message qu'on modifie en direct en JavaScript.
	if (age < 18) {
		document.getElementById("age_warn").style.display = 'inline-block';
		AGE_CHECK = 0;
	} else {
		document.getElementById("age_warn").style.display = 'none';
		AGE_CHECK = 1;
	}
}

function checkLogin() {
	var login = document.getElementById("login").value;
	
	
	/* NB : On pourrait vérifier en une fois (et une seule expression régulière)
	 * que le mot de passe est à la fois composé de lettres, et moins de 12.
	 * Ici, on le fait en plusieurs fois pour être plus explicite. */
	
	var ret = 0;
	
	if (login.length > 12) {
		document.getElementById("login_warn1").style.display = 'inline-block';
	} else {
		document.getElementById("login_warn1").style.display = 'none';
		ret = 1;
	}
	
	// Expression régulière pour vérifier le login : uniquement des lettres 
	var regexp = /^[a-zA-Z]*$/;

	if (regexp.test(login)) {
		document.getElementById("login_warn2").style.display = 'none';
		if (ret === 1)
			LOGIN_CHECK = 1;
		else 
			LOGIN_CHECK = 0;
	}
	else {
		document.getElementById("login_warn2").style.display = 'inline-block';
		LOGIN_CHECK = 0;
	}
	
}

function checkPassword() {
	var meter = document.getElementById("pwd_meter").value;
	var pwd = document.getElementById("pwd").value;
	
	var updated = 0;
	
	if (pwd.length > 8) {
		document.getElementById("pwd_warn1").style.color = "green";
		updated += 1;
	} else {
		document.getElementById("pwd_warn1").style.color = "red";
	}
	
	if (/[a-z]/.test(pwd)) {
		document.getElementById("pwd_warn2").style.color = "green";
		updated += 1;
	} else {
		document.getElementById("pwd_warn2").style.color = "red";
	}
	
	if (/[A-Z]/.test(pwd)) {
		document.getElementById("pwd_warn3").style.color = "green";
		updated += 1;
	} else {
		document.getElementById("pwd_warn3").style.color = "red";	
	}
	
	if (/[0-9]/.test(pwd)) {
		document.getElementById("pwd_warn4").style.color = "green";
		updated += 1;
	} else {
		document.getElementById("pwd_warn4").style.color = "red";	
	}
	
	if (/[^a-zA-Z0-9]/.test(pwd)) {
		document.getElementById("pwd_warn5").style.color = "green";
		updated += 1;
	} else {
		document.getElementById("pwd_warn5").style.color = "red";	
	}
	
	document.getElementById("pwd_meter").value = updated;
	
	if (updated === 5) {
		PWD_CHECK = 1;
	} else {
		PWD_CHECK = 0;
	}
	
}

function checkConfirmation() {
	var pwd = document.getElementById("pwd").value;
	var conf = document.getElementById("pwd_c").value;
	
	if (pwd !== conf) {
		document.getElementById("pwd_c_warn").style.display = 'inline-block';
		CONF_CHECK = 0;
	} else {
		document.getElementById("pwd_c_warn").style.display = 'none';
		CONF_CHECK = 1;
	}	
}

function checkCGU() {
	var cgu = document.getElementById("cgu").checked;
	
	if (!cgu) {
		document.getElementById("cgu_warn").style.display = 'inline-block';
		CGU_CHECK = 0;
	} else {
		document.getElementById("cgu_warn").style.display = 'none';
		CGU_CHECK = 1;
	}	
}



/* Fonction de bilan pour savoir s'il est temps de valider le bouton ou non */
function buttonDecision() {
	
	var result = (AGE_CHECK + LOGIN_CHECK + PWD_CHECK + CONF_CHECK + CGU_CHECK);
		
	console.log(result);
	
	if (result === 5) {
		document.getElementById("submit").disabled = false;
	} else {
		document.getElementById("submit").disabled = true;
	}
	
}