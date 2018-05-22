/* Permet de ne pas envoyer des requêtes impossible
	exemple:choisir Gaillac comme point de départ et la ligne 703 */


	var result = document.getElementById('depart');
	var line = document.getElementById('ligne');

function getSelectedOption(sel) {
    var opt;
    	for ( var i = 0, len = sel.options.length; i < len; i++ ) {
            opt = sel.options[i];
            if ( opt.selected === true ) {
                break;
            }
        }
        return opt.getAttribute('value');
    }



result.onclick = function () {
	
	switch (getSelectedOption(result)){

		case "2d":
		console.log('Albi ok');
		break;

		case "3d":
		console.log('Gaillac ok');
		break;

		case "4d":
		console.log('St-Sulpice ok');
		break;

		case "5d":
		console.log('Réalmont ok');
		break;

		case "6d":
		console.log('Castres ok');
		break;

		default:
		console.log('Rien n\'est selectionné');
	}
}

line.onclick = function () {
	
	switch (getSelectedOption(line)){

		case "2l":
		console.log('Albi - St-Sulpice');
		break;

		case "3l":
		console.log('St-Sulpice - Albi');
		break;

		case "4l":
		console.log('Albi - Castres');
		break;

		case "5l":
		console.log('Castres - Albi');
		break;

		default:
		console.log('Rien n\'est selectionné');
	}
}

	/*  SI CASTRES EST SELECTIONNE AVEC 702 RENVOYEE VERS UNE PAGE IMPOSSIBLE
		SI REALMONT EST SELECTIONNE AVEC 702 RENVOYEE VERS UNE PAGE IMPOSSIBLE
		SI GAILLAC EST SELECTIONNE AVEC 703 RENVOYEE VERS UNE PAGE IMPOSSIBLE
		SI ST-SULPICE EST SELECTIONNE AVEC 703 RENVOYEE VERS UNE PAGE IMPOSSIBLE
	*/