Alpine.directive('form', (el, { }, { cleanup }) => {
    const form = el.querySelector('form');
    if (!form) return;

    const submitHandler = async (event) => {
        event.preventDefault();

        const $data = Alpine.$data(el);

        $data.submitting = true;
        $data.success = false;
        $data.errors = [];
        $data.error = null;

        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const result = await response.json();

            if (result.success) {
                $data.success = true;
                form.reset();
            } else {
                $data.errors = result.errors || [];
                $data.error = result.error || null;
            }
        } catch (error) {
            console.error('An error occurred:', error);
            $data.errors = ['An unexpected error occurred. Please try again.'];
        } finally {
            $data.submitting = false;
        }
    };

    form.addEventListener('submit', submitHandler);

    cleanup(() => {
        form.removeEventListener('submit', submitHandler);
    });
});
