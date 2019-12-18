class Search {
    constructor(object){
        this.formSearch = document.getElementById(object.formSearch);
        this.search = document.getElementById(object.search);
    }

    init(){
        this.formSearch.addEventListener('submit', () => {
            location.href = this.formSearch.action + '/' + this.search.value;
            event.preventDefault();
        });
    }
}
