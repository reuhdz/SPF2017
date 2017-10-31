function openTab(evt, tabName){
	var i,  tabcontent, tablinks;

	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++){
		tabcontent[i].style.display = "none";
	}
	
	tablinks = document.getElementsByClassName("btn");
	
	for(i=0; i<tablinks.length; i++){
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

	tablinks2=document.getElementsByClassName("load");
	
	for(i=0; i < tablinks2.length; i++){
		tablinks2[i].className = tablinks2[i].className.replace(" active", "");
	}

	
	document.getElementById(tabName).style.display = "block";
	evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

var modal = document.getElementById('id01');

window.onclick = function(event) {
	if(event.target == modal) {
		modal.style.display = "none";
	}
}