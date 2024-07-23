<!-- File: application/views/kecamatan/kecamatan_data.php -->

<section class="content-header">
    <h1>Kecamatan
        <small>Daftar Kecamatan di Kabupaten Brebes</small>
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
            <h3 class="box-title">Data Kecamatan</h3>
            <div class="pull-right">
                <a href="<?=site_url('kecamatan/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="<?=site_url('kecamatan')?>" method="GET" class="form-inline">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by name" value="<?= $this->input->get('search') ?>">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kecamatan</th>
                        <th>Kode Kecamatan</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->nama_kecamatan?></td>
                        <td><?=$data->kode_kecamatan?></td>
                        <td><?=$data->description?></td>
                        <td class="text-center" width="160px">
                            <a href="<?=site_url('kecamatan/edit/'.$data->kec_id)?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <a href="<?=site_url('kecamatan/del/'.$data->kec_id)?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="pull-right">
                <?= $pagination ?>
            </div>
        </div>
    </div>
</section>
