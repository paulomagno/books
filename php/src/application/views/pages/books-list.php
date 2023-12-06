<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><?= $pageTitle ?></h1>
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
                    <?php if($books) :?>
                        <?php foreach($books as $book) :?>
                        <tr>
                            <td><?= $book->book_title ?></td>
                            <td><?= $book->book_description ?></td>
                            <td><?= $book->book_author ?></td>
                            <td><?= $book->book_pages ?></td>
                            <td><?= formatDate('d/m/Y H:i:s', $book->book_created_at) ?></td>
                            <td>
                                <a href="<?= base_url() ?>index.php/books/viewBook/<?= $book->book_id ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pencil-alt"> </i>
                                </a>
                                <a href="" class="btn btn-sm btn-danger" data-target="#deleteModal" data-toggle="modal">
                                    <i class="fas fa-trash-alt"> </i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <?= $this->pagination_bootstrap->render() ?>
        </div>
</main>
<!-- Modal Exclusão -->
<div class="modal fade" id="deleteModal">
 <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Exclusão de Livro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Deseja realmente excluir o registro?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  data-dismiss="modal" id="close-modal">Não</button>
            <a href="<?= base_url() ?>index.php/books/deleteBook/<?= $book->book_id ?>" class="btn btn-danger">Sim</a>
        </div>
    </div>
 </div>
</div>