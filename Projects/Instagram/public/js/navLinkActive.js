class NavLinkActive {
    constructor(object){
        this.navLinks = document.querySelectorAll(object.navLink);
        this.links = object.links;
    }

    init(){
        if (window.location.href.indexOf(this.links[0]) > -1) {
            this.activeRemove();
            this.navLinks[1].classList.add('active');
        }else if (window.location.href.indexOf(this.links[1]) > -1) {
            this.activeRemove();
            this.navLinks[2].classList.add('active');
        }else if (window.location.href.indexOf(this.links[2]) > -1) {
            this.activeRemove();
            this.navLinks[3].classList.add('active');
        }else if (window.location.href.indexOf(this.links[3]) > -1) {
            this.activeRemove();
            this.navLinks[4].classList.add('active');
        }else {
            this.activeRemove();
            this.navLinks[0].classList.add('active');
        }
    }

    activeRemove() {
        this.navLinks.forEach( e => {
            if(e.classList.contains('active')) {
                e.classList.remove('active');
            }
        });
    }
}
