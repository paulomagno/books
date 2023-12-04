<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Lista de Livros</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="<?= base_url() ?>index.php/books/newBook" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i>&nbsp; Novo Livro</a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="display dataTable table table-bordered table-hover" id="booksTable">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Autor</th>
                        <th>Nº de Páginas</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($books as $book) :?>
                      <tr>
                        <td><?= $book['book_title'] ?></td>
                        <td><?= $book['book_description'] ?></td>
                        <td><?= $book['book_author'] ?></td>
                        <td><?= $book['book_pages'] ?></td>
                        <td><?= $book['book_created_at'] ?></td>
                        <td>&nbsp;</td>
                      </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
</main>