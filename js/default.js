document.getElementById('createForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Empêche la soumission normale du formulaire
    
    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];
    
    if (!title || !content || !file) {
        alert('Veuillez remplir tous les champs et sélectionner un fichier.');
        return;
    }
    
    // Vous pouvez ici ajouter du code pour envoyer les données du formulaire à votre serveur
    console.log('Titre:', title);
    console.log('Texte:', content);
    console.log('Fichier:', file.name);
});
