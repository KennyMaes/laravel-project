document.addEventListener('DOMContentLoaded', function() {
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const accordionBody = this.nextElementSibling;

            // Toggle the visibility of the accordion body
            accordionBody.classList.toggle('hidden');

            // Toggle the aria-expanded attribute
            const isExpanded = accordionBody.classList.contains('hidden') ? false : true;
            this.setAttribute('aria-expanded', isExpanded.toString());

            console.log('is Expanded ' + isExpanded);

            // Get the SVG element within the accordion body
            const svgElement = this.querySelector('svg');

            if (!isExpanded) {
                console.log('Check remove')
                // If it's rotated, remove the rotation
                svgElement.removeAttribute('transform');
            } else {
                // If it's not rotated, rotate it by 180 degrees
                svgElement.setAttribute('transform', 'rotate(180)');
            }
        });
    });
});
