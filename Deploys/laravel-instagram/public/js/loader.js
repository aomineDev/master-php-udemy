// LOADER

// Loader
class Loader {
	constructor(object) {
        this.loader = document.getElementById(object.id);
        this.ringLoad = document.getElementById(object.ringLoad);
        if(this.ringLoad){
            this.marker = true;
        }
	}

	done() {
		NProgress.done();
        this.loader.style.opacity = '0';
        if(this.marker){
            this.ringLoad.style.opacity = '0';
        }
		setTimeout(()=>{
            this.loader.style.display = 'none';
            if(this.marker){
                this.ringLoad.style.display = 'none';
            }
		}, 1000);
	};
}
