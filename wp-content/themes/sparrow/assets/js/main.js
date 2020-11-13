jQuery(document).ready(function () {
    let form = $('#contactForm');
    let action = form.attr('action');

   form.on('submit', function (event) {

    let formData = {
        contactName: $('#contactName').val(),
        contactEmail: $('#contactEmail').val(),
        contactSubject: $('#contactSubject').val(),
        contactMessage: $('#contactMessage').val()
    };

    $.ajax()

       $.ajax({
           type: "POST",
           url: action,
           data: formData,})
           .done(function () {
                form.html('Успех!');
           })
           .fail(function () {
               form.html('Провал!');
           });

    event.preventDefault();
   })



});