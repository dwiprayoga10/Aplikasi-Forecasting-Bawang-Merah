<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Aktual</h3>
            <div class="pull-right">
                <a href="<?= site_url('data/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Add Data
                </a>
            </div>
        </div>
        <div class="box-body">
            <!-- Filter and Search Form -->
            <form action="<?= site_url('data') ?>" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="filter_tahun">Filter Tahun:</label>
                            <select name="filter_tahun" id="filter_tahun" class="form-control">
                                <option value="">- Pilih Tahun -</option>
                                <?php for ($i = 2018; $i <= 2023; $i++) : ?>
                                    <option value="<?= $i ?>" <?= ($this->input->get('filter_tahun') == $i ? 'selected' : '') ?>><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <!-- Button Filter -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Filter</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="search">Search:</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari data..." value="<?= htmlspecialchars($this->input->get('search')) ?>">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Kecamatan</th>
                        <th>Luas Panen</th>
                        <th>Produksi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = $this->uri->segment(3, 0) + 1; // nomor urut sesuai halaman
                    foreach ($row->result() as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($data->tahun) ?></td>
                            <td><?= htmlspecialchars($data->kecamatan) ?></td>
                            <td><?= htmlspecialchars($data->luas_panen) ?></td>
                            <td><?= htmlspecialchars($data->produksi) ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('data/edit/' . $data->dataactual_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?= site_url('data/delete/' . $data->dataactual_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="pull-right">
                <?= $pagination ?>
            </div>
        </div>
    </div>
</section>
