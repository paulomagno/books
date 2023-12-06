<?php
    $bookId = isset($book) ? $book['book_id'] : '';
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><?= $pageTitle ?></h1>
            <?php if(isset($book)) : ?>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a href="<?= base_url() ?>index.php/books/newBook" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i>&nbsp; Novo Livro</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-12">
            <form action="<?= base_url()?>index.php/books/<?= isset($book) ? "editBook/{$bookId}" : "saveBook" ?>"  method="post">
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="book_title">Título</label>
                        <input type="text" class="form-control" name="book_title" id="book_title" placeholder="Título" required value="<?= isset($book) ? $book['book_title'] : '' ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="book_description">Descrição</label>
                        <textarea name="book_description" id="book_description" rows="5" class="form-control"><?= isset($book) ? $book['book_description'] : '' ?></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="catebook_authorgory">Autor</label>
                        <input type="text" class="form-control" name="book_author" id="book_author" placeholder="Autor" value="<?= isset($book) ? $book['book_author'] : '' ?>" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="book_pages">Nº de Páginas</label>
                        <input type="number" class="form-control" name="book_pages" id="book_pages" placeholder="Nº de Páginas" value="<?= isset($book) ? $book['book_pages'] : '' ?>">
                    </div>
                </div>

                <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
                        <a href="<?= base_url()?>index.php/books" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>

</main>
</div>
</div>
