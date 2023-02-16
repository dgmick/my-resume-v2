import $ from 'jquery';

$(document).ready(function() {
    $('#file-fr, #file-en').on('change', function () {
        const value = $(this).val();
        if (value === '') return;

        window.open(value, '_blank');
    });

    $('#about, #skill, #resume, #contact').on('click', function (event) {
        const value = event.target.id;
        const about = $('#about-element');
        const skill = $('#skill-element');
        const resume = $('#resume-element');
        const contact = $('#contact-element');

        switch (value) {
            case 'about':
                about.removeClass('hidden');
                skill.addClass('hidden');
                resume.addClass('hidden');
                contact.addClass('hidden');
                break;
            case 'skill':
                skill.removeClass('hidden');
                about.addClass('hidden');
                resume.addClass('hidden');
                contact.addClass('hidden');
                break;
            case 'resume':
                resume.removeClass('hidden');
                about.addClass('hidden');
                skill.addClass('hidden');
                contact.addClass('hidden');
                break;
            case 'contact':
                contact.removeClass('hidden');
                about.addClass('hidden');
                skill.addClass('hidden');
                resume.addClass('hidden');
                break;
        }
    });
});