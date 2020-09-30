mlpn = {

    // Initialisation du site
    init: function()
    {
        // Initialisation des éléments Boostrap tooltip
        // this.initBootstrapModalIntroduction();
        // this.initModalIntroductionCarousel();
    },

    /**
     * Initialisation de l'alerte modal
     */
    initBootstrapModalIntroduction: function()
    {
        modalAlert = $('#modalIntroduction');
        modalAlert.modal('show');

        modalAlert.on('hidden.bs.modal', function () {
            var date = new Date();
            date.setDate(date.getDate() + 7);
            document.cookie = "hideModalIntroduction=true;expires=" + date.toUTCString();
        })
    },

    initModalIntroductionCarousel: function() {
        let carouselElement = $('#carouselModalIntroduction');
        carouselElement.carousel();
        carouselElement.carousel('pause');
    }
};
