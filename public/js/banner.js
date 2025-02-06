// banner deleter

document.addEventListener('DOMContentLoaded', function()
{
    document.querySelectorAll('.delete-banner').forEach(button => {
        button.addEventListener('click', function (event)
        {
            event.preventDefault();
            if(confirm('Do you want to delete this banner?')){
                this.closest('form').submit();
            }
        });
    });
});
