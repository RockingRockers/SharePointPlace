const uploadForm = document.getElementById('upload-form');
const fileInput = document.getElementById('file-input');
const downloadLinkContainer = document.getElementById('download-link-container');
const downloadLink = document.getElementById('download-link');

uploadForm.addEventListener('submit', (event) => {
  event.preventDefault();
  const file = fileInput.files[0];
  const formData = new FormData();
  formData.append('file', file);

  fetch('upload.php', {
    method: 'POST',
    body: formData,
  })
    .then(response => response.json())
    .then(data => {
      downloadLink.value = window.location.href + 'download.php?file=' + data.filename;
      downloadLinkContainer.style.display = 'block';
    })
    .catch(error => console.error(error));
});
