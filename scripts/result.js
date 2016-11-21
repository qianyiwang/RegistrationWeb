function initial(){
	print answer;
	if(!answer){
		window.history.back();
	}
}

window.addEventListener("load", initial);