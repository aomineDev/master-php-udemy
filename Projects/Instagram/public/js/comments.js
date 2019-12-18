class Comments {
    constructor(object){
        this.socialInteractiveComments = document.querySelector(object.socialInteractiveComments);
        this.content = object.content;
        this.imgDetailCommentsCount = document.querySelector(object.imgDetailCommentsCount);
        this.imgDetailCommentsText = document.querySelector(object.imgDetailCommentsText);
        this.imgDetailForm = document.querySelector(object.imgDetailForm);
        this.imgDetailFormInput = document.querySelector(object.imgDetailFormInput);
        this.imgDetailComments = document.querySelector(object.imgDetailComments);
        this.imgDetailFormImageId = document.querySelector(object.imgDetailFormImageId);
        this.csrf = document.querySelector(object.csrf);
        this.imgDetailCommentsDelete = document.querySelectorAll(object.imgDetailCommentsDelete);
    }

    init(){
        if(this.imgDetailFormInput.value != ''){
            // Rest
            this.restSave();

            // Comentario Reactivo
            this.reactiveComment();

            // Count
            this.reactiveCountMore();

            // Focus
            this.imgDetailFormFocus();
        }
    }

    restSave(){
        this.url = '/comment/save';
        this.data = {
            content: this.imgDetailFormInput.value,
            image_id: parseInt(this.imgDetailFormImageId.value)
        };
        fetch(this.url, {
            method: 'POST', // or 'PUT'
            body: JSON.stringify(this.data), // data can be `string` or {object}!
            headers: {
                'X-CSRF-TOKEN': this.csrf.getAttribute('content'),
                'Content-Type': 'application/json'
              }
          }).then(res => res.json())
          .catch(error => console.error('Error:', error));
        //   .then(response => console.log('Success:', response));
    }

    reactiveComment(){
        this.node = document.createElement('p');
        this.node.classList.add('imgDetail-comments-comment');
        this.node.innerHTML = "<strong>" + this.imgDetailFormInput.dataset.nick + "</strong> <span>" + this.imgDetailFormInput.value + "</span>";
        this.imgDetailComments.prepend(this.node);
        this.imgDetailFormInput.value = '';
    }

    reactiveCountMore(){
        this.imgDetailCommentsCount.innerHTML = parseInt(this.imgDetailCommentsCount.innerHTML) + 1;
        this.imgDetailCommentsText.innerHTML = parseInt(this.imgDetailCommentsCount.innerHTML) == 1 ? ' comentario' : ' comentarios';
    }

    imgDetailFormFocus(){
        this.content.focus();
    }

    deleteEvent(e){
        e.addEventListener('click', () => {
            this.restDelete(e);
            this.removeP(e);
            this.reactiveCountLess();
        });
    }

    restDelete(e){
        fetch( '/comment/delete/' + e.dataset.id, {
            method: 'get'
        }).then(response => {
            // console.log(response.json());
        }).catch(err => {
            console.log(err);
        });

    }

    removeP(e){
        this.p = e.parentNode;
        this.pNode = this.p.parentNode;
        this.pNode.removeChild(this.p);
    }

    reactiveCountLess(){
        this.imgDetailCommentsCount.innerHTML = parseInt(this.imgDetailCommentsCount.innerHTML) - 1;
        this.imgDetailCommentsText.innerHTML = parseInt(this.imgDetailCommentsCount.innerHTML) == 1 ? ' comentario' : ' comentarios';
    }
}
