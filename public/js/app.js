$(document).ready(function () {

    $('a').each(function () {
        const focusableModalInputs = {
            '#createNewProjectModal': '#project_title',
            '#createNewTaskModal': '#task_title',
        };

        const modalId = $(this).data('target');

        if (focusableModalInputs.hasOwnProperty(modalId)) {
            console.log(`has prop ${modalId}`);
            console.log(focusableModalInputs[modalId]);

            $(modalId).on('shown.bs.modal', function (e) {
                console.log('event fired');
                $(modalId).find(focusableModalInputs[modalId]).focus();
            })
        }
    });
});
