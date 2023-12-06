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
            <h1 class="h2">Dados Climáticos </h1>
            <table class="display dataTable table table-bordered table-hover" id="booksTable">
                <thead>
                    <tr>
                        <th>Cidade</th>
                        <th>Temperatura Cº</th>
                        <th>Descrição do Clima</th>
                        <th>Nascer do Sol</th>
                        <th>Por do Sol</th>
                        <th>Velocidade do Vento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= isset($dataWeather['results']) ? $dataWeather['results']['city'] : ''  ?></td>
                        <td><?= isset($dataWeather['results']) ? $dataWeather['results']['temp'] : ''  ?></td>
                        <td><?= isset($dataWeather['results']) ? $dataWeather['results']['description'] : ''  ?></td>
                        <td><?= isset($dataWeather['results']) ? $dataWeather['results']['sunrise'] : ''  ?></td>
                        <td><?= isset($dataWeather['results']) ? $dataWeather['results']['sunset'] : ''  ?></td>
                        <td><?= isset($dataWeather['results']) ? $dataWeather['results']['wind_speedy'] : ''  ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
</main>