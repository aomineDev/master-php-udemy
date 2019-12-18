class Like {
    constructor(object){
        this.likeInteractive = document.querySelectorAll(object.likeInteractive);
        this.socialLikeCount = document.querySelectorAll(object.socialLikeCount);
    }

    init(){
        this.likeInteractive.forEach((e, i) => {
            e.addEventListener('click', () => {
                if(e.classList.contains('text-danger')){
                    e.classList.remove('text-danger');
                    e.classList.replace('fas', 'far');
                    this.socialLikeCount[i].innerHTML = parseInt(this.socialLikeCount[i].innerHTML) - 1;
                    fetch('/dislike/' + e.dataset.id, {
                        method: 'get'
                    }).then(function(response){
                        // console.log(response.json());
                    }).catch(function(err){
                        console.log(err)
                    });
                }else {
                    e.classList.add('text-danger');
                    e.classList.replace('far', 'fas');
                    this.socialLikeCount[i].innerHTML = parseInt(this.socialLikeCount[i].innerHTML) + 1;
                    fetch('/like/' + e.dataset.id, {
                        method: 'get'
                    }).then(function(response){
                        // console.log(response.json());
                    }).catch(function(err){
                    console.log(err)});
                }
            })
        });
    }
}
