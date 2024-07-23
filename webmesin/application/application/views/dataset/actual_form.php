<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Data Aktual</h3>
            <div class="pull-right">
                <a href="<?= site_url('data') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="<?= site_url('data/process') ?>" method="post">
                <div class="form-group">
                    <label for="tahun">Tahun *</label>
                    <input type="hidden" name="dataactual_id" value="<?= isset($row->dataactual_id) ? $row->dataactual_id : '' ?>">
                    <input type="number" name="tahun" id="tahun" value="<?= isset($row->tahun) ? $row->tahun : '' ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan *</label>
                    <input type="text" name="kecamatan" id="kecamatan" value="<?= isset($row->kecamatan) ? $row->kecamatan : '' ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="luas_panen">Luas Panen *</label>
                    <input type="number" name="luas_panen" id="luas_panen" value="<?= isset($row->luas_panen) ? $row->luas_panen : '' ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="produksi">Produksi *</label>
                    <input type="number" name="produksi" id="produksi" value="<?= isset($row->produksi) ? $row->produksi : '' ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                        <i class="fa fa-paper-plane"></i> Save
                    </button>
                    <button type="reset" class="btn btn-flat">Reset</button>
                </div>
            </form>
        </div>
    </div>
</section>
