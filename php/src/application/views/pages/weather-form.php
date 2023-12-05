<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><?= $pageTitle ?></h1>
        </div>

        <div class="col-md-12">
            <form action="<?= base_url()?>index.php/weather/editApiParams"  method="post">
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="weather_city">Cidade</label>
                        <input type="text" class="form-control" name="weather_city" id="weather_city" placeholder="Nome da Cidade" required value="<?= $weather['weather_city'] ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="weather_state">UF</label>
                        <?= form_dropdown('weather_state', statesList(), $weather['weather_state'], "class='form-control'");?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="weather_api_key">Chave da Api</label>
                        <input type="text" class="form-control" name="weather_api_key" id="weather_api_key" placeholder="Chave da Api" required value="<?= $weather['weather_api_key'] ?>">
                    </div>
                </div>

                <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
                        <a href="<?= base_url()?>index.php/weather" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>

</main>
</div>
</div>
