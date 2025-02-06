document.addEventListener('DOMContentLoaded'), () =>
{
    const inputs = document.querySelectorAll('input');

    inputs.forEach(input =>
    {
        input.addEventListener('focus', () => {
            input.style.borderColor = '#4CAF50';
        });

        input.addEventListener('blur', () => {
            input.style.borderColor = '#ccc';
        });

    });
}
