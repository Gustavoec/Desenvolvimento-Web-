<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Xuitter - Postagem </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Xuitter</a>
            <span class="navbar-text">GUSTAVO</span>
        </div>
    </nav>

    <div class="container">
        <form id="postForm" method="post">
            <div class="mb-3">
                <textarea class="form-control" id="postText" rows="3" placeholder="O que você está pensando?" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Postar</button>
        </form>
        <div id="postsContainer"></div>
    </div>

    <script>
        $(document).ready(function() {
            loadPosts();

            $('#postForm').submit(function(event) {
                event.preventDefault();
                const postText = $('#postText').val().trim();
                if (postText) {
                    $.post('save_post.php', { texto: postText }, function(data) {
                        if (data.success) {
                            $('#postText').val('');
                            loadPosts();
                        } else {
                            alert('Erro ao salvar a postagem.');
                        }
                    }, 'json');
                } else {
                    alert('Por favor, escreva algo antes de postar.');
                }
            });

            $(document).on('click', '.like-btn', function() {
                const postId = $(this).data('id');
                const $btn = $(this);
                $.post('like_post.php', { id: postId }, function(data) {
                    if (data.success) {
                        $btn.toggleClass('liked');
                    } else {
                        alert('Erro ao curtir a postagem.');
                    }
                }, 'json');
            });

            $(document).on('click', '.delete-btn', function() {
                const postId = $(this).data('id');
                if (confirm('Tem certeza de que deseja excluir esta postagem?')) {
                    $.post('delete_post.php', { id: postId }, function(data) {
                        if (data.success) {
                            loadPosts();
                        } else {
                            alert('Erro ao excluir a postagem.');
                        }
                    }, 'json');
                }
            });

            function loadPosts() {
                $.get('load_posts.php', function(data) {
                    if (data.success) {
                        $('#postsContainer').html('');
                        data.posts.forEach(function(post) {
                            const likedClass = post.curtida ? 'liked' : '';
                            $('#postsContainer').append(`
                                <div class="post">
                                    <p>${post.texto}</p>
                                    <button class="btn btn-sm btn-outline-primary like-btn ${likedClass}" data-id="${post.id}">Curtir</button>
                                    <button class="btn btn-sm btn-outline-danger delete-btn" data-id="${post.id}">Excluir</button>
                                </div>
                            `);
                        });
                    } else {
                        alert('Erro ao carregar postagens.');
                    }
                }, 'json');
            }
        });
    </script>
</body>
</html>
