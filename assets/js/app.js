import $ from 'jquery';

$(document).ready(function() {
    $('#file-fr, #file-en').on('change', () =>  {
        const value = $(this).val();
        if (value === '') return;

        window.open(value, '_blank');
    });

    const sendEmail = $('#send_email');

    sendEmail.on('click', () =>  {
        const myEmail = $('#myEmail').val();
        const subject = $('#subject').val();
        const comment = $('#comment').val();

        if (subject === '' || comment === '') {
            return false;
        }

        const href = "mailto:" + myEmail + "?subject=" + subject + "&body=" + comment;

        sendEmail.attr('href', href);
    });

    $('#show-infos').on('click', () => {
        $('#pdf, #value').css('display', 'flex').animate({
            height: '100%',
            marginTop: 0,
            marginBottom: 0,
        }, 1500)
    });

    $('#about, #skill, #resume, #contact').on('click', (event) => {
        const value = event.target.id;
        const about = $('#about-element');
        const aboutStyle = $('#about-style');
        const skill = $('#skill-element');
        const skillStyle = $('#skill-style');
        const resume = $('#resume-element');
        const resumeStyle = $('#resume-style');
        const contact = $('#contact-element');
        const contactStyle = $('#contact-style');

        switch (value) {
            case 'about':
                about.removeClass('hidden');
                aboutStyle.removeClass('hidden');
                skill.addClass('hidden');
                skillStyle.addClass('hidden');
                resume.addClass('hidden');
                resumeStyle.addClass('hidden');
                contact.addClass('hidden');
                contactStyle.addClass('hidden');
                break;
            case 'skill':
                skill.removeClass('hidden');
                skillStyle.removeClass('hidden');
                about.addClass('hidden');
                aboutStyle.addClass('hidden');
                resume.addClass('hidden');
                resumeStyle.addClass('hidden');
                contact.addClass('hidden');
                contactStyle.addClass('hidden');
                break;
            case 'resume':
                resume.removeClass('hidden');
                resumeStyle.removeClass('hidden');
                about.addClass('hidden');
                aboutStyle.addClass('hidden');
                skill.addClass('hidden');
                skillStyle.addClass('hidden');
                contact.addClass('hidden');
                contactStyle.addClass('hidden');
                break;
            case 'contact':
                contact.removeClass('hidden');
                contactStyle.removeClass('hidden');
                about.addClass('hidden');
                aboutStyle.addClass('hidden');
                skill.addClass('hidden');
                skillStyle.addClass('hidden');
                resume.addClass('hidden');
                resumeStyle.addClass('hidden');
                break;
        }
    });
});