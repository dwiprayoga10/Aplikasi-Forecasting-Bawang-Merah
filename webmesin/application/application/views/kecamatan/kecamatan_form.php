<section class="content-header">
    <h1>Kecamatan
        <small>Formulir Data Kecamatan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Kecamatan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Kecamatan</h3>
            <div class="pull-right">
                <a href="<?=site_url('kecamatan')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="<?=site_url('kecamatan/process')?>" method="post">
                <div class="form-group">
                    <label>Nama Kecamatan *</label>
                    <input type="hidden" name="id" value="<?=$row->kec_id?>">
                    <input type="text" name="nama_kecamatan" value="<?=$row->nama_kecamatan?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kode Kecamatan *</label>
                    <input type="text" name="kode_kecamatan" value="<?=$row->kode_kecamatan?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="desc" class="form-control"><?=$row->description?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                        <i class="fa fa-paper-plane"></i> Save
                    </button>
                    <button type="reset" class="btn btn-flat">Reset</button>
                </div>
            </form>
        </div>
    </div>
</section>
