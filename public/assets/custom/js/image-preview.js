// Initialize Image Preview
function initializeImagePreview() {
    // Get all elements with the 'image-previewed' class
    const imageElements = document.querySelectorAll('.image-previewed');

    // Add click event listener to each image element
    imageElements.forEach((imageElement) => {
        imageElement.addEventListener('click', () => {
            // Create a zoomed-in preview of the clicked image
            createImagePreview(imageElement);
        });
    });
}

// Create Image Preview
function createImagePreview(imageElement) {
    // Get the source and alt attributes of the clicked image
    const imageSrc = imageElement.getAttribute('src');
    const imageAlt = imageElement.getAttribute('alt');

    // Create a modal container for the image preview
    const modalContainer = document.createElement('div');
    modalContainer.classList.add('zoom-preview');

    // Create the image element for the preview
    const previewImage = document.createElement('img');
    previewImage.setAttribute('src', imageSrc);
    previewImage.setAttribute('alt', imageAlt);
    previewImage.classList.add('zoomed-image');

    // Append the image element to the modal container
    modalContainer.appendChild(previewImage);
    modalContainer.classList.add("active");
    // Append the modal container to the body
    document.body.appendChild(modalContainer);

    // Add click event listener to the modal container to close the preview
    modalContainer.addEventListener('click', () => {
        // Remove the modal container from the DOM
        modalContainer.classList.remove("active");
        // Remove the modal container from the DOM after the animation completes
        setTimeout(() => {
            modalContainer.remove();
        }, 300); // Adjust the delay (in milliseconds) to match the animation duration
    });
}
