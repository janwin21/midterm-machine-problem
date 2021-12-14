$(document).ready(() => {

    // pass value to input
    let cardImage = $('#card-image');
    let cardImgHover = $('#card-img-hover');
    let cardImgButton = $('#card-img-button');
    let cardStatus = $('#card-status');

    // Toast Component Function
    let toastTrigger = $('.liveToastBtn');
    let toastLiveExample = $('#liveToast');
    let toastLogo = $('#toast-logo');
    let toastTitle = $('#toast-title');
    let toastTime = $('#toast-time');
    let toastDescription = $('#toast-description');
    let toastHeader = $('.toast-header');
    let toastClose = $('.toast-close');

    if (toastTrigger) {
        toastTrigger.on('click', event => {

            toastLiveExample.fadeOut(250, () => {

                let name = event.target.dataset.name;
                let date = new Date();

                // Text Components
                let title = name + ' selected';
                let time_now = `${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
                let bgColor, logo, description;

                switch(name) {
                    case 'present':
                        bgColor = 'toast-header bg-success';
                        logo = 'fas fa-road';
                        description = 'Wow! You travelled this placed.';
                        break;
                    case 'late':
                        bgColor = 'toast-header bg-primary';
                        logo = 'fas fa-spinner';
                        description = 'Nice! Let set a schedule now!';
                        break;
                    case 'absent':
                        bgColor = 'toast-header bg-danger';
                        logo = 'fas fa-times';
                        description = 'Not for now! Let\'s place this here for a while.';
                        break;
                }
                
                cardStatus.val(name);
                toastHeader.attr('class', bgColor);
                toastLogo.attr('class', logo);
                toastTitle.text(title);
                toastTime.text(time_now);
                toastDescription.text(description);
                
                toastLiveExample.fadeIn(250);
            });
        });
    }

    // close toast component
    toastClose.on('click', event => {
        $(toastLiveExample).fadeOut(250);
    })

    // image manipulation and functionalities
    cardImgHover.on('mouseover', () => {
        cardImgButton.slideDown(250);
    });

    cardImgHover.on('mouseleave', () => {
        cardImgButton.slideUp(250);
    });

    cardImgHover.on('click', () => {
        cardImgButton.click();
    });

    cardImgButton.click(() => {
        cardImgButton.slideUp(125, () => {
            cardImgButton.slideDown(125, () => {
                cardImage.click();
            });
        });
    });

    cardImage.on('change', event => {   
        let fReader = new FileReader();

        fReader.readAsDataURL(event.target.files[0]);
        fReader.onloadend = function(event){
            cardImgHover.attr('src', event.target.result);
        }
    });

    // set all data to update container
    let offcanvasRightLabel = $('#offcanvasRightLabel');
    let editBtn = $('.edit-btn');
    let input_firstname = $('#firstname');
    let input_lastname = $('#lastname');
    let input_program = $('#program');
    let input_address = $('#address');
    let textarea = $('textarea');
    let updateCardTime = $('#update-card-time');
    let form = $('#form');

    editBtn.on('click', event => {
        let target = $(event.target);
        let description = target.prev().text();
        let uri = target.prev().attr('data-src');
        let status = target.prev().prev().text();
        let address = target.prev().prev().prev().text();
        let time = target.prev().prev().prev().prev().text();
        let program = target.prev().prev().prev().prev().prev().text();
        let fname = target.prev().prev().prev().prev().prev().prev().attr('data-fname');
        let lname = target.prev().prev().prev().prev().prev().prev().attr('data-lname');
        let src = target.parent().prev().attr('src');

        form.attr('action', uri);
        offcanvasRightLabel.text(`Edit student, ${fname} ${lname}`);
        cardImgHover.attr('src', src);
        updateCardTime.text(time);
        cardStatus.val(status);
        input_firstname.attr('value', fname);
        input_lastname.attr('value', lname);
        input_program.attr('value', program);
        input_address.attr('value', address);
        textarea.val(description);
    });

});