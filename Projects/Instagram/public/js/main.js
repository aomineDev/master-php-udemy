const loader = new Loader({
    id: 'loader',
    ringLoad: 'ringLoad'
});
NProgress.start();

const like = new Like({
    likeInteractive: '.like-interactive',
    socialLikeCount:  '.social-like-count'
});

const navLinksActive = new NavLinkActive({
    navLink: '.nav-link',
    links: ['favorite', 'users', 'upload', 'perfil']
});

const search = new Search({
    formSearch: 'formSearch',
    search: 'search'
});

window.addEventListener('load', function(){
    // Loader
    loader.done();

    // Iniciando Like
    like.init();
});

window.addEventListener('DOMContentLoaded', function(){
    // Iniciando Like
    navLinksActive.init();

    if (window.location.href.indexOf('detail') > -1) {
        const comments = new Comments({
            socialInteractiveComments: '.social-interactive-comments',
            content: document.imgDetailForm.content,
            imgDetailCommentsCount: '.imgDetail-comments-count',
            imgDetailCommentsText: '.imgDetail-comments-text',
            imgDetailForm:'.imgDetail-form',
            imgDetailFormInput: '.imgDetail-form-input',
            imgDetailComments: '.imgDetail-comments',
            imgDetailFormImageId: '.imgDetail-form-imageId',
            csrf: 'meta[name="csrf-token"]',
            imgDetailCommentsDelete: '.imgDetail-comments-delete'
        });

        comments.imgDetailForm.addEventListener('submit', () => {
            comments.init();
            event.preventDefault();
        });

        comments.socialInteractiveComments.addEventListener('click', () => {
            comments.imgDetailFormFocus();
        });

        comments.imgDetailCommentsDelete.forEach(e => {
            comments.deleteEvent(e);
        });
    }

    if (search.formSearch) {
        //Search
        search.init();
    }
});




