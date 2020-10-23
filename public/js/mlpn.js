mlpn = {

    // Initialisation du site
    init: function()
    {
        this.initCopyToClipboard();
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
    },

    initCopyToClipboard: function() {
        $('.copy-to-clipboard-button').on('click', function () {
            navigator.clipboard.writeText($(this).data('link'));
            $(this).html('Copié !');
        });
    }
};
