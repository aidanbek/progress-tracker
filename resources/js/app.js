import './bootstrap';


$(document).ready(function () {

    $('a').each(function () {
        const focusableModalInputs = {
            '#createNewProjectsModal': '#projects_titles',
            '#createNewTasksModal': '#tasks_titles',
        };

        const modalId = $(this).data('target');

        if (focusableModalInputs.hasOwnProperty(modalId)) {
            $(modalId).on('shown.bs.modal', function (e) {
                $(modalId).find(focusableModalInputs[modalId]).focus();
            })
        }
    });

    $('.card-collapsable-table').find('.collapse-link').on('click', function () {
        $(this).next().toggle();
    });
});
