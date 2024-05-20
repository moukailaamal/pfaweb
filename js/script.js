// Supprime un produit du panier en utilisant AJAX
function destroyProduitPanier(id) {
    $.ajax({
        type: 'GET',
        url: 'index.php',
        data: { action: 'destroyProduitPanier', id: id },
        success: function(response) {
            // Actualiser la page ou effectuer une action supplémentaire si nécessaire
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Gérer l'erreur, par exemple afficher un message à l'utilisateur
        }
    });
}

// Augmente la quantité d'un produit dans le panier en utilisant AJAX
function augmenterQuantite(id) {
    $.ajax({
        type: 'GET',
        url: 'index.php',
        data: { action: 'augmenterQuantitePanier', id: id },
        success: function(response) {
            // Actualiser la page ou effectuer une action supplémentaire si nécessaire
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Gérer l'erreur, par exemple afficher un message à l'utilisateur
        }
    });
}

// Diminue la quantité d'un produit dans le panier en utilisant AJAX
function diminuerQuantite(id) {
    $.ajax({
        type: 'GET',
        url: 'index.php',
        data: { action: 'diminuerQuantitePanier', id: id },
        success: function(response) {
            // Actualiser la page ou effectuer une action supplémentaire si nécessaire
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Gérer l'erreur, par exemple afficher un message à l'utilisateur
        }
    });
}
